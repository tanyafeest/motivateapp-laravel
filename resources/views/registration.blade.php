<x-guest-layout>
    <div id="" class="grid h-screen overflow-hidden " style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
        <div class="relative col-span-1 col-start-1">
            <img class="absolute w-11 h-11 top-8 left-8" src="images/back.svg" alt="">
            <img class="w-12 h-12 mx-auto mt-20" src="images/mm-logo1.png" alt="">
        </div>
        <div class="text-center"> 
            <p class="text-2xl font-extralight"><strong>Create</strong> Your <strong>Account</strong> to</p> 
            <p class="text-3xl font-bold">Get Inspired!</p>
        </div>
        <div class="flex flex-col max-w-2xl px-4 mx-auto space-y-4">
            <x-button.primary filled>Create with Instagram</x-button.primary>
            <x-button.primary filled><a class="flex justify-center" href="{{ route('oauth.google') }}">Create with Google</a></x-button.primary>
            <x-button.primary filled>Create with Facebook</x-button.primary>
            <x-button.primary filled>Create with Twitter</x-button.primary>
            <x-button.primary filled>Create with Apple</x-button.primary>
        </div>
        <div class="text-center"> 
            <p class="text-sm font-bold">Already have Account? Sign In</p>
        </div>
    </div>
</x-guest-layout>
