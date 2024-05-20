<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    // Show user profile
    public function showProfile()
    {
        $user = Auth::user();
        $title = "User Information";
        return view('profile', compact('title', 'user'));
    }

    // Edit user profile
    public function editProfile()
    {
        $title = "Edit Profile";
        return view('editProfile', ['title' => $title, 'user' => auth()->user()]);
    }

    // Update user profile
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        // Validate input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'nullable|string|max:15',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update user information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/profiles'), $imageName);

            // Save the path to the user's profile image
            $user->profile_image = 'images/profiles/' . $imageName;
        }

        $user->save();

        return redirect()->route('account.profile')->with('message', 'Profile updated successfully.');
    }

    // Edit user password
    public function editPassword()
    {
        $title = "Change Password";
        return view('changePassword', ['title' => $title, 'user' => auth()->user()]);
    }

    // Update user password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password1' => 'required|min:6',
            'new_password2' => 'required|same:new_password1',
        ]);

        $user = auth()->user();

        // Check if the current password matches the one in the database
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password1);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
