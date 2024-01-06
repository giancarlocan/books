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

                    <p class="mb-6 text-center text-2xl">
                        &#36;{{ number_format(($paymentTotal - $payoutTotal), 2) }}<br>
                        You are owed
                    </p>

                    <p class="mb-6">
                        In total, you have earned &#36;{{ number_format($paymentTotal, 2) }} from reading and have been paid, &#36;{{ number_format($payoutTotal, 2) }}.
                    </p>

                    {{-- <h1>Earnings</h1>
                    <ul class="list list-outside list-disc ml-6">
                        @forelse ($payments as $payment)
                            <li class="mb-4">{{ $payment->created_at }} = &#36;{{ number_format($payment->payout, 2) }}</li>
                        @empty
                            <li>You don't have any earnings yet.</li>
                        @endforelse
                    </ul>

                    <h1>Payouts</h1>
                    <ul class="list list-outside list-disc ml-6">
                        @forelse ($payouts as $payout)
                            <li class="mb-4">{{ $payout->created_at }} = &#36;{{ number_format($payout->payout, 2) }}</li>
                        @empty
                            <li>You don't have any payouts yet.</li>
                        @endforelse
                    </ul> --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
