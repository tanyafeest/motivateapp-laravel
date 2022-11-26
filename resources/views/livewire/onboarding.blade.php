<div>
    <!-- mobile only -->
    <div id="step1" class="lg:hidden bg-sky-300 h-screen relative {{ $currentStep != 1 ? 'hidden' : '' }}">
        <img class="z-10 lg:hidden" src="images/m-bg.png" alt=""> 
        <img class="z-20 lg:hidden absolute top-24 w-[120px] left-[145px]" src="images/mm-logo.png" alt="">
        <x-button.white wire:click="firstStepSubmit" type="button" class="lg:hidden z-20 absolute bottom-12 w-[200px] left-[85px]">How It Works</x-button.white>
    </div>

    <div id="step2" class="flex flex-col {{ $currentStep != 2 ? 'hidden lg:visible' : '' }} lg:grid lg:overflow-hidden lg:grid-rows-3 lg:gap-0 h-screen lg:relative">
        {{-- <img class="z-0 lg:hidden" src="images/mobile-top-bg.png" alt=""> 
        <img class="absolute z-10 w-12 lg:hidden top-8 left-40 " src="images/MotiveMobLogo.svg" alt=""> 
        <img class="absolute z-20 hidden lg:block top-4 left-4" src="images/back.svg" alt=""> --}}

        <div class="hidden row-span-1 lg:bg-pink-100 lg:block" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
            <img class='w-[210px] absolute top-6 left-[300px]' src="images/logo-white.svg" alt="">
        </div>

         <div class="row-span-4 lg:row-span-2 lg:grid lg:grid-cols-2">
            <div id="step2a" class="grid grid-rows-2 lg:h-full lg:grid-span-1 lg:visible">
                <div class="relative" style="background: #F390A2;">
                    <img class="lg:hidden" src="images/step1a.png" alt="">
                    <img class="hidden lg:block lg:w-100 lg:w-80 lg:absolute lg:bottom-0 lg:left-[80px]" src="images/woman-pink.png" alt="">
                </div>
                <div class="z-10 p-4 -mt-12 lg:z-0 lg:mt-0" style="background: #F76A83;"> 
                    <div>
                        <p class="text-justify">Let your team, friends, and family support your sports success. Have them join your "Mob" to provide you with inspiration through song and word! Use this free app to get motivation from people that care about you. Here's how it works:</p>
                    </div>
                    <div class="absolute bottom-8 lg:bottom-4 left-4">Skip</div>
                    <div class="absolute bottom-8 right-8 lg:hidden"><x-button.white wire:click="secondStepSubmit">Next</x-button.white></div>
                </div>
            </div>
            <!-- only show on dk -->
            <div id="step2b" class="grid grid-rows-2 lg:h-full lg:grid-span-1 lg:visible">
                <div class="relative" style="background: linear-gradient(145.74deg, #EFC03E 2.49%, #BD7308 122.43%);">
                    <img class="lg:hidden" src="images/step1a.png" alt="">
                    <img class="hidden lg:block lg:w-100 lg:w-80 lg:absolute lg:bottom-0 lg:left-[80px]" src="images/woman1.png" alt="">
                </div>
                <div class="p-4" style="background: #E1AA2F;">
                    <div>
                        <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                    </div>
                    <div class="absolute bottom-8 lg:bottom-4 left-4 lg:hidden">Skip</div>
                    <div class="absolute bottom-4 right-8"><x-button.white>Next</x-button.white></div>
                </div>
            </div>
        </div>
    </div>

    <div id="step3" class="flex flex-col {{ $currentStep != 3 ? 'hidden lg:visible' : '' }} lg:grid lg:overflow-hidden lg:grid-rows-3 lg:gap-0 h-screen lg:relative">
        <div id="step3a" class="grid grid-rows-2 lg:h-full lg:grid-span-1 lg:visible">
            <div class="relative" style="background: linear-gradient(145.74deg, #EFC03E 2.49%, #BD7308 122.43%);">
                <img class="lg:hidden" src="images/step3.png" alt="">
                <img class="hidden lg:block lg:w-100 lg:w-80 lg:absolute lg:bottom-0 lg:left-[80px]" src="images/woman1.png" alt="">
            </div>
            <div class="p-4" style="background: #E1AA2F;">
                <div>
                    <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                </div>
                <div class="absolute bottom-8 lg:bottom-4 left-4 lg:hidden">Skip</div>
                <div class="absolute bottom-4 right-8"><x-button.white>Next</x-button.white></div>
            </div>
        </div>
        <!-- only show on dk -->
        <div id="step3b" class="grid grid-rows-2 lg:h-full lg:grid-span-1 lg:visible">
            <div class="relative" style="background: linear-gradient(145.74deg, #EFC03E 2.49%, #BD7308 122.43%);">
                <img class="lg:hidden" src="images/step1a.png" alt="">
                <img class="hidden lg:block lg:w-100 lg:w-80 lg:absolute lg:bottom-0 lg:left-[80px]" src="images/woman2.png" alt="">
            </div>
            <div class="p-4" style="background: #E1AA2F;">
                <div>
                    <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                </div>
                <div class="absolute bottom-8 lg:bottom-4 left-4 lg:hidden">Skip</div>
                <div class="absolute bottom-4 right-8"><x-button.white>Next</x-button.white></div>
            </div>
        </div>
    </div>
    <div id="step4" class="hidden lg:grid lg:overflow-hidden lg:grid-cols-2 lg:grid-rows-3 lg:gap-0 lg:h-screen lg:relative">
        <div class="col-span-2 col-start-1 bg-red-100">
                Motive Mob
        </div>
        <div class="relative flex justify-center bg-green-300">
            <img class="absolute bottom-0 w-80" src="images/woman2.png" alt="">
        </div>
        <div class="relative flex justify-center bg-blue-300">
            <img class="absolute bottom-0 w-80" src="images/woman3.png" alt="">
        </div>
        <div class="px-8 py-4 text-sm bg-green-400"> 
            <div>
                <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
            </div>
            <div class="absolute bottom-4 left-8">Skip</div>
        </div>
        <div class="px-8 py-4 text-sm bg-blue-400">
            <div>
                <p class="text-justify">Receive weekly text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. Nulla lacus libero, varius et eros sed, convallis viverra enim. </p>
            </div>
            <div class="absolute bottom-4 right-8"><x-button.white>Next</x-button.white></div>
        </div>
    </div>
    <div id="step5" class="hidden lg:grid lg:overflow-hidden lg:grid-cols-1 lg:grid-rows-4 lg:gap-4 lg:h-screen lg:relative lg:bg-purple-500">
        <div class="col-span-1 col-start-1" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
            <img class="w-12 h-12 mx-auto mt-8" src="images/mm-logo1.png" alt="">
        </div>
        <div class="row-span-2 bg-purple-600">
            <div class="flex flex-col items-center -mt-12">
                <img class="w-24 h-24" src="images/adamdriver.png" alt="">
                <p class="text-4xl font-semibold">Adam Driver</p>
                <p>(Teammate) shared with you:</p>
            </div>
            <div class="py-4 my-4 text-center bg-purple-700">
                <p class="text-4xl font-semibold">“You have to fight to reach your dream”</p>
                <p>- Lionel Messi - </p>
            </div>                                
            <div class="grid grid-cols-2 bg-purple-600">
                <div class="flex justify-center">
                    <img class="-mt-10 w-44 h-44" src="images/stronger.png" alt="">
                </div>
                <div>
                    <p class="text-md font-extralight">And they thought you might enjoy listening to: </p>
                    <p class="text-lg">Stronger (Kanye West)</p>
                    <div class="flex mt-4 space-x-4">
                        <img class="w-12 h-12" src="images/add.png" alt="">
                        <img class="w-12 h-12" src="images/play.png" alt="">
                        <img class="w-12 h-12" src="images/spotify.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="relative px-8 py-4 text-sm bg-purple-800"> 
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <p class="text-justify">View your <strong>private inspiration page</strong> like this one. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="flex flex-col justify-center">
                    <x-button.primary filled>Register Free Account</x-button.primary>
                    <p class="mt-2 text-xs text-center">Your account is free (forever). You can upgrade for $20/year for additional premium features.
                </div>
            </div>
            
            <div class="absolute bottom-4 left-8">Skip</div>
            <div class="absolute bottom-4 right-8">
                <x-button.primary>Next</x-button.primary>
            </div>
        </div>
    </div>
</div>