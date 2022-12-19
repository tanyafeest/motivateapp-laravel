@if ($layout === 'app')
    <div id="intro" class="hidden lg:relative lg:flex lg:flex-col lg:items-center">
        <img class="absolute right-0" src="images/ribbon.svg" alt="">
        <!-- Desktop only -->
        <img class="mt-24 w-44 h-44" src="images/m-logo.png" alt="">
        @if(Request::is('dashboard'))
        <div class="-mt-12">
            <x-account-creation-msg></x-account-creation-msg>
        </div>
        @endif
    </div>
@elseif ($layout === 'guest')
    <div class="relative hidden h-screen bg-sky-300 lg:block">
        <!-- desktop only -->
        <img class="lg:block lg:absolute lg:top-0 lg:left-0" src="images/topbg.png" alt="">
        <img class="lg:block lg:absolute lg:bottom-0 lg:right-0 lg:w-[360px] lg:z-30" src="images/womanblur.png" alt=""> 
        
        <div class="absolute top-[300px] lg:top-48 left-8 lg:left-8 text-5xl z-0 text-white">
            <span class="font-semibold">Motivate</span><br /> to <span class="font-semibold">Be Your <br />Best</span>
        </div>
    </div>
@endif