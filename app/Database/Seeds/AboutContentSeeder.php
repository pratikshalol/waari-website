<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AboutContentSeeder extends Seeder
{
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');

        $data = [
            [
                'section_key' => 'hero',
                'title'       => 'Our Story',
                'subtitle'    => 'Bringing Nature\'s Sweetness Back to Your Table',
                'content'     => 'Waari was born out of a simple belief: that food should be pure, natural, and nourishing. Founded under Shrutika Nutrilite Foods PVT LTD, Waari is dedicated to reviving India\'s ancient tradition of chemical-free jaggery making.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'section_key' => 'mission',
                'title'       => 'Our Mission',
                'subtitle'    => 'Pure. Natural. Nourishing.',
                'content'     => 'Our mission is to make 100% natural, chemical-free jaggery products accessible to every household in India. We work directly with sugarcane farmers in Maharashtra, ensuring fair prices for growers and the freshest produce for our customers. Every product we make is free from synthetic chemicals, artificial colours, preservatives, and sulphur.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'section_key' => 'values',
                'title'       => 'What We Stand For',
                'subtitle'    => 'Our Core Values',
                'content'     => 'Purity|We never compromise on purity. Zero chemicals, zero additives, zero shortcuts.
Transparency|We tell you exactly what is in every product — and what is not.
Sustainability|We support local farmers and use eco-friendly packaging to minimise our environmental footprint.
Heritage|We honour India\'s centuries-old tradition of jaggery making and bring it to modern consumers.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'section_key' => 'process',
                'title'       => 'How We Make Our Jaggery',
                'subtitle'    => 'Traditional Methods, Modern Quality Standards',
                'content'     => 'Step 1: Sugarcane Harvesting|We source only the ripest sugarcane from our partner farms in Kolhapur, Satara, and Sangli districts of Maharashtra.
Step 2: Cold Pressing|The juice is extracted using cold-press methods to preserve nutrients that heat destroys.
Step 3: Natural Clarification|Instead of chemical clarifiers, we use natural agents like okra juice (bhindi) and lime to clarify the juice — just as our grandmothers did.
Step 4: Open Pan Cooking|The clarified juice is slowly cooked in open iron cauldrons at controlled temperatures. No shortcuts, no pressure cooking.
Step 5: Setting and Packaging|The prepared jaggery is set in traditional moulds or ground into powder, then immediately packed in food-grade packaging to preserve freshness.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'section_key' => 'team',
                'title'       => 'The People Behind Waari',
                'subtitle'    => 'Passionate About Natural Food',
                'content'     => 'Waari is run by a passionate team from Shrutika Nutrilite Foods PVT LTD, combining deep agricultural expertise with modern food science. Our founders grew up in Maharashtra\'s jaggery belt and have first-hand knowledge of what authentic, chemical-free jaggery should look, smell, and taste like.',
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ];

        $this->db->table('about_content')->insertBatch($data);
    }
}
