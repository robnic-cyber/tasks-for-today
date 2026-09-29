<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->has('user_id')) {
            return redirect()->to(site_url('tasks'));
        }

        return view('login');
    }

    public function attempt()
    {
        if (! $this->validate([
            'username' => 'required',
            'password' => 'required',
        ])) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        $user = (new UserModel())
            ->where('username', $username)
            ->first();

        if (! $user || ! password_verify($password, $user['password'] ?? '')) {
            return redirect()->to(site_url('login'))
                ->with('error', 'Incorrect username or password.');
        }

        session()->regenerate();
        session()->set('user_id', $user['id']);

        return redirect()->to(site_url('tasks'));
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'));
    }
}