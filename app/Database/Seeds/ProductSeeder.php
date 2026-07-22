<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch category IDs dynamically
        $categories = $this->db->table('categories')->get()->getResultArray();
        $catMap = [];
        foreach ($categories as $cat) {
            $catMap[$cat['slug']] = $cat['id'];
        }

        $now = date('Y-m-d H:i:s');

        $products = [
            // ── JAGGERY POWDER ──────────────────────────────────────────────
            [
                'category_id'       => $catMap['jaggery-powder'] ?? null,
                'name'              => 'Pure Sugarcane Jaggery Powder',
                'slug'              => 'pure-sugarcane-jaggery-powder',
                'short_description' => '100% natural, chemical-free sugarcane jaggery powder. No added colour, preservatives, or artificial flavours.',
                'description'       => '<p>Waari\'s Pure Sugarcane Jaggery Powder is crafted from the finest sugarcane fields of Maharashtra. The juice is extracted, clarified using natural ingredients, and slowly evaporated to produce golden jaggery powder that retains its natural molasses content.</p><p>Unlike refined sugar, our jaggery powder retains iron, calcium, magnesium, and potassium — essential minerals your body needs daily. It has a gentle, earthy sweetness that enriches every recipe.</p><p>Use it in your morning chai, coffee, smoothies, baking, or traditional Indian sweets. The fine powder dissolves quickly and evenly.</p>',
                'benefits'          => "Rich in iron — helps prevent anaemia\nContains calcium — supports bone health\nNatural source of energy — no sugar crash\nAids digestion — stimulates digestive enzymes\nRich in antioxidants — boosts immunity\nNo chemicals, preservatives, or additives",
                'ingredients'       => '100% Pure Sugarcane Juice (concentrated and dried). No additives.',
                'weight'            => '500g',
                'price'             => 180.00,
                'is_featured'       => 1,
                'is_available'      => 1,
                'is_active'         => 1,
                'sort_order'        => 1,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'category_id'       => $catMap['jaggery-powder'] ?? null,
                'name'              => 'Organic Jaggery Powder (1kg)',
                'slug'              => 'organic-jaggery-powder-1kg',
                'short_description' => 'Certified organic jaggery powder in a family-size 1kg pack. Ideal for households that prefer natural sweeteners every day.',
                'description'       => '<p>Our Organic Jaggery Powder is made exclusively from organically grown sugarcane — free from synthetic pesticides and chemical fertilisers. Every batch is tested for purity.</p><p>The 1kg pack is perfect for families. With its fine texture and warm golden colour, it blends seamlessly into sweets, beverages, and main course dishes alike.</p><p>Shrutika Nutrilite Foods guarantees that no sulphur or chemical bleach is used at any stage of processing.</p>',
                'benefits'          => "FSSAI certified organic\nSulphur-free processing\nRetains natural molasses\nHigh in minerals — iron, zinc, magnesium\nHelps regulate blood sugar better than refined sugar\nGluten-free and vegan",
                'ingredients'       => '100% Organic Sugarcane Juice. No additives.',
                'weight'            => '1kg',
                'price'             => 320.00,
                'is_featured'       => 1,
                'is_available'      => 1,
                'is_active'         => 1,
                'sort_order'        => 2,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'category_id'       => $catMap['jaggery-powder'] ?? null,
                'name'              => 'Coconut Jaggery Powder',
                'slug'              => 'coconut-jaggery-powder',
                'short_description' => 'Made from fresh coconut palm sap, this jaggery powder has a rich caramel flavour and a lower glycemic index.',
                'description'       => '<p>Waari\'s Coconut Jaggery Powder is extracted from the sap of coconut palms — not sugarcane. It carries a distinctive deep caramel flavour that makes it exceptional in desserts, energy balls, and South Indian recipes.</p><p>Coconut jaggery has a lower glycemic index (GI ~35) compared to sugarcane jaggery (~84), making it a wiser choice for those monitoring blood sugar levels.</p><p>It is naturally rich in inulin — a prebiotic fibre that nourishes gut bacteria.</p>',
                'benefits'          => "Lower glycemic index (~35)\nRich in prebiotic fibre (inulin)\nNatural source of B vitamins\nSupports gut microbiome\nRich caramel flavour — less is more\nVegan and gluten-free",
                'ingredients'       => '100% Coconut Palm Sap (concentrated and dried). No additives.',
                'weight'            => '250g',
                'price'             => 220.00,
                'is_featured'       => 0,
                'is_available'      => 1,
                'is_active'         => 1,
                'sort_order'        => 3,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],

            // ── JAGGERY BLOCKS ──────────────────────────────────────────────
            [
                'category_id'       => $catMap['jaggery-blocks'] ?? null,
                'name'              => 'Traditional Jaggery Block (Gur)',
                'slug'              => 'traditional-jaggery-block-gur',
                'short_description' => 'Classic solid jaggery block the way it has been made for centuries. Authentic taste, no chemicals.',
                'description'       => '<p>Our Traditional Jaggery Block, known as Gur in Hindi, is a staple across Indian households. Made by boiling and cooling fresh sugarcane juice in large iron cauldrons, these blocks develop a characteristic earthy sweetness and golden-amber hue.</p><p>Waari\'s Gur blocks are made without any synthetic agents. The natural colour, texture, and taste are preserved through traditional open-pan cooking.</p><p>Break off a small piece to sweeten your dal, use it in making chikki, or enjoy it raw after meals as a traditional digestive.</p>',
                'benefits'          => "Aids digestion when consumed after meals\nNatural source of iron — prevents anaemia\nDetoxifies the liver\nBoosts immunity with antioxidants\nHelps purify blood\nTraditional remedy for cold and cough",
                'ingredients'       => '100% Pure Sugarcane Juice. No additives.',
                'weight'            => '500g',
                'price'             => 150.00,
                'is_featured'       => 1,
                'is_available'      => 1,
                'is_active'         => 1,
                'sort_order'        => 4,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'category_id'       => $catMap['jaggery-blocks'] ?? null,
                'name'              => 'Kolhapuri Jaggery Block',
                'slug'              => 'kolhapuri-jaggery-block',
                'short_description' => 'Authentic Kolhapuri-style jaggery, renowned for its distinctive light yellow colour and superior taste.',
                'description'       => '<p>Kolhapur in Maharashtra is famous for producing some of India\'s finest jaggery. The unique soil composition and sugarcane varieties of this region give Kolhapuri jaggery its signature light-yellow colour and mellow sweetness.</p><p>Waari sources its Kolhapuri jaggery directly from trusted farmers in the Kolhapur district, ensuring freshness and authenticity in every block.</p><p>Ideal for making traditional Maharashtrian recipes like puran poli, modak, and tilgul.</p>',
                'benefits'          => "GI tag protected variety\nLight yellow — natural, no artificial colour\nHigh sucrose with natural molasses\nSuperior taste for traditional sweets\nDirect farm sourcing — freshest quality\nRich in minerals and trace elements",
                'ingredients'       => '100% Kolhapuri Sugarcane Juice. No additives.',
                'weight'            => '1kg',
                'price'             => 280.00,
                'is_featured'       => 1,
                'is_available'      => 1,
                'is_active'         => 1,
                'sort_order'        => 5,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],

            // ── FLAVOURED JAGGERY ────────────────────────────────────────────
            [
                'category_id'       => $catMap['flavoured-jaggery'] ?? null,
                'name'              => 'Ginger Jaggery',
                'slug'              => 'ginger-jaggery',
                'short_description' => 'Natural jaggery blended with sun-dried ginger. A warming, aromatic treat that supports immunity and digestion.',
                'description'       => '<p>Waari Ginger Jaggery combines the goodness of pure sugarcane jaggery with dry ginger (saunth) — a combination trusted in Ayurveda for thousands of years.</p><p>Dry ginger adds a warm, spicy kick that balances beautifully with the natural sweetness of jaggery. This combination is particularly valued during winters and monsoons.</p><p>Enjoy a small piece after meals to aid digestion, or dissolve in warm water for a soothing digestive tonic.</p>',
                'benefits'          => "Powerful digestive aid — activates digestive enzymes\nAnti-inflammatory properties from gingerols\nRelieves nausea and motion sickness\nWarms the body — ideal for winters\nBoosts immunity and fights common cold\nTraditional Ayurvedic remedy",
                'ingredients'       => 'Pure Sugarcane Jaggery (95%), Dry Ginger Powder (5%). No additives.',
                'weight'            => '250g',
                'price'             => 190.00,
                'is_featured'       => 1,
                'is_available'      => 1,
                'is_active'         => 1,
                'sort_order'        => 6,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'category_id'       => $catMap['flavoured-jaggery'] ?? null,
                'name'              => 'Cardamom Jaggery',
                'slug'              => 'cardamom-jaggery',
                'short_description' => 'Sweet jaggery infused with green cardamom — the perfect aromatic sweetener for chai, kheer, and festive sweets.',
                'description'       => '<p>The delicate floral aroma of green cardamom meets the earthy sweetness of pure jaggery in this classic Waari blend. Cardamom (elaichi) has been a prized spice in Indian cuisine and Ayurveda for centuries.</p><p>Use Cardamom Jaggery to sweeten your morning chai, add to rice kheer, or incorporate in festive halwa preparations. The aromatic quality is preserved through cold-blending at low temperatures.</p><p>A small piece after a rich meal is a time-tested aid for digestion and freshens breath naturally.</p>',
                'benefits'          => "Freshens breath naturally\nSupports digestive health\nAnti-bacterial and anti-inflammatory\nRich, aromatic flavour — great in chai\nAids detoxification\nReduces bloating and flatulence",
                'ingredients'       => 'Pure Sugarcane Jaggery (94%), Green Cardamom Powder (6%). No additives.',
                'weight'            => '250g',
                'price'             => 200.00,
                'is_featured'       => 0,
                'is_available'      => 1,
                'is_active'         => 1,
                'sort_order'        => 7,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'category_id'       => $catMap['flavoured-jaggery'] ?? null,
                'name'              => 'Tulsi Jaggery',
                'slug'              => 'tulsi-jaggery',
                'short_description' => 'Holy basil-infused jaggery — an Ayurvedic superfood blend that boosts immunity and fights respiratory ailments.',
                'description'       => '<p>Tulsi (Holy Basil) is revered in India as the queen of herbs. When combined with the mineral-rich goodness of pure jaggery, it creates a powerful immunity-boosting treat.</p><p>Waari Tulsi Jaggery is made by carefully infusing dried tulsi leaf extract into warm jaggery syrup before setting. This ensures the volatile phytochemicals in tulsi are preserved.</p><p>Particularly recommended during monsoon and winter seasons to protect against infections, coughs, and colds. Can also be dissolved in warm water as a herbal kadha.</p>',
                'benefits'          => "Boosts immunity — rich in phytochemicals\nNatural adaptogen — reduces stress\nAnti-microbial and anti-viral properties\nSupports respiratory health\nHelps manage blood sugar levels\nAyurvedic remedy for cold and fever",
                'ingredients'       => 'Pure Sugarcane Jaggery (93%), Holy Basil (Tulsi) Leaf Extract (7%). No additives.',
                'weight'            => '250g',
                'price'             => 210.00,
                'is_featured'       => 1,
                'is_available'      => 1,
                'is_active'         => 1,
                'sort_order'        => 8,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],

            // ── JAGGERY SYRUP ────────────────────────────────────────────────
            [
                'category_id'       => $catMap['jaggery-syrup'] ?? null,
                'name'              => 'Pure Jaggery Liquid Syrup',
                'slug'              => 'pure-jaggery-liquid-syrup',
                'short_description' => 'Smooth, pourable liquid jaggery syrup — perfect as a natural substitute for refined sugar syrup in beverages and desserts.',
                'description'       => '<p>Waari\'s Pure Jaggery Liquid Syrup is crafted by dissolving premium jaggery in a controlled ratio to create a perfectly viscous, golden syrup. It flows easily and blends instantly into both hot and cold preparations.</p><p>Drizzle over pancakes, waffles, or idli. Mix into your coffee or smoothie. Use it in baking as a natural sugar substitute. The possibilities are endless.</p><p>Unlike commercial glucose syrups and sugar syrups, our jaggery syrup contains no corn syrup, no high-fructose ingredients, and no preservatives.</p>',
                'benefits'          => "Instant dissolving — no need to break blocks\nRetains all natural minerals of jaggery\nNo corn syrup or artificial thickeners\nLower GI than refined sugar syrup\nVersatile — beverages, baking, desserts\nConvenient squeeze bottle packaging",
                'ingredients'       => 'Pure Sugarcane Jaggery, Filtered Water. No preservatives.',
                'weight'            => '400ml',
                'price'             => 240.00,
                'is_featured'       => 0,
                'is_available'      => 1,
                'is_active'         => 1,
                'sort_order'        => 9,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],

            // ── GIFT COMBOS ──────────────────────────────────────────────────
            [
                'category_id'       => $catMap['gift-combos'] ?? null,
                'name'              => 'Waari Wellness Gift Box',
                'slug'              => 'waari-wellness-gift-box',
                'short_description' => 'A thoughtfully curated gift set with 3 Waari bestsellers — ideal for Diwali, Holi, birthdays, and corporate gifting.',
                'description'       => '<p>The Waari Wellness Gift Box is our most popular gifting solution. It includes three of our bestselling products in a beautiful, eco-friendly kraft box with a hand-tied jute ribbon.</p><p><strong>Contents:</strong></p><ul><li>Pure Sugarcane Jaggery Powder (250g)</li><li>Ginger Jaggery (150g)</li><li>Kolhapuri Jaggery Block (250g)</li></ul><p>Each box comes with a personalised message card, making it ideal for Diwali, Navratri, birthdays, anniversaries, or corporate health gifting programmes.</p><p>Packaged in 100% recyclable materials. Zero plastic.</p>',
                'benefits'          => "3-product curated selection\nEco-friendly kraft box packaging\nPersonalised message card included\nJute ribbon — zero plastic\nIdeal for festivals and corporate gifting\nAll products are 100% natural and chemical-free",
                'ingredients'       => 'Assorted Waari jaggery products. See individual product labels.',
                'weight'            => '650g (total)',
                'price'             => 599.00,
                'is_featured'       => 1,
                'is_available'      => 1,
                'is_active'         => 1,
                'sort_order'        => 10,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'category_id'       => $catMap['gift-combos'] ?? null,
                'name'              => 'Waari Family Pack Combo',
                'slug'              => 'waari-family-pack-combo',
                'short_description' => 'Everything a family needs to go chemical-free. A 5-product bundle at a special combo price.',
                'description'       => '<p>The Waari Family Pack Combo is designed for households ready to make the complete switch to natural sweeteners. This generous 5-product bundle covers all your sweetening needs for the month.</p><p><strong>Contents:</strong></p><ul><li>Organic Jaggery Powder (500g)</li><li>Coconut Jaggery Powder (250g)</li><li>Traditional Jaggery Block (500g)</li><li>Cardamom Jaggery (250g)</li><li>Pure Jaggery Liquid Syrup (400ml)</li></ul><p>Save 20% compared to buying each product separately. Packed in a sturdy cardboard box suitable for storage.</p>',
                'benefits'          => "5 products — complete natural sweetener kit\n20% savings over individual pricing\nSuitable for all cooking needs\nMix of textures — powder, block, syrup\nFlavoured options for variety\nEnough to last a family a full month",
                'ingredients'       => 'Assorted Waari jaggery products. See individual product labels.',
                'weight'            => '1.9kg (total)',
                'price'             => 999.00,
                'is_featured'       => 1,
                'is_available'      => 1,
                'is_active'         => 1,
                'sort_order'        => 11,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
        ];

        $this->db->table('products')->insertBatch($products);
    }
}
