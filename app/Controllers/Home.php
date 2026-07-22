<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\TestimonialModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    public function index(): string
    {
        $productModel     = new ProductModel();
        $testimonialModel = new TestimonialModel();
        $categoryModel    = new CategoryModel();

        $data = $this->sharedData([
            'page_title'       => 'Home',
            'meta_description' => 'Waari — 100% natural, chemical-free jaggery products by Shrutika Nutrilite Foods PVT LTD. Pure sugarcane jaggery from Maharashtra.',
            'featured_products'=> $productModel->getFeaturedProducts(6),
            'testimonials'     => $testimonialModel->getFeaturedTestimonials(6),
            'categories'       => $categoryModel->getActiveCategories(),
        ]);

        return view('pages/home', $data);
    }
}
