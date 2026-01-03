@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Edit News Article</h2>
                <p class="text-gray-500 text-sm">Update your story for your visitors.</p>
            </div>
            <a href="{{ route('admin.news.index') }}"
                class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center transition-colors">
                <i class="bi bi-arrow-left mr-1"></i> Back to List
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title"
                            class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Article Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-lg transition-all">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content"
                            class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Content</label>
                        <textarea name="content" id="content" rows="10" required
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-all">{{ old('content', $news->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Featured
                            Image</label>
                        @if($news->image)
                            <div class="mb-4">
                                <img src="{{ Storage::url($news->image) }}" class="w-48 h-32 object-cover rounded-xl shadow-md">
                            </div>
                        @endif
                        <div
                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-blue-400 transition-colors">
                            <div class="space-y-1 text-center font-medium">
                                <i class="bi bi-image text-4xl text-gray-400 mb-2 block"></i>
                                <div class="flex text-sm text-gray-600">
                                    <label for="image"
                                        class="relative cursor-pointer bg-white rounded-md font-semibold text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Change image</span>
                                        <input id="image" name="image" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Publication Status -->
                    <div class="pt-6 border-t border-gray-100 flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="is_published" name="is_published" type="checkbox" {{ $news->is_published ? 'checked' : '' }}
                                class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition-all">
                            <label for="is_published"
                                class="ml-3 text-sm font-bold text-gray-900 uppercase tracking-widest">Published</label>
                        </div>

                        <button type="submit"
                            class="px-10 py-3 bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 transition transform hover:-translate-y-1">
                            Update Article
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection