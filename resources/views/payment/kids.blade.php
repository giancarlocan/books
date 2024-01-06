<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Kid Payments
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <ul class="list list-outside list-disc ml-6">
                        @foreach ($payouts as $payout)
                            <li class="mb-4">
                                {{ $payout->payout }} was paid out to {{ $payout->kid->name }} on {{ $payout->created_at }}
                            </li>
                        @endforeach
                    </ul>

                    <ul class="list list-outside list-disc ml-6">
                        @foreach ($earnings as $earning)
                            <li class="mb-4">
                                {{ $earning->payment }} was earned by {{ $earning->kid->name }} on {{ $payout->approved_at }}
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
