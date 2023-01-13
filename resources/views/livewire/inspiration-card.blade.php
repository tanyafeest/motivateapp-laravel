<div class="relative flex flex-col h-screen" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), linear-gradient(146.67deg, #7A5CDC 1.12%, #AF55D8 122.75%);">
    {{-- spotify status --}}
    <div class="absolute top-1 right-1">
        <small class="text-white">{{ $spotifyStatus }}</small>
    </div>
    
    <div class="items-center text-white">
        <div class="flex flex-col items-center mt-12 mb-4">
            <img class="w-[75px]" src={{ asset('images/AdamDriver.png') }} alt="">
            <p class="text-xl font-semibold">{{ $inspiration->sharedbyUser->name }}</p>
            <p class="text-xs"><span class="font-light">(Teammate)</span> shared with you:</p>
        </div>

        <div> 
            <div class="flex flex-col w-full p-4 mb-6" style="background: linear-gradient(146.67deg, #be616e 1.12%, #af5495 122.75%), linear-gradient(146.67deg, #be616e 1.12%, #af5495 122.75%);">
                <div class="px-4 mx-auto lg:max-w-3xl">
                    <p class="text-2xl font-semibold text-center">“{{ $inspiration->quote->truncate() }}”</p>
                    <p class="text-right">- {{ $inspiration->quote->author }} - </p>
                </div>
            </div> 
                
            <div class="flex justify-center gap-20 px-4 mb-8 -mt-2 lg:mb-2">       
                <div class="flex justify-center">
                    <img class="w-[200px] -rotate-[30deg]" src={{ $inspiration->track->album_img }} alt="">
                </div>
                <div class="mt-10 ml-4">
                    <p class="text-md font-extralight">And they thought you might enjoy listening to: </p>
                    <p class="text-lg">{{ $inspiration->track->name }} ({{ $inspiration->track->artist }})</p>
                    <div class="flex mt-4 space-x-4">
                        <button wire:click="addSongToPlaylist({{ $inspiration->id }})">
                            <img class="w-12 h-12" src={{ asset('images/add.png') }} alt="">
                        </button>
                        <button wire:click="handleSetCurrentTrack({{ $inspiration->track->id }})">
                            <img class="w-12 h-12" src={{ asset('images/play.png') }} alt="">
                        </button>
                        <a href="{{ $inspiration->track->external_url }}" target="_blank">
                            <img class="w-12 h-12" src={{ asset('images/spotify1.png') }} alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-8 mt-12 text-center lg:grid lg:grid-cols-2 lg:mt-16 lg:gap-4">
            <p class="mb-8 text-sm lg:text-left">Download this inspirational graphic to share on twitter, instagram, facebook or anywhere. </p>
            <div class=""><x-button.white>Download &amp; Share</x-button.white></div>
        </div>
    </div>    
</div>
