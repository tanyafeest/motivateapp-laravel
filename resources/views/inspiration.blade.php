<x-app-layout>
    <div class="flex flex-col" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), linear-gradient(146.67deg, #7A5CDC 1.12%, #AF55D8 122.75%);">
        @livewire('header-profile', ['text' => 'white'])

        <div class="grid grid-rows-3 items-center h-screen text-white"> 
            <div class="flex flex-col items-center mb-6">
                <img class="w-[75px]" src="images/adamdriver.png" alt="">
                <p class="text-xl font-semibold">Adam Driver</p>
                <p class="text-xs"><span class="font-light">(Teammate)</span> shared with you:</p>
            </div>

            <div> 
                <div class="flex flex-col w-full p-4 mb-6" style="background: linear-gradient(146.67deg, #be616e 1.12%, #af5495 122.75%), linear-gradient(146.67deg, #be616e 1.12%, #af5495 122.75%);">
                    <div class="px-4 mx-auto lg:max-w-3xl">
                        <p class="text-2xl font-semibold text-center">“You have to fight to reach your dream”</p>
                        <p class="text-right">- Lionel Messi - </p>
                    </div>
                </div> 
                    
                <div class="flex justify-center px-4 mb-8 -mt-12 lg:mb-2">       
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
            </div>

            <div class="flex flex-col items-center w-full h-full px-8 pt-4 mt-8 lg:flex-row lg:space-x-8">
                <p class="mb-8 text-sm text-center text-justify w-1/2">Download this inspirational graphic to share on twitter, instagram, facebook or anywhere. </p>
                <div class="w-1/2 flex justify-center"><x-button.white>Download &amp; Share</x-button.white></div>
            </div>
        </div>
    </div>
</x-app-layout>