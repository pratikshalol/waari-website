<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table            = 'gallery';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'title', 'caption', 'image', 'type', 'video_url', 'category', 'is_active', 'sort_order',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'image' => 'required|max_length[255]',
    ];

    // -------------------------------------------------------------------------
    // Custom Methods
    // -------------------------------------------------------------------------

    public function getActiveItems(): array
    {
        return $this->where('is_active', 1)
                    ->orderBy('sort_order', 'ASC')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getByCategory(string $category): array
    {
        return $this->where('category', $category)
                    ->where('is_active', 1)
                    ->orderBy('sort_order', 'ASC')
                    ->findAll();
    }

    public function getDistinctCategories(): array
    {
        return $this->select('category')
                    ->where('is_active', 1)
                    ->where('category IS NOT NULL', null, false)
                    ->groupBy('category')
                    ->orderBy('category', 'ASC')
                    ->findAll();
    }
}
