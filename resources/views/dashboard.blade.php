<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-lg">{{ __("You're logged in!") }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                                Selamat datang, <span class="font-semibold text-gray-700 dark:text-gray-300">{{ Auth::user()->name }}</span>
                            </p>
                        </div>
                        
                        <div class="flex items-center">
                            @if(Auth::user()->role === 'admin')
                                <span class="px-4 py-2 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 rounded-lg font-semibold text-sm border border-red-300 dark:border-red-700">
                                    👑 Admin
                                </span>
                            @else
                                <span class="px-4 py-2 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 rounded-lg font-semibold text-sm border border-blue-300 dark:border-blue-700">
                                    👤 User
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
