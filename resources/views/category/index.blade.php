<x-app-layout>
    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-gray-200 dark:border-gray-700 p-8">
                
                {{-- Header Section --}}
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight">Category List</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Manage your category</p>
                    </div>
                    
                    {{-- Tombol Add Category hanya untuk Admin --}}
                    @can('isAdmin')
                    <a href="{{ route('category.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-lg shadow-md transition-all duration-200 active:scale-95 border border-indigo-500">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Category
                    </a>
                    @endcan
                </div>

                {{-- Alert Success --}}
                @if (session('success'))
                    <div class="mb-6 p-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200 dark:bg-green-900/30 dark:text-green-300 dark:border-green-800">
                        <span class="font-bold">{{ session('success') }}</span>
                    </div>
                @endif

                {{-- Table Section --}}
                <div class="relative overflow-hidden shadow-inner rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200/50 dark:bg-gray-700 dark:text-gray-300 font-black">
                            <tr>
                                <th class="px-6 py-4">#</th>
                                <th class="px-6 py-4">NAME</th>
                                <th class="px-6 py-4">TOTAL PRODUCT</th>
                                <th class="px-6 py-4 text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($categories as $category)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-indigo-50/50 dark:hover:bg-indigo-900/20 transition-colors">
                                <td class="px-6 py-4 font-medium text-gray-400">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-bold text-gray-900 dark:text-white text-base">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400 rounded-full text-xs font-black">
                                        {{ $category->products_count }} Products
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-4">
                                        @can('isAdmin')
                                        <a href="{{ route('category.edit', $category->id) }}" class="font-bold text-amber-500 hover:text-amber-700 transition-colors">Edit</a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?')" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="font-bold text-red-500 hover:text-red-700 transition-colors">Delete</button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-20 text-center text-gray-500 dark:text-gray-400 italic">
                                    No category found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>