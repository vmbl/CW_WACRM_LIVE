<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Users;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    /**
     * Display the security page with all profiles
     */
    public function index()
    {
        // Fetch all active profiles from MongoDB
        $profiles = Profile::all();
        
        return view('security', compact('profiles'));
    }

    /**
     * Show password update form for specific profile
     */
    public function showPasswordForm($id)
    {
        $users = Users::findOrFail($id);
        
        return view('users.password', compact('users'));
    }

    /**
     * Update password for specific profile
     */
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $users = Users::findOrFail($id);
        
        // Add your password update logic here
        // You might need to update the related User model if password is stored there
        
        return redirect()->route('security')
                        ->with('success', 'Password updated successfully.');
    }

    /**
     * Show edit profile form
     */
    public function editProfile($id)
    {
        $profiles = Profile::findOrFail($id);
        
        return view('security', compact('profiles'));
    }

    /**
     * Update profile information
     */
    public function updateProfile(Request $request, $id)
    {
        $profiles = Profile::findOrFail($id);
dd($request->all());
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:profile,email,' . $id . ',_id',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $profiles->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'username' => $request->username,
            'bio' => $request->bio,
            'job_title' => $request->job_title,
            'company' => $request->company,
        ]);

        return redirect()->route('security')
                        ->with('success', 'Profile updated successfully.');
    }
}