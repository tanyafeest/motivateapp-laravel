@props(['disabled' => false])

<div class="">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full bg-transparent border-0 border-b border-transparent  focus:ring-0 text-sm']) !!} type="text" name="" id="" placeholder="">
</div>
