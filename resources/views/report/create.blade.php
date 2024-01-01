<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $read->book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="post" action="/report/create" id="report_frm">
                        @csrf
                        <input type="hidden" name="read_id" value="{{ $read->id }}" />
                        <input type="hidden" name="book_id" value="{{ $read->book->id }}" />

                        <p class="mb-6">
                            <x-input-label for="rating" value="Did you like this book?" />
                            <x-input-error :messages="$errors->isbn->get('rating')" class="mt-2" />
                            <select id="rating" name="rating" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="0"></option>
                                <option value="1">Strongly disliked it!</option>
                                <option value="2">Disliked it.</option>
                                <option value="3">It was okay.</option>
                                <option value="4">Liked it.</option>
                                <option value="5">Strongly liked it!</option>
                            </select>
                        </p>

                        <p class="mb-6">
                            <x-input-label for="description">Describe the book "{{ $read->book->title }}"</x-input-label>
                            <x-input-error :messages="$errors->isbn->get('description')" class="mt-2" />
                            <textarea
                                id="description"
                                name="description"
                                class="w-full h-24 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                ></textarea>
                        </p>

                        <p class="mb-6">
                            <x-primary-button>
                                Save Report
                            </x-primary-button>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
