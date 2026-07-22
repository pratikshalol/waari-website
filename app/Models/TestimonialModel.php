<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    protected $table            = 'testimonials';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'customer_name', 'customer_location', 'avatar', 'message',
        'rating', 'product_id', 'is_featured', 'is_active', 'sort_order',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'customer_name' => 'required|min_length[2]|max_length[100]',
        'message'       => 'required|min_length[10]',
        'rating'        => 'required|integer|greater_than[0]|less_than[6]',
    ];

    // -------------------------------------------------------------------------
    // Custom Methods
    // -------------------------------------------------------------------------

    public function getActiveTestimonials(): array
    {
        return $this->where('is_active', 1)
                    ->orderBy('sort_order', 'ASC')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getFeaturedTestimonials(int $limit = 6): array
    {
        return $this->where('is_featured', 1)
                    ->where('is_active', 1)
                    ->orderBy('sort_order', 'ASC')
                    ->limit($limit)
                    ->findAll();
    }
}
