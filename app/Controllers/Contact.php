<?php

namespace App\Controllers;

use App\Models\EnquiryModel;

class Contact extends BaseController
{
    public function index(): string
    {
        $data = $this->sharedData([
            'page_title'      => 'Contact Us',
            'meta_description'=> 'Get in touch with Waari — Shrutika Nutrilite Foods PVT LTD. We\'d love to hear from you.',
            'validation'      => \Config\Services::validation(),
        ]);

        return view('pages/contact', $data);
    }

    public function submit(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'name'    => 'required|min_length[2]|max_length[100]',
            'email'   => 'required|valid_email|max_length[150]',
            'phone'   => 'permit_empty|max_length[20]',
            'subject' => 'permit_empty|max_length[200]',
            'message' => 'required|min_length[10]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                             ->withInput()
                             ->with('error', 'Please correct the errors and try again.');
        }

        $model = new EnquiryModel();
        $model->insert([
            'user_id' => session()->get('user_id'),
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'subject' => $this->request->getPost('subject') ?: 'General Enquiry',
            'message' => $this->request->getPost('message'),
            'status'  => 'new',
        ]);

        return redirect()->to(base_url('contact'))
                         ->with('success', 'Thank you! Your message has been received. We will get back to you within 24 hours.');
    }
}
