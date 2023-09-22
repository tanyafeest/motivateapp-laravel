<div class="grid grid-cols-6 items-center lg:relative">
    <div class="col-span-1">
        <img class="m-2 lg:hidden w-11 h-11 lg:m-0" src="{{asset('images/mobile-menu.png')}}" alt="">
        <img class="hidden lg:block lg:w-11 lg:h-11 lg:absolute lg:top-4 lg:left-4" src="images/back-arrow{{ $text === 'white' ? '-white' : '' }}.png" alt="">
    </div>
    <div class="col-span-4 text-center text-white {{ $text != 'white' ? 'lg:text-gray-800' : '' }}">
        <p>Account Information</p>
        <p class="font-semibold">Lisa Smith</p>
    </div>
    <div class="col-span-1">
        <a href="#" class="flex items-center justify-center rounded-lg group">
            <span class="sr-only">User</span>
            <img class="w-20" src="{{asset('images/User.svg')}}" />
        </a>
    </div>
</div>

