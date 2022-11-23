@props(['disabled' => false])

<div class="border-b border-gray-800 focus-within:border-gray-600">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full bg-white border-0 border-b border-transparent focus:border-gray-800 focus:ring-0 text-sm']) !!} type="text" name="" id="" placeholder="">
</div>
