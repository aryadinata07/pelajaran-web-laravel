<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;


class registerController extends Controller
{

    public function index()
        {
            return view('register.index', [
                "title" => "register",
            ]);
        }

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users', 'email')->ignore(auth()->id()),
                ],
                'password' => 'required|string|min:8|confirmed',
            ], [
                'email.unique' => 'The email address has already been taken.',
            ]);
        
            try {
                $user = new User();
                $user->name = $validatedData['name'];
                $user->email = $validatedData['email'];
                $user->password = Hash::make($validatedData['password']);
                $user->save();
        
                return redirect('/login')->with('success', 'Registration successful!');
            } catch (\Exception $e) {
                return back()->withErrors(['error' => 'Registration failed. Please try again.'])->withInput();
            }
        }
}
