<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\EnquiryModel;
use App\Models\GalleryModel;
use App\Models\TestimonialModel;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $productModel     = new ProductModel();
        $categoryModel    = new CategoryModel();
        $enquiryModel     = new EnquiryModel();
        $galleryModel     = new GalleryModel();
        $testimonialModel = new TestimonialModel();

        $stats = [
            'total_products'    => $productModel->countAllResults(),
            'total_categories'  => $categoryModel->countAllResults(),
            'total_enquiries'   => $enquiryModel->countAllResults(),
            'new_enquiries'     => $enquiryModel->where('status', 'new')->countAllResults(),
            'total_gallery'     => $galleryModel->countAllResults(),
            'total_testimonials'=> $testimonialModel->countAllResults(),
        ];

        $recentEnquiries = $enquiryModel->orderBy('created_at', 'DESC')->findAll(5);

        return view('admin/dashboard', [
            'page_title'       => 'Dashboard',
            'stats'            => $stats,
            'recent_enquiries' => $recentEnquiries,
        ]);
    }
}
