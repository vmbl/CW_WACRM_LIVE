<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Profile; // Assuming you have a Profile model

class ProfileController extends Controller
{
    /**
     * Display the profile page
     */
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile; // Assuming you have a relationship set up
        
        // Check if user has a profile
        $hasProfile = $profile !== null;
        
        return view('profile', compact('user', 'profile', 'hasProfile'));
    }

    /**
     * Store a new profile
     */
    public function store(Request $request)
    {
        return $this->saveProfile($request, false);
    }

    /**
     * Update existing profile
     */
    public function update(Request $request)
    {
        return $this->saveProfile($request, true);
    }

    /**
     * Handle both create and update operations
     */
    private function saveProfile(Request $request, $isUpdate = false)
    {
        $user = Auth::user();
    //    dd($request->all());

        // Validation rules
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:profiles,username',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:800'
        ];

        // If updating, modify username validation to ignore current user
        if ($isUpdate && $user->profile) {
            $rules['username'] = 'required|string|max:255|unique:profiles,username,' . $user->profile->id;
        }

        // Email uniqueness check (excluding current user)
        $rules['email'] = 'required|email|max:255|unique:users,email,' . $user->id;

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Handle profile image upload
            $profileImageBase64 = null;
            $profileImageName = null;
            
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $imageData = base64_encode(file_get_contents($image->getRealPath()));
                $mimeType = $image->getMimeType();
                $profileImageBase64 = 'data:' . $mimeType . ';base64,' . $imageData;
                $profileImageName = $image->getClientOriginalName();
            }

            // Prepare profile data
            $profileData = [
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'email'=>$request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
            ];

            // Add image data if uploaded
            if ($profileImageBase64) {
                $profileData['profile_image'] = $profileImageName;
                $profileData['profile_image_base64'] = $profileImageBase64;
            }

            if ($isUpdate && $user->profile) {
                // Update existing profile
                $user->profile->update($profileData);
                $message = 'Profile updated successfully!';
            } else {
                // Create new profile
                Profile::create($profileData);
                $message = 'Profile created successfully!';
            }

            // Update user email if changed
            if ($user->email !== $request->email) {
                $user->update(['email' => $request->email]);
            }

            return back()->with('success', $message);

        } catch (\Exception $e) {
            \Log::error('Profile save error: ' . $e->getMessage());
            return back()
                ->with('error', 'An error occurred while saving your profile. Please try again.')
                ->withInput();
        }
    }
}

