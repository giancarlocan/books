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

                    @if (Auth::user()->is_parent)
                        <script type="text/javascript" src="/js/approve_report.js"></script>
                        <div class="mt-24">
                            <p class="mb-6">
                                Approve or Reject this report
                            </p>

                            @if ($report->user_id_approved != 0)
                                <p class="mb-6">
                                    This report was approved on {{ $report->approved_at }}.
                                </p>
                            @else
                                <form method="post" action="/report/approve" id="report_approve_frm">
                                    @csrf
                                    <input type="hidden" name="report_id" value="{{ $report->id }}" />
                                    <input type="hidden" id="is_approved" name="is_approved" value="" />

                                    <p class="mb-6">
                                        <x-secondary-button class="approve" type="button" data-is_approved="1">
                                            Approve
                                        </x-secondary-button>
                                        <x-secondary-button class="approve" type="button" data-is_approved="0">
                                            Reject
                                        </x-secondary-button>
                                    </p>
                                </form>
                            @endif

                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
