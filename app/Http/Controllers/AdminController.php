<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // Admin Dashboard
    public function index()
    {
        return view('admin.dashboard');
    }

    // List all users
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Admin can view user dashboard
    public function viewUserDashboard($id)
    {
        $user = User::findOrFail($id);

        // Temporarily switch into user account
        auth()->login($user);

        return redirect()->route('home');
    }
}
