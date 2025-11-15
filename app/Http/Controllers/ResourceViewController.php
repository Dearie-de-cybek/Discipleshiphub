<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceViewController extends Controller
{
    public function index()
    {
        // Get all published resources grouped by week
        $resources = Resource::where('is_published', true)
            ->orderBy('week_number', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        $resourcesByWeek = $resources->groupBy('week_number');
        
        // Get statistics
        $totalWeeks = $resourcesByWeek->count();
        $totalResources = $resources->count();
        
        // Count by type
        $videoCount = $resources->where('type', 'video')->count();
        $audioCount = $resources->where('type', 'audio')->count();
        $documentCount = $resources->where('type', 'document')->count();

        return view('resources.index', compact(
            'resourcesByWeek', 
            'totalWeeks', 
            'totalResources',
            'videoCount',
            'audioCount',
            'documentCount'
        ));
    }
}