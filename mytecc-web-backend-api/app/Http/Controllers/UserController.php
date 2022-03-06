<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|confirmed|min:8|different:current_password',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'status' => 'required|in:Enabled,Disabled',
            'address' => 'string',
            'postcode' => 'integer',
            'city' => 'string',
            'state' => 'string',
        ]);

        try {
            User::create([
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'status' => $data['status'],
                'address' => $data['address'],
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'state' => $data['state'],
            ]);
            return redirect()->route('users.index')->with('success', 'User created successfully.');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] = User::findOrFail($id);
        return view('users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::findOrFail($id);
        return view('users.edit', $data);
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
        $data = $request->validate([
            'email' => 'required|string',
            'username' => 'required|string',
            'current_password' => 'required|string',
            'password' => 'required|string|confirmed|min:8|different:current_password',
        ]);

        try {
            $user = User::findOrFail($id);

            if(!Hash::check($data['current_password'], $user->password)) {
                return redirect()->back()->with('error', 'Current password not match our record.');

            }
            else {
                $user->update([
                    'email' => $data['email'],
                    'username' => $data['username'],
                    'password' => Hash::make($data['password']),
                ]);

                return redirect()->back()->with('success', 'User account updated successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function updateProfile(Request $request, $id)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'status' => 'required|in:Enabled,Disabled',
            'address' => 'string',
            'postcode' => 'integer',
            'city' => 'string',
            'state' => 'string',
        ]);

        try {
            $user = User::findOrFail($id);

            $user->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'status' => $data['status'],
                'address' => $data['address'],
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'state' => $data['state'],
            ]);
            return redirect()->back()->with('success', 'User profile updated successfully.');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
