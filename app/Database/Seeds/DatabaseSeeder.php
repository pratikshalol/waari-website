<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Main seeder — run with:
 *   php spark db:seed DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call('AdminSeeder');
        $this->call('CategorySeeder');
        $this->call('ProductSeeder');
        $this->call('TestimonialSeeder');
        $this->call('AboutContentSeeder');
        $this->call('ContactInfoSeeder');
    }
}
