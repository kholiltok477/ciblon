@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">News Management</h2>
            <p class="text-gray-500 text-sm">Create and manage articles for the "Berita Terkini" section.</p>
        </div>
        <a href="{{ route('admin.news.create') }}"
            class="px-5 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-semibold shadow hover:bg-blue-700 transition flex items-center">
            <i class="bi bi-plus-lg mr-2"></i> Create Article
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded shadow-sm flex items-center">
            <i class="bi bi-check-circle-fill text-green-500 mr-3 text-lg"></i>
            <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr
                        class="bg-gray-50 text-xs uppercase text-gray-500 font-semibold tracking-wider border-b border-gray-100">
                        <th class="px-6 py-4">Article</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Author</th>
                        <th class="px-6 py-4">Published Date</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($news as $article)
                        <tr class="hover:bg-gray-50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    @if($article->image)
                                        <img src="{{ Storage::url($article->image) }}"
                                            class="w-16 h-12 object-cover rounded shadow-sm">
                                    @else
                                        <div class="w-16 h-12 bg-gray-100 rounded flex items-center justify-center text-gray-300">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="font-bold text-gray-900 line-clamp-1">{{ $article->title }}</h4>
                                        <span class="text-xs text-gray-400">/{{ $article->slug }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($article->is_published)
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">Published</span>
                                @else
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-600 border border-gray-200">Draft</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $article->author->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $article->published_at ? $article->published_at->format('d M Y') : '-' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div
                                    class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('admin.news.edit', $article) }}"
                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $article) }}" method="POST"
                                        onsubmit="return confirm('Delete this article?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                <i class="bi bi-newspaper text-5xl text-gray-200 mb-3 block"></i>
                                No news articles found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-6 border-t border-gray-100">
            {{ $news->links() }}
        </div>
    </div>
@endsection