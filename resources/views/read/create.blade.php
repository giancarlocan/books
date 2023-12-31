<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            New Read
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <p class="mb-6">
                        This is where you create a new read!
                    </p>

                    <form method="post" action="/reads/create" id="create_frm">
                        @csrf

                        <p class="mb-6">
                            <x-input-label for="isbn" value="ISBN Number" />
                            <x-text-input id="isbn" name="isbn" type="number" class="mt-1 block" />
                            <x-input-error :messages="$errors->isbn->get('isbn')" class="mt-2" />
                        </p>

                        <p class="mb-6">
                            <x-primary-button>
                                Request Read
                            </x-primary-button>
                        </p>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
