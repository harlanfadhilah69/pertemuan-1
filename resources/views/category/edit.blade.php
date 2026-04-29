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
                                Edit Category
                            </h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Update the category details
                            </p>
                        </div>
                    </div>

                    {{-- Delete Form --}}
                    <form id="delete-category-form"
                          action="{{ route('category.destroy', $category->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')
                    </form>

                    {{-- Form --}}
                    <form action="{{ route('category.update', $category->id) }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        {{-- Name --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Category Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name', $category->name) }}"
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
                        <div class="flex items-center justify-between pt-2">
                            {{-- Delete Button --}}
                            <button type="submit"
                                    form="delete-category-form"
                                    onclick="return confirm('Are you sure you want to delete this category?')"
                                    class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium rounded-lg text-red-500 hover:bg-red-50 dark:hover:bg-red-900/30 transition">
                                Delete Category
                            </button>

                            <div class="flex items-center gap-3">
                                <a href="{{ route('category.index') }}"
                                   class="px-4 py-2.5 rounded-lg border border-gray-300 dark:border-gray-600 text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    Cancel
                                </a>

                                <button type="submit"
                                        class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-sm transition">
                                    Update Category
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
