<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EnquiryModel;

class Enquiries extends BaseController
{
    protected EnquiryModel $enquiryModel;

    public function __construct()
    {
        $this->enquiryModel = new EnquiryModel();
    }

    public function index(): string
    {
        $enquiries = $this->enquiryModel->select('enquiries.*, products.name as product_name, users.name as user_name')
                                       ->join('products', 'products.id = enquiries.product_id', 'left')
                                       ->join('users', 'users.id = enquiries.user_id', 'left')
                                       ->orderBy('enquiries.id', 'DESC')
                                       ->findAll();

        return view('admin/enquiries/index', [
            'page_title' => 'Customer Enquiries',
            'enquiries' => $enquiries,
        ]);
    }

    public function view(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $enquiry = $this->enquiryModel->select('enquiries.*, products.name as product_name, users.name as registered_user_name')
                                      ->join('products', 'products.id = enquiries.product_id', 'left')
                                      ->join('users', 'users.id = enquiries.user_id', 'left')
                                      ->where('enquiries.id', $id)
                                      ->first();

        if (! $enquiry) {
            return redirect()->to(base_url('admin/enquiries'))->with('error', 'Enquiry not found.');
        }

        return view('admin/enquiries/view', [
            'page_title' => 'View Enquiry #' . $enquiry['id'],
            'enquiry'    => $enquiry,
        ]);
    }

    public function updateStatus(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $status = $this->request->getPost('status');

        if (in_array($status, ['new', 'in_progress', 'resolved', 'closed'], true)) {
            $this->enquiryModel->update($id, ['status' => $status]);
        }

        return redirect()->to(base_url('admin/enquiries/view/' . $id))->with('success', 'Enquiry status updated!');
    }

    public function delete(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $this->enquiryModel->delete($id);
        return redirect()->to(base_url('admin/enquiries'))->with('success', 'Enquiry deleted successfully!');
    }
}
