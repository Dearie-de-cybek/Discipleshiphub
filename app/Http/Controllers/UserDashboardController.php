<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\DailyDevotion;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Initialize discipleship progress if needed
        $user->initializeProgress();
        
        // Get published resources
        $resources = Resource::where('is_published', true)
            ->orderBy('week_number', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        $resourcesByWeek = $resources->groupBy('week_number');

      

        return view('dashboard', compact('resources', 'resourcesByWeek'));
    }
}