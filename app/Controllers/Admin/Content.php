<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AboutContentModel;
use App\Models\ContactInfoModel;

class Content extends BaseController
{
    public function about(): string
    {
        $model   = new AboutContentModel();
        $content = $model->getAllAsKeyedArray();

        return view('admin/content/about', [
            'page_title' => 'Update About Page Content',
            'content'    => $content,
        ]);
    }

    public function updateAbout(): \CodeIgniter\HTTP\RedirectResponse
    {
        $model = new AboutContentModel();
        $posts = $this->request->getPost();

        foreach ($posts as $key => $val) {
            if (in_array($key, ['tagline', 'brand_story', 'mission', 'vision', 'quality_promise'], true)) {
                $model->updateValue($key, $val);
            }
        }

        return redirect()->to(base_url('admin/content/about'))->with('success', 'About page content updated successfully!');
    }

    public function contact(): string
    {
        $model = new ContactInfoModel();
        $info  = $model->getAllAsKeyedArray();

        return view('admin/content/contact', [
            'page_title' => 'Manage Contact Information',
            'info'       => $info,
        ]);
    }

    public function updateContact(): \CodeIgniter\HTTP\RedirectResponse
    {
        $model = new ContactInfoModel();
        $posts = $this->request->getPost();

        $allowedKeys = [
            'company_name', 'phone', 'whatsapp', 'email', 'fssai_number',
            'address_line1', 'address_line2', 'address_city', 'address_state',
            'address_pincode', 'business_hours', 'facebook_url', 'instagram_url', 'youtube_url'
        ];

        foreach ($posts as $key => $val) {
            if (in_array($key, $allowedKeys, true)) {
                $model->updateValue($key, $val);
            }
        }

        return redirect()->to(base_url('admin/content/contact'))->with('success', 'Contact information updated successfully!');
    }
}
