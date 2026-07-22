<?php

namespace App\Models;

use CodeIgniter\Model;

class EnquiryModel extends Model
{
    protected $table            = 'enquiries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'user_id', 'product_id', 'name', 'email', 'phone',
        'subject', 'message', 'status', 'admin_reply', 'replied_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name'    => 'required|min_length[2]|max_length[100]',
        'email'   => 'required|valid_email|max_length[150]',
        'message' => 'required|min_length[10]',
    ];

    // -------------------------------------------------------------------------
    // Custom Methods
    // -------------------------------------------------------------------------

    public function getAllWithDetails(): array
    {
        return $this->select('enquiries.*, products.name as product_name, users.name as user_name')
                    ->join('products', 'products.id = enquiries.product_id', 'left')
                    ->join('users', 'users.id = enquiries.user_id', 'left')
                    ->orderBy('enquiries.created_at', 'DESC')
                    ->findAll();
    }

    public function getByUser(int $userId): array
    {
        return $this->select('enquiries.*, products.name as product_name')
                    ->join('products', 'products.id = enquiries.product_id', 'left')
                    ->where('enquiries.user_id', $userId)
                    ->orderBy('enquiries.created_at', 'DESC')
                    ->findAll();
    }

    public function getNewCount(): int
    {
        return $this->where('status', 'new')->countAllResults();
    }

    public function markAsRead(int $id): bool
    {
        return $this->update($id, ['status' => 'read']);
    }

    public function addReply(int $id, string $reply): bool
    {
        return $this->update($id, [
            'admin_reply' => $reply,
            'status'      => 'replied',
            'replied_at'  => date('Y-m-d H:i:s'),
        ]);
    }
}
