<?php

namespace App\Http\Controllers\Admin;

use App\Models\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        // First, let's check if file was received
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            //         dd([
            //     'hasFile' => $request->hasFile('file'),
            //     'file' => $file,
            //     'error' => $file ? $file->getError() : 'no file object',
            //     'error_message' => $file ? $file->getErrorMessage() : 'no file object',
            //     'upload_max_filesize' => ini_get('upload_max_filesize'),
            //     'post_max_size' => ini_get('post_max_size'),
            // ]);


            // Get the actual error code
            $error = $file->getError();

            // Map error codes to messages
            $errorMessages = [
                UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini (Current: ' . ini_get('upload_max_filesize') . ')',
                UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive in the HTML form',
                UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
                UPLOAD_ERR_NO_FILE => 'No file was uploaded',
                UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
                UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
                UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload',
            ];

            if ($error !== UPLOAD_ERR_OK) {
                $errorMessage = $errorMessages[$error] ?? 'Unknown upload error (Code: ' . $error . ')';
                return back()->withErrors(['file' => $errorMessage])->withInput();
            }
        }

        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'week_number' => 'required|integer|min:1|max:12',
                'type' => 'required|in:document,video,audio,link,other',
                'file' => 'nullable|file|max:51200', // 50MB
                'external_link' => 'nullable|url',
                'is_published' => 'boolean',
            ]);

            // Handle file upload
            if ($request->hasFile('file')) {
                $file = $request->file('file');

                if ($file->isValid()) {
                    try {
                        $path = $file->store('resources', 'public');
                        $validated['file_path'] = $path;
                    } catch (\Exception $e) {
                        return back()->withErrors(['file' => 'Failed to store file: ' . $e->getMessage()])->withInput();
                    }
                } else {
                    return back()->withErrors(['file' => 'The file is not valid'])->withInput();
                }
            }

            $validated['uploaded_by'] = Auth::id();
            $validated['is_published'] = $request->has('is_published');

            Resource::create($validated);

            return redirect()->route('admin.resources.index')
                ->with('success', 'Resource uploaded successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
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
