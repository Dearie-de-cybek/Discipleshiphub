<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with('uploader')
            ->orderBy('week_number')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.resources.index', compact('resources'));
    }

    public function create()
    {
        return view('admin.resources.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'week_number' => 'required|integer|min:1|max:12',
            'type' => 'required|in:document,video,audio,link,other',
            'file' => 'nullable|file|max:51200', // 50MB max
            'external_link' => 'nullable|url',
            'is_published' => 'boolean',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('resources', 'public');
            $validated['file_path'] = $path;
        }

        $validated['uploaded_by'] = auth()->id();
        $validated['is_published'] = $request->has('is_published');

        Resource::create($validated);

        return redirect()->route('admin.resources.index')
            ->with('success', 'Resource uploaded successfully!');
    }

    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', compact('resource'));
    }

    public function update(Request $request, Resource $resource)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'week_number' => 'required|integer|min:1|max:12',
            'type' => 'required|in:document,video,audio,link,other',
            'file' => 'nullable|file|max:51200',
            'external_link' => 'nullable|url',
            'is_published' => 'boolean',
        ]);

        // Handle new file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($resource->file_path) {
                Storage::disk('public')->delete($resource->file_path);
            }
            $path = $request->file('file')->store('resources', 'public');
            $validated['file_path'] = $path;
        }

        $validated['is_published'] = $request->has('is_published');

        $resource->update($validated);

        return redirect()->route('admin.resources.index')
            ->with('success', 'Resource updated successfully!');
    }

    public function destroy(Resource $resource)
    {
        // Delete file if exists
        if ($resource->file_path) {
            Storage::disk('public')->delete($resource->file_path);
        }

        $resource->delete();

        return redirect()->route('admin.resources.index')
            ->with('success', 'Resource deleted successfully!');
    }
}