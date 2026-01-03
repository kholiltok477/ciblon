@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                <h2 class="text-2xl leading-tight">Team Members</h2>
                <div class="text-end">
                    <a href="{{ route('admin.team.create') }}"
                        class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-blue-200">
                        Add New Member
                    </a>
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Name / Role
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Bio
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Links
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamMembers as $member)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                @if ($member->image)
                                                    <img class="w-full h-full rounded-full object-cover"
                                                                src="{{ asset('storage/' . $member->image) }}" alt="" />
                                                @else
                                                     <div class="w-full h-full rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                                                        <i class="bi bi-person-fill"></i>
                                                     </div>
                                                @endif
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $member->name }}
                                                </p>
                                                 <p class="text-gray-500 text-xs whitespace-no-wrap">
                                                    {{ $member->role }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ Str::limit($member->bio, 50) }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex space-x-2">
                                            @if($member->github_link) <i class="bi bi-github text-gray-600"></i> @endif
                                            @if($member->linkedin_link) <i class="bi bi-linkedin text-blue-700"></i> @endif
                                            @if($member->instagram_link) <i class="bi bi-instagram text-pink-600"></i> @endif
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('admin.team.edit', $member->id) }}" class="text-blue-600 hover:text-blue-900">
                                                <i class="bi bi-pencil-square text-lg"></i>
                                            </a>
                                            <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 bg-transparent border-0 p-0">
                                                    <i class="bi bi-trash text-lg"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                        {{ $teamMembers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
