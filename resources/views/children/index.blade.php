<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Your Children
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <p class="mb-6">
                        <a href="/children/create">
                            <x-primary-button>
                                + Add Child
                            </x-primary-button>
                        </a>
                    </p>

                    @if ($children->count() > 0)
                        <ul class="list list-disc list-outside ml-6">
                            @foreach ($children as $child)
                                <li>
                                    <a href="/children/{{ $child->id }}">
                                        {{ $child->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-6">
                            You don't have children.
                        </p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
