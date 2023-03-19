<!-- Name -->
<div class="flex align-middle">
    <x-input-label for="name" :value="__('Name')" class="w-48 mt-4"/>
    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old($user->name ?? 'name')" required autofocus />
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<!-- Email Address -->
<div class="flex align-middle">
    <x-input-label for="email" :value="__('Email')" class="w-48 mt-4"/>
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old($user->email ?? 'email')" required />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<!-- Phone -->
<div class="flex align-middle">
    <x-input-label for="phone" :value="__('Phone')" class="w-48 mt-4" />
    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old($user->phone ?? 'phone')" required />
    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
</div>

<div class="flex align-middle">
    <x-input-label for="role" :value="__('Role')" class="w-48 mt-4" />
    <select name="role" id="role" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">

        @if (isset($user))
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" @if( $role->id == $user->role) selected @endif>{{ $role->nama_role }} </option>
            @endforeach
        @else
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->nama_role }} </option>
            @endforeach
        @endif



    </select>
    <x-input-error class="mt-2" :messages="$errors->get('role')" />
</div>


<!-- Password -->
<div class="flex align-middle">
    <x-input-label for="password" :value="__('Password')" class="w-48 mt-4"/>

    <x-text-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="new-password"  />

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Confirm Password -->
<div class="flex align-middle">
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="w-48 mt-4"/>

    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation" required />

    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>


