<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'name', 'slug', 'description', 'image', 'is_active', 'sort_order',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name' => 'required|min_length[2]|max_length[100]',
        'slug' => 'required|max_length[120]|is_unique[categories.slug,id,{id}]',
    ];

    // -------------------------------------------------------------------------
    // Custom Methods
    // -------------------------------------------------------------------------

    public function getActiveCategories(): array
    {
        return $this->where('is_active', 1)
                    ->orderBy('sort_order', 'ASC')
                    ->orderBy('name', 'ASC')
                    ->findAll();
    }

    public function findBySlug(string $slug): ?array
    {
        return $this->where('slug', $slug)->where('is_active', 1)->first();
    }

    public function generateSlug(string $name): string
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
        $original = $slug;
        $count = 1;

        while ($this->where('slug', $slug)->countAllResults() > 0) {
            $slug = $original . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function getCategoriesWithProductCount(): array
    {
        return $this->select('categories.*, COUNT(products.id) as product_count')
                    ->join('products', 'products.category_id = categories.id AND products.is_active = 1', 'left')
                    ->where('categories.is_active', 1)
                    ->groupBy('categories.id')
                    ->orderBy('categories.sort_order', 'ASC')
                    ->findAll();
    }
}
