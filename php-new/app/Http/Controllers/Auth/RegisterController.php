<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    public function register(Request $request)
    {

        try {
             //print_r($request->post());
            
        
            // $validation = $request->validate([
            //     'name' => ['required', 'string', 'max:255'],
            //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // ]);

    

            $user = Users::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect('/chat');
        } catch (Exception $e) {
            print_r($e->getMessage());
            exit();
        }
       
    }
}