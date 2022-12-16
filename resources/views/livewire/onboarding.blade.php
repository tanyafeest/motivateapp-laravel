<div x-data="{ step: 1 }">
    <div id="step-1" :class="{'flex': step == 0, 'hidden': step != 0}" class="flex-col h-screen row-start-2 gap-10 text-black row-end-9">
        <div class="flex flex-col gap-8 p-14">
            <textarea wire:model="tempNewQuote"></textarea>
            <x-button.red class="w-full" x-on:click="step = 1">Submit</x-button.red>
        </div>
        
        <div class="flex flex-col gap-4 p-10">
            <div class="flex flex-col">
                <p class="text-2xl font-bold">Prefer to pick out a quote for them instead?</p>
                <p>Write your own above or use one of the recommended quotes below:</p>
            </div>
    
            <div class="grid grid-cols-2 gap-10">
                <div class="flex flex-col">
                    <div class="p-3 bg-white">
                        <p class="text-lg font-semibold truncate whitespace-nowrap">{{ $randomConfidenceQuote === null ? "There is no confidence quote" : $randomConfidenceQuote->quote }}</p>
                        <p class="text-sm text-gray-500 text-end">-  {{ $randomConfidenceQuote === null ? "None" : $randomConfidenceQuote->author }}</p>
                    </div>
                    <x-button.red class="w-full" x-on:click="step = 1" wire:click="selectQuote({{ $randomConfidenceQuote === null ? 'null' : $randomConfidenceQuote->id }})">Select Confidence Quote</x-button.red>
                </div>
    
                <div class="flex flex-col">
                    <div class="p-3 bg-white">
                        <p class="text-lg font-semibold truncate whitespace-nowrap">{{ $randomPotentialQuote === null ? "There is no confidence quote" : $randomPotentialQuote->quote }}</p>
                        <p class="text-sm text-gray-500 text-end">-  {{ $randomPotentialQuote === null ? "None" : $randomPotentialQuote->author }}</p>
                    </div>
                    <x-button.red class="w-full" x-on:click="step = 1" wire:click="selectQuote({{ $randomPotentialQuote === null ? 'null' : $randomPotentialQuote->id }})">Select Potential Quote</x-button.red>
                </div>
    
                <div class="flex flex-col">
                    <div class="p-3 bg-white">
                        <p class="text-lg font-semibold truncate whitespace-nowrap">{{ $randomDeterminationQuote === null ? "There is no confidence quote" : $randomDeterminationQuote->quote }}</p>
                        <p class="text-sm text-gray-500 text-end">-  {{ $randomDeterminationQuote === null ? "None" : $randomDeterminationQuote->author }}</p>
                    </div>
                    <x-button.red class="w-full" x-on:click="step = 1" wire:click="selectQuote({{ $randomDeterminationQuote === null ? 'null' : $randomDeterminationQuote->id }})">Select Determination Quote</x-button.red>
                </div>
    
                <div class="flex flex-col">
                    <div class="p-3 bg-white">
                        <p class="text-lg font-semibold truncate whitespace-nowrap">{{ $randomResilienceQuote === null ? "There is no confidence quote" : $randomResilienceQuote->quote }}</p>
                        <p class="text-sm text-gray-500 text-end">-  {{ $randomResilienceQuote === null ? "None" : $randomResilienceQuote->author }}</p>
                    </div>
                    <x-button.red class="w-full" x-on:click="step = 1" wire:click="selectQuote({{ $randomResilienceQuote === null ? 'null' : $randomResilienceQuote->id }})">Select Resilience Quote</x-button.red>
                </div>
            </div>
        </div>
    </div>

    <div id="step-2" :class="{'flex': step == 1, 'hidden': step != 1}" class="relative flex flex-col h-screen gap-12 p-10">
        <div class="flex flex-col">
            <span>{{ Auth::user()->name }}</span>
            <h1 class="text-3xl font-bold">Now the Music!</h1>
        </div>

        {{-- spotify token expired status --}}
        @if($spotifyIsTokenExpired)
            <div class="absolute top-0 right-0 p-1 text-sm italic text-red-500">
                Token is expired! Please reconnect spotify!
            </div>
        @endif

        <div>
            <span class="text-red-500">{{ $requester->name }}</span> is also looking for songs of inspiration. Feel free to share a favorite song or a recommendation of something that motivates you:
        </div>

        <div class="flex flex-col gap-8">
            <div class="flex items-center justify-between">
                <div class="flex flex-col">
                    <span>Share one of your</span>
                    <span class="text-2xl font-bold">Favorite Songs</span>
                </div>

                <div>
                    @if ($spotifyId && !$spotifyIsTokenExpired)
                        <span class="text-green-500">Spotify Connected!</span>
                    @else
                        <form method="GET" action="{{ route('oauth.spotify') }}">
                            <x-button.red class="w-full" wire>Connect Spotify</x-button.red>
                        </form>
                    @endif
                </div>
            </div>

            <x-button.red class="w-full" wire>
                Open Spotify
                <span class="ml-2 text-sm italic">
                    @if (isset($spotifyUserTopSongs->total) && $spotifyUserTopSongs->total > 0)
                        {{ $spotifyUserTopSongs->total }} songs available
                    @else
                        You don't have any songs. You shoud search specific song below.
                    @endif
                </span>
            </x-button.red>
        </div>

        <div class="flex flex-col gap-8">
            <div class="flex flex-col">
                <span>Or, have a specific song in mind?</span>
                <span class="text-2xl font-bold">Search it below:</span>
                <div class="text-sm italic">
                    @if ($tempSong)
                        selected song: <span class="text-red-500">{{ $tempSong['name'] }}</span>    
                    @else
                        There is no selected song. Please search your specific song below.
                    @endif
                </div>
            </div>

            <div class="flex flex-col gap-5">
                <div class="relative flex w-full">
                    <x-jet-input id="search" class="block w-full" type="text" name="search" placeholder="search your sepcific songs" wire:model.debounce.750ms="search" wire:focus="handleSearchFocus()" />

                    {{-- search result --}}
                    <div class="absolute left-0 w-full p-2 mt-1 bg-white top-full" :class="{'block': $wire.search, 'hidden': !$wire.search}">
                        <div class="flex flex-col gap-1">
                            @if ($tracks && $openDropdown)
                                @foreach ($tracks as $key => $track)
                                    <div class="p-2 cursor-pointer hover:bg-gray-100" wire:key="track-{{ $key }}" wire:click="selectSong({{ $key }})">{{ $track['name'] }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <x-button.red class="w-full">Submit</x-button.red>
            </div>
        </div>
    </div>
</div>