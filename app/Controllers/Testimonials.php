<?php

namespace App\Controllers;

use App\Models\TestimonialModel;

class Testimonials extends BaseController
{
    public function index(): string
    {
        $model        = new TestimonialModel();
        $testimonials = $model->getActiveTestimonials();

        $data = $this->sharedData([
            'page_title'      => 'Customer Testimonials',
            'meta_description'=> 'Read what our customers say about Waari\'s natural jaggery products. Real reviews from real customers.',
            'testimonials'    => $testimonials,
        ]);

        return view('pages/testimonials', $data);
    }
}
