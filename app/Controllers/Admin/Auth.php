<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function login(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (session()->get('admin_logged_in')) {
            return redirect()->to(base_url('admin/dashboard'));
        }

        return view('admin/auth/login', [
            'page_title' => 'Admin Login',
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function loginPost(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                             ->with('error', 'Please enter username/email and password.');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new AdminModel();
        $admin = $model->where('email', $username)->first();
        
        // If not found and they just entered 'admin', try the default admin email
        if (! $admin && $username === 'admin') {
            $admin = $model->where('email', 'admin@waari.in')->first();
        }

        if (! $admin || ! $model->verifyPassword($password, $admin['password'])) {
            return redirect()->back()->withInput()
                             ->with('error', 'Invalid admin credentials.');
        }

        if (! $admin['is_active']) {
            return redirect()->back()->withInput()
                             ->with('error', 'Admin account is disabled.');
        }

        // Update last login
        $model->update($admin['id'], ['last_login' => date('Y-m-d H:i:s')]);

      session()->set([
    'admin_logged_in' => true,
    'admin_id'        => $admin['id'],
    'admin_name'      => $admin['name'],
    'admin_email'     => $admin['email'],
]);

        return redirect()->to(base_url('admin/dashboard'))
                         ->with('success', 'Welcome to Waari Admin Dashboard, ' . $admin['name'] . '!');
    }

    public function logout(): \CodeIgniter\HTTP\RedirectResponse
    {
        session()->remove([
    'admin_logged_in',
    'admin_id',
    'admin_name',
    'admin_email'
]);
    }
}
