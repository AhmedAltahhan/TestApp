<?php

namespace App\Services;

use App\Models\Result;
use App\Models\User;

class StudentService
{

    public function all()
    {
        $students = User::where('type','student')->latest()->paginate(6);
        return $students;
    }

    public function store(array $data)
    {
        $student = User::create([
            'name' => $data['name'],
            'username' => str()->lower($data['username']),
            'email' =>  $data['email'],
            'password' => bcrypt($data['password']),
            'type' => 'student',
        ]);
        $student->assignRole('student');
        return $student;
    }

    public function destroy(string $id)
    {
        User::whereId($id)->delete();
    }
    
    public function result()
    {
        $results = Result::with('user')->with('test')->latest()->paginate(6);
        return $results;
    }

    public function search(array $data)
    {
        $search = $data['search'];
        $students=User::where('type','student')->where(function($query) use ($search){
            $query->where('name','like',"%$search%");
        })->paginate(5);
        return $students;
    }

    public function profile($id)
    {
        $students = User::whereId($id)->get();
        return $students;
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
    














    // public function update($id ,array $data)
    // {
    //     return User::whereId($id)->update([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'username'=> str()->lower($data['username']),
    //     ]);
    // }


    // public function edit(string $id)
    // {
    //     $user=User::whereId($id)->get();
    //     return $user;
    // }

}
