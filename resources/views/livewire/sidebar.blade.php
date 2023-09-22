<div id="sidebar" class="hidden text-white lg:bg-gradient-to-r lg:from-purple-500 lg:to-violet-500 lg:pt-8 lg:block lg:flex lg:flex-col lg:h-screen">                 
    <div class="flex flex-col space-y-4">
        <img class="w-12 mx-auto" src="{{asset('images/MotiveMobLogo.svg')}}" />
        <img class="w-18" src="{{asset('images/Divide.svg')}}" />
    </div>
    <nav class="flex flex-col justify-center flex-grow space-y-6">
        <a href="/dashboard" class="flex items-center justify-center rounded-lg group">
            <span class="sr-only">Menu</span>
            <img class="w-6" src="{{asset('images/menu.svg')}}" />
        </a>
        <a href="/upgrade-form" class="flex items-center justify-center rounded-lg  group">
            <span class="sr-only">Send</span>
            <img class="w-6" src="{{asset('images/Send.svg')}}" />
        </a>

        <a href="/inspiration" class="flex items-center justify-center rounded-lg  group">
            <span class="sr-only">Heart</span>
            <img class="w-6" src="{{asset('images/heart.svg')}}" />
        </a>

        <a href="#" class="flex items-center justify-center rounded-lg  group">
            <span class="sr-only">Gallery</span>
            <img class="w-6" src="{{asset('images/Gallery.svg')}}" />
        </a>

        <a href="/inspiration-past" class="flex items-center justify-center rounded-lg  group">
            <span class="sr-only">Note-3</span>
            <img class="w-6" src="{{asset('images/Note-3.svg')}}" />
        </a>

        <a href="/player" class="flex items-center justify-center rounded-lg  group">
            <span class="sr-only">Headphone</span>
            <img class="w-6" src="{{asset('images/Headphone.svg')}}" />
        </a>

        <a href="/upgrade-plan" class="flex items-center justify-center rounded-lg  group">
            <span class="sr-only">Dollar</span>
            <img class="w-6" src="{{asset('images/dollar.svg')}}" />
        </a>

        <a href="/settings" class="flex items-center justify-center rounded-lg  group">
            <span class="sr-only">Setting</span>
            <img class="w-6" src="{{asset('images/Setting.svg')}}" />
        </a>
    </nav>

    <div class="">
        <a href="{{ route('profile.show') }}" class="flex items-center justify-center rounded-lg  group">
            <span class="sr-only">User</span>
            <img class="w-20" src="{{asset('images/User.svg')}}" />
        </a>
    </div>
</div>