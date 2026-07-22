<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutContentModel extends Model
{
    protected $table            = 'about_content';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'section_key', 'title', 'subtitle', 'content', 'image', 'extra_data',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // -------------------------------------------------------------------------
    // Custom Methods
    // -------------------------------------------------------------------------

    public function getByKey(string $key): ?array
    {
        return $this->where('section_key', $key)->first();
    }

    public function getAllAsKeyedArray(): array
    {
        $rows   = $this->findAll();
        $result = [];

        foreach ($rows as $row) {
            $result[$row['section_key']] = $row;
        }

        return $result;
    }

    public function upsert(string $key, array $data): bool
    {
        $existing = $this->where('section_key', $key)->first();
        $data['section_key'] = $key;

        if ($existing) {
            return $this->update($existing['id'], $data);
        }

        return (bool) $this->insert($data);
    }

    public function updateValue(string $key, string $value): bool
    {
        return $this->upsert($key, ['content' => $value]);
    }
}
