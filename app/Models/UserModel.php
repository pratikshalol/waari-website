<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'name', 'email', 'password', 'phone', 'address', 'avatar', 'is_active',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name'  => 'required|min_length[2]|max_length[100]',
        'email' => 'required|valid_email|max_length[150]',
    ];

    protected $validationMessages = [];
    protected $skipValidation     = false;

    // -------------------------------------------------------------------------
    // Custom Methods
    // -------------------------------------------------------------------------

    public function findByEmail(string $email): ?array
    {
        return $this->where('email', $email)->first();
    }

    public function getActiveUsers(): array
    {
        return $this->where('is_active', 1)->findAll();
    }

    public function verifyPassword(string $plain, string $hashed): bool
    {
        return password_verify($plain, $hashed);
    }
}
