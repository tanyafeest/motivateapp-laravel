<x-app-layout>
    <div class="flex flex-col h-screen" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), linear-gradient(146.67deg, #7A5CDC 1.12%, #AF55D8 122.75%);">
        <div class="items-center text-white"> 
            <div class="flex flex-col items-center mt-12 mb-4">
                <img class="w-[75px]" src=" {{ asset('images/adamdriver.png')}}" alt="">
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
                            <img class="w-12 h-12" src=" {{ asset('images/add.png')}} " alt="">
                            <img class="w-12 h-12" src=" {{ asset('images/play.png') }}" alt="">
                            <img class="w-12 h-12" src="{{ asset('images/spotify1.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:grid lg:grid-cols-2 px-8 mt-12 lg:mt-16 lg:gap-4 text-center">
                <p class="mb-8 text-sm lg:text-left">Download this inspirational graphic to share on twitter, instagram, facebook or anywhere. </p>
                <div class=""><x-button.white>Download &amp; Share</x-button.white></div>
            </div>
        </div>
    </div>
</x-app-layout>