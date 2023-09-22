<div id="intro" class="hidden lg:relative lg:flex lg:flex-col lg:items-center">
    <img class="absolute right-0" src="{{asset('images/ribbon.svg')}}" alt="">
    <!-- Desktop only -->
    <img class="mt-24 w-44 h-44" src="{{asset('images/m-logo.png')}}" alt="">
    @if(Request::is('dashboard'))
        <div class="-mt-12">
            <x-account-creation-msg></x-account-creation-msg>
        </div>
    @endif
</div>