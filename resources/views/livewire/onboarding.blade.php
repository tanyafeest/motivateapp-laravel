<div>
    <!-- splash - mobile only -->
    <div id="splash" class="hidden h-screen lg:hidden">
        <img class="h-full cover" src="images/splash.png" alt="">
        <img class="z-20 lg:hidden absolute top-56 w-[200px] left-[105px]" src="images/mm-logo.png" alt="">
    </div>
    
    <!-- how it works mobile only -->
    <div id="step1" class="lg:hidden bg-sky-300 h-screen relative {{ $currentStep != 1 ? 'hidden' : '' }}">
        <img class="z-10 lg:hidden" src="images/howitworks.png" alt=""> 
        <img class="z-20 lg:hidden absolute top-24 w-[120px] left-[145px]" src="images/mm-logo.png" alt="">
        <x-button.white wire:click="firstStepSubmit" type="button" class="lg:hidden z-20 absolute bottom-12 w-[200px] left-[100px]">How It Works</x-button.white>
    </div>

    <!-- pink -->
    <div id="step2" class="flex flex-col {{ $currentStep != 2 ? 'hidden' : '' }} lg:grid lg:overflow-hidden lg:grid-rows-3 lg:gap-0 h-screen lg:relative">
        <img class="absolute z-10 w-12 lg:hidden top-12 left-[180px]" src="images/MotiveMobLogo.svg" alt=""> 

        <!-- top section - dk only -->
        <div class="hidden lg:row-span-1 lg:bg-pink-100 lg:block" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
            <img class='w-[210px] absolute top-6 left-[300px]' src="images/logo-white.svg" alt="">
        </div>
        <!-- end -->

        <div class="h-full lg:row-span-2 lg:grid lg:grid-cols-2" style="background: #F390A2;">
            <!-- mobile only -->
            <div class="lg:hidden">
                <img class="absolute top-0 left-0 z-0" src="images/pink.png" alt="">
                <p class="absolute top-[65%] left-0 z-20 text-justify p-4">Let your team, friends, and family support your sports success. Have them join your "Mob" to provide you with inspiration through song and word! Use this free app to get motivation from people that care about you. Here's how it works:</p>
                <div class="absolute bottom-8 left-8"><a href="/register">Skip</a></div>
                <div class="absolute bottom-8 right-8"><x-button.white wire:click="secondStepSubmit">Next</x-button.white></div>
            </div>
            
            <!-- dk only -->
            <div id="step2a" class="relative grid hidden h-full grid-rows-3 lg:grid-rows-2 lg:grid lg:h-full lg:grid-span-1 lg:block">
                <div class="relative z-10" style="background: #F390A2;">
                    <img class="hidden lg:block lg:w-100 lg:w-80 lg:absolute lg:bottom-0 lg:left-[80px]" src="images/woman-pink.png" alt="">
                </div>
                <div class="" style="background: #F76A83;"> 
                    <div class="p-4">
                        <p class="text-justify">Let your team, friends, and family support your sports success. Have them join your "Mob" to provide you with inspiration through song and word! Use this free app to get motivation from people that care about you. Here's how it works:</p>
                    </div>
                    <div class="absolute bottom-8 lg:bottom-4 left-4"><a href="/register">Skip</a></div>
                    <div class="absolute bottom-8 right-8 lg:hidden"><x-button.white wire:click="secondStepSubmit">Next</x-button.white></div>
                </div>
            </div>
            <!-- dk only: this is the yellow half -->
            <div id="step2b" class="hidden lg:grid-rows-2 lg:grid lg:h-full lg:grid-span-1 lg:block">
                <div class="relative z-10" style="background: linear-gradient(145.74deg, #EFC03E 2.49%, #BD7308 122.43%);">
                    <img class="hidden lg:block lg:w-100 lg:w-80 lg:absolute lg:bottom-0 lg:left-[80px]" src="images/woman1.png" alt="">
                </div>
                <div class="p-4" style="background: #E1AA2F;">
                    <div>
                        <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                    </div>
                    <div class="absolute bottom-8 lg:bottom-4 left-4 lg:hidden"><a href="/register">Skip</a></div>
                    <div class="absolute bottom-4 right-8"><x-button.white wire:click="secondStepSubmit">Next</x-button.white></div>
                </div>
            </div>
        </div>
    </div>

    <!-- yellow -->
    <div id="step3" class="flex flex-col {{ $currentStep != 3 ? 'hidden' : '' }} lg:grid lg:overflow-hidden lg:grid-rows-3 lg:gap-0 h-screen lg:relative">
        <img class="absolute z-10 w-12 lg:hidden top-12 left-[180px]" src="images/MotiveMobLogo.svg" alt=""> 
        
        <!-- top section - dk only -->
        <div class="hidden lg:row-span-1 lg:bg-yellow-100 lg:block" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
            <img class='w-[210px] absolute top-6 left-[300px]' src="images/logo-white.svg" alt="">
        </div>
        <!-- end -->

        <div class="h-full lg:row-span-2 lg:grid lg:grid-cols-2" style="background: #F390A2;">
            <!-- mobile only -->
            <div class="lg:hidden">
                <img class="absolute top-0 left-0 z-0" src="images/yellow.png" alt="">
                <p class="absolute top-[65%] left-0 z-20 text-justify p-4">Let your team, friends, and family support your sports success. Have them join your "Mob" to provide you with inspiration through song and word! Use this free app to get motivation from people that care about you. Here's how it works:</p>
                <div class="absolute bottom-8 left-8"><a href="/register">Skip</a></div>
                <div class="absolute bottom-8 right-8"><x-button.white wire:click="thirdStepSubmit">Next</x-button.white></div>
            </div>
            
            <!-- dk only -->
            <div id="step3a" class="relative grid hidden h-full grid-rows-3 lg:grid-rows-2 lg:grid lg:h-full lg:grid-span-1 lg:block">
                <div class="relative z-10" style="background: #24ad34;">
                    <img class="hidden lg:block lg:w-100 lg:w-80 lg:absolute lg:bottom-0 lg:left-[80px]" src="images/woman2.png" alt="">
                </div>
                <div class="" style="background: #178c71;"> 
                    <div class="p-4">
                        <p class="text-justify">step 3</p>
                    </div>
                    <div class="absolute bottom-8 lg:bottom-4 left-4"><a href="/register">Skip</a></div>
                    <div class="absolute bottom-8 right-8 lg:hidden"><x-button.white wire:click="secondStepSubmit">Next</x-button.white></div>
                </div>
            </div>
            <!-- dk only: this is the green half -->
            <div id="step3b" class="hidden lg:grid-rows-2 lg:grid lg:h-full lg:grid-span-1 lg:block">
                <div class="relative z-10" style="background: linear-gradient(145.74deg, #EFC03E 2.49%, #BD7308 122.43%);">
                    <img class="hidden lg:block lg:w-100 lg:w-80 lg:absolute lg:bottom-0 lg:left-[80px]" src="images/woman1.png" alt="">
                </div>
                <div class="p-4" style="background: #E1AA2F;">
                    <div>
                        <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                    </div>
                    <div class="absolute bottom-8 lg:bottom-4 left-4 lg:hidden"><a href="/register">Skip</a></div>
                    <div class="absolute bottom-4 right-8"><x-button.white>Next</x-button.white></div>
                </div>
            </div>
        </div>
    </div>

    <!-- green -->
    <div id="step4" class="flex flex-col {{ $currentStep != 4 ? 'hidden' : '' }} lg:grid lg:overflow-hidden lg:grid-rows-3 lg:gap-0 h-screen lg:relative">
        <img class="absolute z-10 w-12 lg:hidden top-12 left-[180px]" src="images/MotiveMobLogo.svg" alt=""> 

        <!-- top section - dk only -->
        <div class="hidden lg:row-span-1 lg:bg-yellow-100 lg:block" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
            <img class='w-[210px] absolute top-6 left-[300px]' src="images/logo-white.svg" alt="">
        </div>
        <!-- end -->

        <div class="h-full lg:row-span-2 lg:grid lg:grid-cols-2" style="background: #F390A2;">
            <!-- mobile only -->
            <div class="lg:hidden">
                <img class="absolute top-0 left-0 z-0" src="images/green.png" alt="">
                <p class="absolute top-[65%] left-0 z-20 text-justify p-4">Invite colleagues, friends & family to privately share some inspiration. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                <div class="absolute bottom-8 left-8"><a href="/register">Skip</a></div>
                <div class="absolute bottom-8 right-8"><x-button.white wire:click="fourthStepSubmit">Next</x-button.white></div>
            </div>
            
            <!-- dk only -->
            <div id="step3a" class="relative grid hidden h-full grid-rows-3 lg:grid-rows-2 lg:grid lg:h-full lg:grid-span-1 lg:block">
                <div class="relative z-10" style="background: #24ad34;">
                    <img class="hidden lg:block lg:w-100 lg:w-80 lg:absolute lg:bottom-0 lg:left-[80px]" src="images/woman2.png" alt="">
                </div>
                <div class="" style="background: #178c71;"> 
                    <div class="p-4">
                        <p class="text-justify">step 3</p>
                    </div>
                    <div class="absolute bottom-8 lg:bottom-4 left-4"><a href="/register">Skip</a></div>
                    <div class="absolute bottom-8 right-8 lg:hidden"><x-button.white wire:click="secondStepSubmit">Next</x-button.white></div>
                </div>
            </div>
            <!-- dk only: this is the green half -->
            <div id="step3b" class="hidden lg:grid-rows-2 lg:grid lg:h-full lg:grid-span-1 lg:block">
                <div class="relative z-10" style="background: linear-gradient(145.74deg, #EFC03E 2.49%, #BD7308 122.43%);">
                    <img class="hidden lg:block lg:w-100 lg:w-80 lg:absolute lg:bottom-0 lg:left-[80px]" src="images/woman1.png" alt="">
                </div>
                <div class="p-4" style="background: #E1AA2F;">
                    <div>
                        <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                    </div>
                    <div class="absolute bottom-8 lg:bottom-4 left-4 lg:hidden"><a href="/register">Skip</a></div>
                    <div class="absolute bottom-4 right-8"><x-button.white>Next</x-button.white></div>
                </div>
            </div>
        </div>
    </div>

    <!-- blue -->
    <div id="step5" class="flex flex-col {{ $currentStep != 5 ? 'hidden' : '' }} lg:grid lg:overflow-hidden lg:grid-rows-3 lg:gap-0 h-screen lg:relative">
        <img class="absolute z-10 w-12 lg:hidden top-12 left-[180px]" src="images/MotiveMobLogo.svg" alt=""> 
        
        <!-- top section - dk only -->
        <div class="hidden lg:row-span-1 lg:bg-yellow-100 lg:block" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
            <img class='w-[210px] absolute top-6 left-[300px]' src="images/logo-white.svg" alt="">
        </div>

        <div class="h-full lg:row-span-2 lg:grid lg:grid-cols-2" style="background: #F390A2;">
            <!-- mobile only -->
            <div class="lg:hidden">
                <img class="absolute top-0 left-0 z-0" src="images/blue.png" alt="">
                <p class="absolute top-[65%] left-0 z-20 text-justify p-4">Invite colleagues, friends & family to privately share some inspiration. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                <div class="absolute bottom-8 left-8"><a href="/register">Skip</a></div>
                <div class="absolute bottom-8 right-8"><x-button.white wire:click="fifthStepSubmit">Next</x-button.white></div>
            </div>
            
            <!-- dk only -->
            <div id="step3a" class="relative grid hidden h-full grid-rows-3 lg:grid-rows-2 lg:grid lg:h-full lg:grid-span-1 lg:block">
                <div class="relative z-10" style="background: #24ad34;">
                    <img class="hidden lg:block lg:w-100 lg:w-80 lg:absolute lg:bottom-0 lg:left-[80px]" src="images/woman2.png" alt="">
                </div>
                <div class="" style="background: #178c71;"> 
                    <div class="p-4">
                        <p class="text-justify">step 3</p>
                    </div>
                    <div class="absolute bottom-8 lg:bottom-4 left-4"><a href="/register">Skip</a></div>
                    <div class="absolute bottom-8 right-8 lg:hidden"><x-button.white wire:click="secondStepSubmit">Next</x-button.white></div>
                </div>
            </div>
            <!-- dk only: this is the green half -->
            <div id="step3b" class="hidden lg:grid-rows-2 lg:grid lg:h-full lg:grid-span-1 lg:block">
                <div class="relative z-10" style="background: linear-gradient(145.74deg, #EFC03E 2.49%, #BD7308 122.43%);">
                    <img class="hidden lg:block lg:w-100 lg:w-80 lg:absolute lg:bottom-0 lg:left-[80px]" src="images/woman1.png" alt="">
                </div>
                <div class="p-4" style="background: #E1AA2F;">
                    <div>
                        <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                    </div>
                    <div class="absolute bottom-8 lg:bottom-4 left-4 lg:hidden"><a href="/register">Skip</a></div>
                    <div class="absolute bottom-4 right-8"><x-button.white>Next</x-button.white></div>
                </div>
            </div>
        </div>
    </div>

    <!-- purple -->
    <div id="step6" class="flex flex-col {{ $currentStep != 6 ? 'hidden' : '' }} items-center h-screen" style="background: linear-gradient(146.67deg, #7A5CDC 1.12%, #AF55D8 122.75%);">
        <img class="w-[48px] h-[46px] absolute top-4 left-4" src="images/back.svg" alt="">
        <img class="w-[48px] h-[46px] mt-10 mb-6" src="images/mm-logo1.png" alt="">
            
        <div class="flex flex-col items-center mb-6">
            <img class="w-[75px]" src="images/adamdriver.png" alt="">
            <p class="text-xl font-semibold">Adam Driver</p>
            <p class="text-xs"><span class="font-light">(Teammate)</span> shared with you:</p>
        </div>

         <div class="flex flex-col w-full p-4 mb-6" style="background: rgb(120,84,202); background: linear-gradient(95deg, rgba(120,84,202,1) 0%, rgba(142,81,200,1) 100%);">
            <div class="px-4 mx-auto lg:max-w-3xl">
                <p class="text-2xl font-semibold text-center">“You have to fight to reach your dream”</p>
                <p class="text-right">- Lionel Messi - </p>
            </div>
        </div> 
            
        <div class="flex px-4 mb-8 -mt-12 lg:mb-2">       
            <div class="flex justify-center">
                <img class="w-[200px]" src="images/stronger.png" alt="">
            </div>
            <div class="mt-10 ml-4">
                <p class="text-md font-extralight">And they thought you might enjoy listening to: </p>
                <p class="text-lg">Stronger (Kanye West)</p>
                <div class="flex mt-4 space-x-4">
                    <img class="w-12 h-12" src="images/add.png" alt="">
                    <img class="w-12 h-12" src="images/play.png" alt="">
                    <img class="w-12 h-12" src="images/spotify1.png" alt="">
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center w-full h-full px-8 pt-4 mt-8 lg:flex-row lg:space-x-8" style="background: #7d52d9;">
            <p class="mb-8 text-sm text-center text-justify">View your <span class="font-bold">private inspiration page</span> like this one. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <div class="flex flex-col items-center">
                <a class="px-8 py-2 font-medium text-blue-500 transition duration-150 ease-in-out bg-white rounded-3xl" href="/registration">Register Free Account</a>
                <p class="mt-4 text-xs text-center text-purple-100 lg:mt-2">Your account is free (forever). You can upgrade for $20/year for additional premium features.</p>
            </div>
        </div>
    </div>
</div>