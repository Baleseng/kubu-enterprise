<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredAdminController extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'mobile' => 'required|string|mobile|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            'urlfolder' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),

            'urlfolder' => $request->urlfolder,
            'status' => $request->status,
        ]);

        event(new Registered($admin));

        Auth::guard('admin')->login($admin);

        return redirect('/admin/dashboard');
    }
}
