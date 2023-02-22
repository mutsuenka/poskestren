<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Buat User Baru') }}
        </h2>
    </x-slot:header>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('user.update', $user) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')

                        @include('user.field')

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Update Data User') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
