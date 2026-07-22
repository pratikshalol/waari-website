<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name'        => 'Jaggery Powder',
                'slug'        => 'jaggery-powder',
                'description' => 'Finely ground natural jaggery powder, perfect for daily use in beverages and cooking. Retains all natural minerals and vitamins.',
                'is_active'   => 1,
                'sort_order'  => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Jaggery Blocks',
                'slug'        => 'jaggery-blocks',
                'description' => 'Traditional solid jaggery blocks made from pure sugarcane juice. Great for traditional recipes and long shelf life.',
                'is_active'   => 1,
                'sort_order'  => 2,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Flavoured Jaggery',
                'slug'        => 'flavoured-jaggery',
                'description' => 'Natural jaggery infused with traditional Indian spices and herbs like ginger, cardamom, and dry ginger.',
                'is_active'   => 1,
                'sort_order'  => 3,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Jaggery Syrup',
                'slug'        => 'jaggery-syrup',
                'description' => 'Liquid jaggery concentrate, ideal for drizzling over desserts, pancakes, or mixing in drinks.',
                'is_active'   => 1,
                'sort_order'  => 4,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Gift Combos',
                'slug'        => 'gift-combos',
                'description' => 'Curated jaggery gift sets perfect for festivals, corporate gifting, and special occasions.',
                'is_active'   => 1,
                'sort_order'  => 5,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('categories')->insertBatch($data);
    }
}
