<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Get all published resources ordered by week
        $resources = Resource::where('is_published', true)
            ->orderBy('week_number', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Group resources by week for better organization
        $resourcesByWeek = $resources->groupBy('week_number');

        return view('dashboard', compact('resources', 'resourcesByWeek'));
    }
}