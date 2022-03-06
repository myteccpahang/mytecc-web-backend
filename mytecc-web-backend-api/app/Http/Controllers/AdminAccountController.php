<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $data['admin'] = Admin::findOrFail($username);
        return view('profile.account', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAccount(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $request->validate([
            'email' => 'required|email|unique:admins,email,'.$admin->id,
        ]);

        try {
            $admin->update([
                'email' => $request->email,
            ]);

            return redirect()->back()->with('success', 'Profile updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $data = $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|confirmed|min:8|different:current_password',
        ]);

        try {
            $admin = Admin::findOrFail($id);

            if(!Hash::check($data['current_password'], $admin->password)) {
                return redirect()->back()->with('error', 'Current password not match our record.');

            }
            else {
                $admin->update([
                    'password' => Hash::make($data['password']),
                ]);

                return redirect()->back()->with('success', 'Password updated successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
