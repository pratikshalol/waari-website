<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactInfoModel extends Model
{
    protected $table            = 'contact_info';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields = [
        'setting_key', 'setting_value',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // -------------------------------------------------------------------------
    // Custom Methods
    // -------------------------------------------------------------------------

    public function getValue(string $key, string $default = ''): string
    {
        $row = $this->where('setting_key', $key)->first();
        return $row ? ($row['setting_value'] ?? $default) : $default;
    }

    public function getAllAsKeyedArray(): array
    {
        $rows   = $this->findAll();
        $result = [];

        foreach ($rows as $row) {
            $result[$row['setting_key']] = $row['setting_value'];
        }

        return $result;
    }

    public function upsert(string $key, string $value): bool
    {
        $existing = $this->where('setting_key', $key)->first();

        if ($existing) {
            return $this->update($existing['id'], ['setting_value' => $value]);
        }

        return (bool) $this->insert(['setting_key' => $key, 'setting_value' => $value]);
    }

    public function saveMany(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->upsert($key, (string) $value);
        }
    }

    public function updateValue(string $key, string $value): bool
    {
        return $this->upsert($key, $value);
    }
}
