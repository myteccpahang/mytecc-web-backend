<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Link;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $links = Link::all()->where('status', 'Enabled');
        $users = User::all();
        // $products = Product::all();
        // $orders = Order::all();
        return view('dashboard', compact('users','links'));
    }
}
