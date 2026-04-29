<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Header --}}
                    <div class="flex items-center gap-3 mb-6">
                        <a href="{{ route('category.index') }}"
                           class="p-1.5 rounded-md text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            ←
                        </a>

                        <div>
                            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">
                                Add Category
                            </h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Fill in the details to add a new category
                            </p>
                        </div>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('category.store') }}" method="POST" class="space-y-5">
                        @csrf

                        {{-- Name --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Category Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   placeholder="e.g. Electronic, Food, Furniture"
                                   class="w-full px-4 py-2.5 rounded-lg border text-sm
                                   @error('name') border-red-400 bg-red-50 dark:bg-red-900/20 @else border-gray-300 dark:border-gray-600 @enderror
                                   bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                                   focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            @error('name')
                                <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Actions --}}
                        <div class="flex items-center justify-end gap-3 pt-2">
                            <a href="{{ route('category.index') }}"
                               class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300
                               hover:bg-gray-300 dark:hover:bg-gray-600 rounded-lg font-medium transition">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg font-medium transition">
                                Save Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>