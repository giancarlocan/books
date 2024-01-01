<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Payments
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <p class="mb-6">
                        You are owed: &#36;{{ number_format($payments - $payouts, 2) }}
                    </p>

                    {{-- <ul class="list list-outside list-disc ml-6">
                        @forelse ($payouts as $payout)
                            <li class="mb-4">{{ $payment->created_at }} = &#36;{{ number_format($payment->payout, 2) }}</li>
                        @empty
                            <li>You don't have any payments yet.</li>
                        @endforelse
                    </ul> --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
