<div x-data="{ step: 0 }">
    <div id="step-1" :class="{'flex': step == 0, 'hidden': step != 0}" class="flex-col h-screen row-start-2 gap-10 text-black row-end-9">
        <div class="flex flex-col gap-8 p-14">
            <textarea wire:model="tempNewQuote"></textarea>
            <x-button.red class="w-full" x-on:click="step = 1" wire:click="handleIsNew()">Submit</x-button.red>
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
        <div class="absolute top-0 left-0 p-1">
            <x-button.red class="w-full" x-on:click="step = 0">Back</x-button.red>
        </div>
        
        <div class="flex flex-col">
            <span>{{ Auth::user()->name }}</span>
            <h1 class="text-3xl font-bold">Now the Music!</h1>
        </div>

        {{-- spotify status --}}
        @if(session('temp_spotify_status') == 'TOKEN_EXPIRED')
            <div class="absolute top-0 right-0 p-1 text-sm italic text-red-500">
                Token is expired! Please reconnect spotify!
            </div>
        @endif
        
        <div class="absolute top-0 right-0 p-1 text-sm italic">
            @switch(session('temp_spotify_status'))
                @case('TOKEN_EXPIRED')
                    <span class="text-red-500">Token is expired! Please reconnect spotify!</span>
                    @break
                @case('USER_NOT_REGISTERED')
                    <span class="text-red-500">This user is not registered! Please try with another account!</span>
                    @break
                @case('CONNECTED')
                    <span class="text-green-500">Spotify connected!</span>
                    @break
            @endswitch
        </div>

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
                    @if ($spotifyId && session('temp_spotify_status') == 'CONNECTED')
                        {{-- <span class="text-green-500">Spotify Connected!</span> --}}
                    @else
                        <form method="GET" action="{{ route('oauth.spotify', ['redirect_url' => 'inspiration.onboarding']) }}">
                            <x-button.red class="w-full" wire>Connect Spotify</x-button.red>
                        </form>
                    @endif
                </div>
            </div>

            @if (isset($spotifyUserTopSongs['total']) && $spotifyUserTopSongs['total'] > 0)
                <x-button.red class="w-full" x-on:click="step = 2">
                    Browse {{ $spotifyUserTopSongs['total'] }} available songs
                </x-button.red>
            @else
                <span class="ml-2 text-sm italic">
                    You don't have any songs. You shoud search specific song below. Or you should connect spotify.
                </span>
            @endif
        </div>

        <div class="flex flex-col gap-8">
            <div class="flex flex-col">
                <span>Or, have a specific song in mind?</span>
                <span class="text-2xl font-bold">Search it below:</span>
                <div class="text-sm italic">
                    @if ($tempSong)
                        selected song: <span class="text-red-500">{{ $search }}</span>    
                    @else
                        There is no selected song. Please search your specific song below.
                    @endif
                </div>
            </div>

            <div class="flex flex-col gap-5" x-data="{ open: false }" x-on:click.outside="open = false">
                <div class="relative flex w-full">
                    <x-jet-input id="search" class="block w-full" type="text" name="search" placeholder="search your sepcific songs" wire:model.debounce.750ms="search" x-on:focus="open = true" />

                    {{-- search result --}}
                    <div x-show="open" class="absolute left-0 w-full p-2 mt-1 bg-white top-full" :class="{'block': $wire.search, 'hidden': !$wire.search}">
                        <div class="flex flex-col gap-1">
                            @if ($tracks)
                                @foreach ($tracks as $key => $track)
                                    <div class="flex justify-between p-2 cursor-pointer hover:bg-gray-100" wire:key="track-{{ $key }}" wire:click="selectSong({{ $key }})" x-on:click="open = false">
                                        <span>{{ $track['name'] }}</span>
                                        <span class="text-sm italic">{{ $track['artists'][0]['name'] }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <x-button.red class="w-full" wire:click="submit" x-on:click="step = 3">Submit</x-button.red>
            </div>
        </div>
    </div>

    <div id="step-3" :class="{'flex': step == 2, 'hidden': step != 2}" class="relative flex flex-col h-screen gap-12 p-10">
        <div class="absolute top-0 left-0 p-1">
            <x-button.red class="w-full" x-on:click="step = 1">Back</x-button.red>
        </div>

        <div class="flex justify-between p-10">
            <div class="flex flex-col">
                <span class="text-sm">Below are your</span>
                <span class="text-3xl font-bold">Top 10 Songs you enjoy</span>
            </div>

            <div class="text-sm">Pick one to share with <span class="text-red-500">{{ $requester->name }}</span></div>
        </div>

        {{-- song list --}}
        <div class="flex flex-col gap-1 p-10 bg-white">
            @forelse ($spotifyUserTopSongs['items'] as $key => $track)
                <div class="flex items-center justify-between" wire:key="top-track-{{ $key }}">
                    <div class="flex items-center gap-5">
                        <img src="{{ $track['album']['images'][2]['url'] }}" class="w-11 h-100" />

                        <div class="flex flex-col">
                            <span class="text-xl font-medium">{{ $track['name'] }}</span>
                            <span class="text-sm text-gray-500">{{ $track['artists'][0]['name'] }}</span>
                        </div>
                    </div>

                    <x-button.red wire:click="selectTopSongAndSubmit('{{ $track['id'] }}')" x-on:click="step = 3">Select</x-button.red>
                </div>
            @empty
                <span class="italic text-center">There is no data.</span>
            @endforelse
        </div>
    </div>

    <div id="step-4" :class="{'flex': step == 3, 'hidden': step != 3}" class="relative flex flex-col h-screen gap-12 p-10">
        <div class="flex flex-col gap-10 p-20">
            <div class="flex flex-col">
                <span class="text-sm">{{ Auth::user()->name }}</span>
                <span class="text-3xl font-bold">Well Done</span>
            </div>

            <p>
                Your motivational messaging will be shared with <b>{{ $requester->name }}</b> shortly. 

                Would you like them to return the favor? 
                Click here to request they do the same for you!
            </p>

            <x-button.red wire:click="gotoDashboard()">Request from Adam Driver</x-button.red>
        </div>
    </div>
</div>