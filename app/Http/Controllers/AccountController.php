<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    public function index(){
        return view("body.AccountSettings");
    }


  
    
        public function updatePassword(Request $request)
        {
            // Validate the input
            $validatedData = $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ], [
                'confirm_password.same' => 'The new password and confirm password must match.',
                'current_password' => 'Incoorect Password Provided',
                'new_password.min' => 'password must be atleast 8 characters',
            ]);
        
            // Get the authenticated user
            $user = Auth::user();
        
            // Check if the current password matches the user's password
            if (Hash::check($request->current_password, $user->password)) {
                // Update the user's password
                $user->password = Hash::make($request->new_password);
                $user->save();
        
                return redirect()->back()->with('success', 'Password changed successfully!');
            }
        
            throw ValidationException::withMessages([
                'current_password' => ['The current password is incorrect.'],
            ]);
        }
        
    
}
