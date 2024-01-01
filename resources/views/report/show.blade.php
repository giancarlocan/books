<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            "{{ $report->book->title }}" Report
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <p class="mb-6">
                        Book report on "{{ $report->book->title }}"
                    </p>

                    <p class="mb-6">
                        By {{ $report->author->name }}
                    </p>

                    <p class="mb-6">
                        On {{ $report->created_at }}
                    </p>

                    <h1 class="text-2xl font-black">Rating</h1>
                    <p class="mb-6">
                        @switch($report->rating)
                            @case(1)
                                I strongly disliked this book.
                                @break
                            @case(2)
                                I disliked this book.
                                @break
                            @case(3)
                                I thought the book was okay.
                                @break
                            @case(4)
                                I liked this book.
                                @break
                            @case(5)
                                I strongly liked this book.
                                @break
                        @endswitch
                    </p>

                    <h1 class="text-2xl font-black">Report</h1>
                    {!! nl2br(htmlspecialchars($report->description)) !!}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
