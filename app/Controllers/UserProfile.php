<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\EnquiryModel;

class UserProfile extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // ── Middleware: check if user is logged in ───────────────────
    protected function requireLogin(): ?\CodeIgniter\HTTP\RedirectResponse
    {
        if (! session()->get('user_logged_in')) {
            session()->setFlashdata('redirect_after_login', current_url());
            return redirect()->to(base_url('login'))
                             ->with('error', 'Please login to access this page.');
        }
        return null;
    }

    // ── Profile view ─────────────────────────────────────────────
    public function index(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if ($check = $this->requireLogin()) {
            return $check;
        }

        $userId = session()->get('user_id');
        $user   = $this->userModel->find($userId);

        if (! $user) {
            session()->destroy();
            return redirect()->to(base_url('login'))
                             ->with('error', 'Session expired. Please login again.');
        }

        $data = $this->sharedData([
            'page_title' => 'My Profile',
            'user'       => $user,
            'validation' => \Config\Services::validation(),
        ]);

        return view('pages/profile/index', $data);
    }

    // ── Update profile ───────────────────────────────────────────
    public function update(): \CodeIgniter\HTTP\RedirectResponse
    {
        if ($check = $this->requireLogin()) {
            return $check;
        }

        $userId = session()->get('user_id');

        $rules = [
            'name'  => 'required|min_length[2]|max_length[100]',
            'phone' => 'permit_empty|max_length[20]',
            'address' => 'permit_empty',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                             ->with('error', 'Please correct the form errors.');
        }

        $this->userModel->update($userId, [
            'name'    => $this->request->getPost('name'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ]);

        session()->set('user_name', $this->request->getPost('name'));

        return redirect()->to(base_url('profile'))
                         ->with('success', 'Profile updated successfully!');
    }

    // ── Change password ──────────────────────────────────────────
    public function changePassword(): \CodeIgniter\HTTP\RedirectResponse
    {
        if ($check = $this->requireLogin()) {
            return $check;
        }

        $userId = session()->get('user_id');
        $user   = $this->userModel->find($userId);

        $rules = [
            'current_password' => 'required',
            'new_password'     => 'required|min_length[8]',
            'confirm_password' => 'required|matches[new_password]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                             ->with('error', 'Please check the form and try again.');
        }

        if (! $this->userModel->verifyPassword($this->request->getPost('current_password'), $user['password'])) {
            return redirect()->back()
                             ->with('error', 'Current password is incorrect.');
        }

        $this->userModel->update($userId, [
            'password' => password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to(base_url('profile'))
                         ->with('success', 'Password changed successfully!');
    }

    // ── My enquiries ─────────────────────────────────────────────
    public function enquiries(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if ($check = $this->requireLogin()) {
            return $check;
        }

        $userId       = session()->get('user_id');
        $enquiryModel = new EnquiryModel();
        $enquiries    = $enquiryModel->getByUser($userId);

        $data = $this->sharedData([
            'page_title' => 'My Enquiries',
            'enquiries'  => $enquiries,
        ]);

        return view('pages/profile/enquiries', $data);
    }
}
