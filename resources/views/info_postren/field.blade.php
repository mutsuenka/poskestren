<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('info-postren.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div class="flex align-middle">
        <x-input-label for="nama_yayasan" :value="__('Nama Yayasan')" class="w-40 mt-4" />
        <x-text-input id="nama_yayasan" name="nama_yayasan" type="text" class="mt-1 block w-full" :value="old('nama_yayasan', $infoPostren->nama_yayasan)" required autofocus autocomplete="nama_yayasan" />
        <x-input-error class="mt-2" :messages="$errors->get('nama_yayasan')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="nama_postren" :value="__('Nama Postren')" class="w-40 mt-4" />
        <x-text-input id="nama_postren" name="nama_postren" type="text" class="mt-1 block w-full" :value="old('nama_postren', $infoPostren->nama_postren)" required autofocus autocomplete="nama_postren" />
        <x-input-error class="mt-2" :messages="$errors->get('nama_postren')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="alamat" :value="__('Alamat')" class="w-40 mt-4" />
        <x-text-area id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat', $infoPostren->alamat)" required autofocus autocomplete="alamat"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600"
            >{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
