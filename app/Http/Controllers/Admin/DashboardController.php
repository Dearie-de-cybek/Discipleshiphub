<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::where('role', 'user')->count(),
            'total_resources' => Resource::count(),
            'published_resources' => Resource::where('is_published', true)->count(),
            'recent_users' => User::where('role', 'user')->latest()->take(5)->get(),
            'recent_resources' => Resource::with('uploader')->latest()->take(5)->get(),
        ];

        return view('admin.dashboard', $stats);
    }
}