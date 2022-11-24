<x-guest-layout>
    <div x-data="{ step: 1 }">
        <div x-show="step == 1" id="step-1" class="grid h-screen grid-cols-2 grid-rows-3 gap-0 overflow-hidden">
            <div class="col-span-2 col-start-1 bg-red-100">
                    Motive Mob
            </div>
            <div class="relative flex justify-center bg-pink-300">
                <img class="absolute bottom-0 w-80" src="images/woman4.png" alt="">
            </div>
            <div class="relative flex justify-center bg-yellow-300">
                <img class="absolute bottom-0 w-80" src="images/woman1.png" alt="">
            </div>
            <div class="relative px-8 py-4 text-sm bg-pink-400"> 
                <div>
                    <p class="text-justify">Let your team, friends, and family support your sports success. Have them join your "Mob" to provide you with inspiration through song and word! Use this free app to get motivation from people that care about you. Here's how it works:</p>
                </div>
                <div class="absolute cursor-pointer bottom-4 left-8" x-on:click="step = 4">Skip</div>
            </div>
            <div class="relative px-8 py-4 text-sm bg-yellow-400">
                <div>
                    <p class="text-justify">Let your team, friends, and family support your sports success. Have them join your "Mob" to provide you with inspiration through song and word! Use this free app to get motivation from people that care about you. Here's how it works:</p>
                </div>
                <div class="absolute cursor-pointer bottom-4 right-8" x-on:click="step = 2">Next</div>
            </div>
        </div>
        <div x-show="step == 2" id="step-2" class="grid h-screen grid-cols-2 grid-rows-3 gap-0 overflow-hidden">
            <div class="col-span-2 col-start-1 bg-red-100">
                    Motive Mob
            </div>
            <div class="relative flex justify-center bg-yellow-300">
                <img class="absolute bottom-0 w-80" src="images/woman1.png" alt="">
            </div>
            <div class="relative flex justify-center bg-green-300">
                <img class="absolute bottom-0 w-80" src="images/woman2.png" alt="">
            </div>
            <div class="relative px-8 py-4 text-sm bg-yellow-400"> 
                <div>
                    <p class="text-justify">Let your team, friends, and family support your sports success. Have them join your "Mob" to provide you with inspiration through song and word! Use this free app to get motivation from people that care about you. Here's how it works:</p>
                </div>
                <div class="absolute cursor-pointer bottom-4 left-8" x-on:click="step = 4">Skip</div>
            </div>
            <div class="relative px-8 py-4 text-sm bg-green-400">
                <div>
                    <p class="text-justify">Select your types of motivation - music-based and inspiring quotes. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. </p>
                </div>
                <div class="absolute cursor-pointer bottom-4 right-20" x-on:click="step = 1">Back</div>
                <div class="absolute cursor-pointer bottom-4 right-8" x-on:click="step = 3">Next</div>
            </div>
        </div>
        <div x-show="step == 3" id="step-3" class="grid h-screen grid-cols-2 grid-rows-3 gap-0 overflow-hidden">
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
                <div class="absolute cursor-pointer bottom-4 left-8" x-on:click="step = 4">Skip</div>
            </div>
            <div class="px-8 py-4 text-sm bg-blue-400">
                <div>
                    <p class="text-justify">Receive weekly text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet odio vitae sapien fringilla consectetur vel ac tortor. Nulla lacus libero, varius et eros sed, convallis viverra enim. </p>
                </div>
                <div class="absolute cursor-pointer bottom-4 right-20" x-on:click="step = 2">Back</div>
                <div class="absolute cursor-pointer bottom-4 right-8" x-on:click="step = 4">Next</div>
            </div>
        </div>
        <div x-show="step == 4" id="step-4" class="grid h-screen grid-cols-1 grid-rows-4 gap-4 overflow-hidden bg-purple-500 ">
            <div class="col-span-1 col-start-1" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
                <img class="w-12 h-12 mx-auto mt-8" src="images/mm-logo1.png" alt="">
            </div>
            <div class="row-span-2 bg-purple-600">
                <div class="flex flex-col items-center -mt-12">
                    <img class="w-24 h-24" src="images/AdamDriver.png" alt="">
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
                
                <div class="absolute bottom-4 right-8">
                    <x-button.primary x-on:click="step = 3">Back</x-button.primary>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
