<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerRegisterController extends Controller
{
    public function employerRegister() {
        $user =  User::create([
            'name' => 'company name',
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type')
        ]);

        Company::create([
            'user_id' => $user->id,
            'cname' => request('cname'),
            'slug' => Str::slug(request('cname')),            
        ]);
        return redirect()->to('login');
    }
}
