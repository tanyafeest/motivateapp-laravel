@props(['disabled' => false])

<div class="mt-1 border-b border-gray-800 focus-within:border-gray-600">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full border-0 border-b border-transparent bg-neutral-100 focus:border-gray-800 focus:ring-0 sm:text-sm']) !!} type="text" name="" id="" placeholder="">
</div>
