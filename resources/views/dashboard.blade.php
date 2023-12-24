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

                    <p class="mb-6">
                        Welcome back, {{ Auth::user()->name }}!
                    </p>

                    @if (Auth::user()->is_parent)

                        <p class="mb-6">
                            You are a parent.
                        </p>

                    @else

                        <p class="mb-6">
                            You are NOT a parent.
                        </p>

                        <p class="mb-6">
                            <a href="/reads/create">
                                I want to read a new book.
                            </a>
                        </p>

                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
