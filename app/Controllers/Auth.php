<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // ── Login ────────────────────────────────────────────────────
    public function login(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (session()->get('user_logged_in')) {
            return redirect()->to(base_url('profile'));
        }

        return view('pages/auth/login', $this->sharedData([
            'page_title' => 'Login',
            'validation' => \Config\Services::validation(),
        ]));
    }

    public function loginPost(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                             ->with('error', 'Please enter a valid email and password.');
        }

        $model = new UserModel();
        $user  = $model->findByEmail($this->request->getPost('email'));

        if (! $user || ! $model->verifyPassword($this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->withInput()
                             ->with('error', 'Invalid email or password.');
        }

        if (! $user['is_active']) {
            return redirect()->back()->withInput()
                             ->with('error', 'Your account has been deactivated. Please contact us.');
        }

        // Start session
        session()->set([
            'user_logged_in' => true,
            'user_id'        => $user['id'],
            'user_name'      => $user['name'],
            'user_email'     => $user['email'],
        ]);

        $redirect = session()->getFlashdata('redirect_after_login') ?? base_url('profile');
        return redirect()->to($redirect)->with('success', 'Welcome back, ' . $user['name'] . '!');
    }

    // ── Register ─────────────────────────────────────────────────
    public function register(): string|\CodeIgniter\HTTP\RedirectResponse
    {
        if (session()->get('user_logged_in')) {
            return redirect()->to(base_url('profile'));
        }

        return view('pages/auth/register', $this->sharedData([
            'page_title' => 'Create Account',
            'validation' => \Config\Services::validation(),
        ]));
    }

    public function registerPost(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'name'             => 'required|min_length[2]|max_length[100]',
            'email'            => 'required|valid_email|max_length[150]|is_unique[users.email]',
            'phone'            => 'permit_empty|max_length[20]',
            'password'         => 'required|min_length[8]',
            'confirm_password' => 'required|matches[password]',
        ];

        $messages = [
            'email'            => ['is_unique' => 'This email address is already registered.'],
            'confirm_password' => ['matches'   => 'Passwords do not match.'],
            'password'         => ['min_length'=> 'Password must be at least 8 characters.'],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()->withInput()
                             ->with('error', 'Please correct the errors below.');
        }

        $model = new UserModel();
        $model->insert([
            'name'      => $this->request->getPost('name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'is_active' => 1,
        ]);

        $user = $model->findByEmail($this->request->getPost('email'));

        session()->set([
            'user_logged_in' => true,
            'user_id'        => $user['id'],
            'user_name'      => $user['name'],
            'user_email'     => $user['email'],
        ]);

        return redirect()->to(base_url('profile'))
                         ->with('success', 'Welcome to Waari, ' . $user['name'] . '! Your account has been created.');
    }

    // ── Logout ───────────────────────────────────────────────────
    public function logout(): \CodeIgniter\HTTP\RedirectResponse
    {
        session()->destroy();
        return redirect()->to(base_url('/'))
                         ->with('success', 'You have been logged out successfully.');
    }
}
