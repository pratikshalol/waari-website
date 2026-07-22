<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'category_id', 'name', 'slug', 'short_description', 'description',
        'benefits', 'ingredients', 'weight', 'price', 'image', 'gallery_images',
        'is_featured', 'is_available', 'is_active', 'sort_order',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name' => 'required|min_length[2]|max_length[200]',
        'slug' => 'required|max_length[220]|is_unique[products.slug,id,{id}]',
    ];

    // -------------------------------------------------------------------------
    // Custom Methods
    // -------------------------------------------------------------------------

    public function getActiveProducts(): array
    {
        return $this->select('products.*, categories.name as category_name')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->where('products.is_active', 1)
                    ->orderBy('products.sort_order', 'ASC')
                    ->orderBy('products.name', 'ASC')
                    ->findAll();
    }

    public function getFeaturedProducts(int $limit = 6): array
    {
        return $this->select('products.*, categories.name as category_name')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->where('products.is_featured', 1)
                    ->where('products.is_active', 1)
                    ->orderBy('products.sort_order', 'ASC')
                    ->limit($limit)
                    ->findAll();
    }

    public function getProductsByCategory(int $categoryId): array
    {
        return $this->select('products.*, categories.name as category_name')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->where('products.category_id', $categoryId)
                    ->where('products.is_active', 1)
                    ->orderBy('products.sort_order', 'ASC')
                    ->findAll();
    }

    public function findBySlug(string $slug): ?array
    {
        return $this->select('products.*, categories.name as category_name, categories.slug as category_slug')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->where('products.slug', $slug)
                    ->where('products.is_active', 1)
                    ->first();
    }

    public function searchProducts(string $keyword, ?int $categoryId = null): array
    {
        $builder = $this->select('products.*, categories.name as category_name')
                        ->join('categories', 'categories.id = products.category_id', 'left')
                        ->where('products.is_active', 1)
                        ->groupStart()
                            ->like('products.name', $keyword)
                            ->orLike('products.short_description', $keyword)
                            ->orLike('products.description', $keyword)
                        ->groupEnd();

        if ($categoryId !== null) {
            $builder->where('products.category_id', $categoryId);
        }

        return $builder->orderBy('products.name', 'ASC')->findAll();
    }

    public function generateSlug(string $name): string
    {
        $slug     = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
        $original = $slug;
        $count    = 1;

        while ($this->where('slug', $slug)->countAllResults() > 0) {
            $slug = $original . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function getPaginatedProducts(int $perPage = 12, ?int $categoryId = null, string $search = ''): array
    {
        $builder = $this->select('products.*, categories.name as category_name')
                        ->join('categories', 'categories.id = products.category_id', 'left')
                        ->where('products.is_active', 1);

        if ($categoryId !== null) {
            $builder->where('products.category_id', $categoryId);
        }

        if ($search !== '') {
            $builder->groupStart()
                        ->like('products.name', $search)
                        ->orLike('products.short_description', $search)
                    ->groupEnd();
        }

        return $builder->orderBy('products.sort_order', 'ASC')
                       ->paginate($perPage, 'default');
    }

    public function getRelatedProducts(int $categoryId, int $excludeId, int $limit = 4): array
    {
        return $this->select('products.*, categories.name as category_name')
                    ->join('categories', 'categories.id = products.category_id', 'left')
                    ->where('products.category_id', $categoryId)
                    ->where('products.id !=', $excludeId)
                    ->where('products.is_active', 1)
                    ->limit($limit)
                    ->findAll();
    }
}
