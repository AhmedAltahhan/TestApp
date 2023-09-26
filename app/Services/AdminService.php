<?php

namespace App\Services;

use App\Models\User;

class AdminService
{

    public function index($id)
    {
        $admin = User::whereId($id)->get();
        return $admin;
    }

    public function update($id ,array $data)
    {
        return User::whereId($id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'username'=> str()->lower($data['username']),
        ]);
    }

    public function edit(string $id)
    {
        $user=User::whereId($id)->get();
        return $user;
    }
}
