@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <h2 class="text-2xl font-semibold leading-tight mb-6">Edit Team Member</h2>

            <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 max-w-2xl">
                <form action="{{ route('admin.team.update', $teamMember->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Name
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                            id="name" type="text" name="name" value="{{ old('name', $teamMember->name) }}" required>
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
                            Role / Position
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('role') border-red-500 @enderror"
                            id="role" type="text" name="role" value="{{ old('role', $teamMember->role) }}" required>
                        @error('role')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="bio">
                            Bio
                        </label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('bio') border-red-500 @enderror"
                            id="bio" name="bio" rows="4">{{ old('bio', $teamMember->bio) }}</textarea>
                        @error('bio')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                            Profile Image
                        </label>
                        @if ($teamMember->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $teamMember->image) }}" alt="Current Image"
                                    class="w-20 h-20 object-cover rounded-full">
                            </div>
                        @endif
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') border-red-500 @enderror"
                            id="image" type="file" name="image">
                        <p class="mt-1 text-sm text-gray-500">Leave blank to keep current image. SVG, PNG, JPG or GIF (MAX.
                            2MB).</p>
                        @error('image')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <h3 class="text-lg font-semibold mt-6 mb-3 border-b pb-2">Social Links (Optional)</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="github_link">
                                GitHub URL
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="github_link" type="url" name="github_link"
                                value="{{ old('github_link', $teamMember->github_link) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="linkedin_link">
                                LinkedIn URL
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="linkedin_link" type="url" name="linkedin_link"
                                value="{{ old('linkedin_link', $teamMember->linkedin_link) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="instagram_link">
                                Instagram URL
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="instagram_link" type="url" name="instagram_link"
                                value="{{ old('instagram_link', $teamMember->instagram_link) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="twitter_link">
                                Twitter/X URL
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="twitter_link" type="url" name="twitter_link"
                                value="{{ old('twitter_link', $teamMember->twitter_link) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="dribbble_link">
                                Dribbble URL
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="dribbble_link" type="url" name="dribbble_link"
                                value="{{ old('dribbble_link', $teamMember->dribbble_link) }}">
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <a href="{{ route('admin.team.index') }}" class="text-gray-600 hover:text-gray-800 mr-4">Cancel</a>
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Update Member
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection