@props(['disabled' => false])
@props(['value'])

<textarea rows="4" onclick="this.select()" onfocus="this.select()" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    {{ $value }}
</textarea>
