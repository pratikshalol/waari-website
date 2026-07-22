<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');

        $data = [
            [
                'customer_name'     => 'Priya Sharma',
                'customer_location' => 'Pune, Maharashtra',
                'message'           => 'I switched to Waari jaggery powder for my morning chai and I can honestly feel the difference. The taste is so much richer and I love knowing there are no chemicals. My whole family has made the switch!',
                'rating'            => 5,
                'is_featured'       => 1,
                'is_active'         => 1,
                'sort_order'        => 1,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'customer_name'     => 'Rahul Desai',
                'customer_location' => 'Mumbai, Maharashtra',
                'message'           => 'The Ginger Jaggery is absolutely amazing. I have it every day after lunch and my digestion has improved tremendously. The ginger and jaggery combination is perfect. Highly recommended!',
                'rating'            => 5,
                'is_featured'       => 1,
                'is_active'         => 1,
                'sort_order'        => 2,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'customer_name'     => 'Sunita Patil',
                'customer_location' => 'Nashik, Maharashtra',
                'message'           => 'Ordered the Wellness Gift Box for Diwali gifting and everyone loved it! The packaging is beautiful and the products are excellent quality. Will definitely order again for the next festival.',
                'rating'            => 5,
                'is_featured'       => 1,
                'is_active'         => 1,
                'sort_order'        => 3,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'customer_name'     => 'Dr. Anita Kulkarni',
                'customer_location' => 'Kolhapur, Maharashtra',
                'message'           => 'As a nutritionist, I recommend Waari jaggery to all my clients as a replacement for refined sugar. The Coconut Jaggery Powder is especially good for diabetic patients due to its lower glycemic index.',
                'rating'            => 5,
                'is_featured'       => 1,
                'is_active'         => 1,
                'sort_order'        => 4,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'customer_name'     => 'Vikram Joshi',
                'customer_location' => 'Aurangabad, Maharashtra',
                'message'           => 'The Kolhapuri Jaggery Block is the real deal. I have been eating jaggery my whole life and this is the most authentic taste I have had outside of my village. Fast delivery and fresh product.',
                'rating'            => 5,
                'is_featured'       => 1,
                'is_active'         => 1,
                'sort_order'        => 5,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'customer_name'     => 'Meera Nair',
                'customer_location' => 'Bangalore, Karnataka',
                'message'           => 'Tried the Tulsi Jaggery during the monsoon season on a friend\'s recommendation. It helped so much with my immunity — I did not fall sick at all this season. The taste is wonderful too!',
                'rating'            => 4,
                'is_featured'       => 1,
                'is_active'         => 1,
                'sort_order'        => 6,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'customer_name'     => 'Arun Sawant',
                'customer_location' => 'Satara, Maharashtra',
                'message'           => 'The Family Pack Combo is great value for money. My wife uses the jaggery powder in cooking and I love the ginger jaggery. Good packaging, products arrived fresh. Five stars!',
                'rating'            => 5,
                'is_featured'       => 0,
                'is_active'         => 1,
                'sort_order'        => 7,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'customer_name'     => 'Kavita Bhosale',
                'customer_location' => 'Solapur, Maharashtra',
                'message'           => 'I use Waari Jaggery Syrup on my children\'s pancakes instead of maple syrup. They love it and I feel so much better giving them a natural product. It\'s the perfect healthy substitute!',
                'rating'            => 5,
                'is_featured'       => 0,
                'is_active'         => 1,
                'sort_order'        => 8,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
        ];

        $this->db->table('testimonials')->insertBatch($data);
    }
}
