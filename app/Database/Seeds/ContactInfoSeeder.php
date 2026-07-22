<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');

        $data = [
            ['setting_key' => 'company_name',    'setting_value' => 'Shrutika Nutrilite Foods PVT LTD',    'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'brand_name',       'setting_value' => 'Waari',                               'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'tagline',          'setting_value' => '100% Natural. Chemical-Free Jaggery.','created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'email',            'setting_value' => 'hello@waari.in',                      'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'phone',            'setting_value' => '+91 98765 43210',                     'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'whatsapp',         'setting_value' => '+91 98765 43210',                     'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'address_line1',    'setting_value' => 'Shrutika Nutrilite Foods PVT LTD',    'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'address_line2',    'setting_value' => 'Village Waari, Taluka Koregaon',       'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'address_city',     'setting_value' => 'Satara',                              'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'address_state',    'setting_value' => 'Maharashtra',                         'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'address_pincode',  'setting_value' => '415 001',                             'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'address_country',  'setting_value' => 'India',                               'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'facebook_url',     'setting_value' => 'https://facebook.com/waari',          'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'instagram_url',    'setting_value' => 'https://instagram.com/waari',         'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'youtube_url',      'setting_value' => 'https://youtube.com/@waari',          'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'map_embed_url',    'setting_value' => 'https://maps.google.com/maps?q=Satara,Maharashtra&output=embed', 'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'business_hours',   'setting_value' => 'Monday – Saturday: 9:00 AM – 6:00 PM', 'created_at' => $now, 'updated_at' => $now],
            ['setting_key' => 'fssai_number',     'setting_value' => '11223344556677',                      'created_at' => $now, 'updated_at' => $now],
        ];

        $this->db->table('contact_info')->insertBatch($data);
    }
}
