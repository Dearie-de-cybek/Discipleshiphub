<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Resource') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.resources.update', $resource) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title *</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $resource->title) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $resource->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Week Number -->
                        <div class="mb-4">
                            <label for="week_number" class="block text-sm font-medium text-gray-700">Week Number *</label>
                            <select name="week_number" id="week_number" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @for($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ old('week_number', $resource->week_number) == $i ? 'selected' : '' }}>
                                        Week {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            @error('week_number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Type -->
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700">Resource Type *</label>
                            <select name="type" id="type" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="document" {{ old('type', $resource->type) == 'document' ? 'selected' : '' }}>Document</option>
                                <option value="video" {{ old('type', $resource->type) == 'video' ? 'selected' : '' }}>Video</option>
                                <option value="audio" {{ old('type', $resource->type) == 'audio' ? 'selected' : '' }}>Audio</option>
                                <option value="link" {{ old('type', $resource->type) == 'link' ? 'selected' : '' }}>External Link</option>
                                <option value="other" {{ old('type', $resource->type) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Current File Info -->
                        @if($resource->file_path)
                            <div class="mb-4 p-4 bg-gray-50 rounded-md">
                                <p class="text-sm text-gray-700">Current file: 
                                    <a href="{{ Storage::url($resource->file_path) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">
                                        {{ basename($resource->file_path) }}
                                    </a>
                                </p>
                            </div>
                        @endif

                        <!-- File Upload -->
                        <div class="mb-4">
                            <label for="file" class="block text-sm font-medium text-gray-700">Upload New File (Optional)</label>
                            <input type="file" name="file" id="file"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="mt-1 text-sm text-gray-500">Leave empty to keep current file. Max file size: 50MB</p>
                            @error('file')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- External Link -->
                        <div class="mb-4">
                            <label for="external_link" class="block text-sm font-medium text-gray-700">External Link</label>
                            <input type="url" name="external_link" id="external_link" value="{{ old('external_link', $resource->external_link) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('external_link')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Published Status -->
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $resource->is_published) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <span class="ml-2 text-sm text-gray-700">Published</span>
                            </label>
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center justify-end gap-4">
                            <a href="{{ route('admin.resources.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md">
                                Update Resource
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>