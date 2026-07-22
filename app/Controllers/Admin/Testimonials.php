<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestimonialModel;

class Testimonials extends BaseController
{
    protected TestimonialModel $testimonialModel;

    public function __construct()
    {
        $this->testimonialModel = new TestimonialModel();
    }

    public function index(): string
    {
        $testimonials = $this->testimonialModel->orderBy('id', 'DESC')->findAll();

        return view('admin/testimonials/index', [
            'page_title'   => 'Manage Customer Testimonials',
            'testimonials' => $testimonials,
        ]);
    }

    public function create(): string
    {
        return view('admin/testimonials/form', [
            'page_title'  => 'Add Testimonial',
            'testimonial' => null,
            'validation'  => \Config\Services::validation(),
        ]);
    }

    public function store(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'customer_name' => 'required|min_length[2]|max_length[100]',
            'message'       => 'required|min_length[5]',
            'rating'        => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please fill in all required fields.');
        }

        $this->testimonialModel->insert([
            'customer_name'     => $this->request->getPost('customer_name'),
            'customer_location' => $this->request->getPost('customer_location'),
            'message'           => $this->request->getPost('message'),
            'rating'            => $this->request->getPost('rating'),
            'is_featured'       => $this->request->getPost('is_featured') ? 1 : 0,
            'is_active'         => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order'        => $this->request->getPost('sort_order') ?: 0,
        ]);

        return redirect()->to(base_url('admin/testimonials'))->with('success', 'Testimonial added successfully!');
    }

    public function edit(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $testimonial = $this->testimonialModel->find($id);
        if (! $testimonial) {
            return redirect()->to(base_url('admin/testimonials'))->with('error', 'Testimonial not found.');
        }

        return view('admin/testimonials/form', [
            'page_title'  => 'Edit Testimonial',
            'testimonial' => $testimonial,
            'validation'  => \Config\Services::validation(),
        ]);
    }

    public function update(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $testimonial = $this->testimonialModel->find($id);
        if (! $testimonial) {
            return redirect()->to(base_url('admin/testimonials'))->with('error', 'Testimonial not found.');
        }

        $rules = [
            'customer_name' => 'required|min_length[2]|max_length[100]',
            'message'       => 'required|min_length[5]',
            'rating'        => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please fill in all required fields.');
        }

        $this->testimonialModel->update($id, [
            'customer_name'     => $this->request->getPost('customer_name'),
            'customer_location' => $this->request->getPost('customer_location'),
            'message'           => $this->request->getPost('message'),
            'rating'            => $this->request->getPost('rating'),
            'is_featured'       => $this->request->getPost('is_featured') ? 1 : 0,
            'is_active'         => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order'        => $this->request->getPost('sort_order') ?: 0,
        ]);

        return redirect()->to(base_url('admin/testimonials'))->with('success', 'Testimonial updated successfully!');
    }

    public function delete(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $this->testimonialModel->delete($id);
        return redirect()->to(base_url('admin/testimonials'))->with('success', 'Testimonial deleted successfully!');
    }
}
