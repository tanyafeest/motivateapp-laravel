<div class="relative row-start-2 row-end-9" x-data="{ quoteModalOpen: false, songModalOpen: false, upgradeModalOpen: false }">
    {{-- search quote modal --}}
    <div x-cloak x-show="quoteModalOpen" class="absolute z-10 flex flex-col items-center justify-center w-full h-full bg-black/20">
        <div class="relative p-2 bg-white rounded" x-data="{ open: false }" x-on:click.outside="quoteModalOpen = false">
            <x-jet-input id="link" class="block w-full mt-1 border-green-500 focus-within:border-green-600" type="text" name="link" placeholder="search your sepcific quotes" wire:model.debounce.500ms="searchQuote" x-on:focus="open = true" />

            {{-- search quote result --}}
            <div x-show="open" class="absolute left-0 w-full p-2 mt-1 bg-white top-full max-h-[300px] overflow-y-scroll" :class="{'block': $wire.searchQuote, 'hidden': !$wire.searchQuote}">
                <div class="flex flex-col gap-1">
                    @if ($quoteList)
                        @foreach ($quoteList as $key => $quote)
                            <div class="flex items-center justify-between gap-5 p-2 cursor-pointer hover:bg-gray-100" wire:key="quote-{{ $key }}" wire:click="selectQuote({{ $key }})" x-on:click="open = false">
                                <span class="truncate">{{ $quote['quote'] }}</span>
                                <span class="text-sm italic truncate">{{ $quote['author'] }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- search song modal --}}
    <div x-cloak x-show="songModalOpen" class="absolute z-10 flex flex-col items-center justify-center w-full h-full bg-black/20">
        <div class="relative p-2 bg-white rounded" x-data="{ open: false }" x-on:click.outside="songModalOpen = false">
            <x-jet-input id="link" class="block w-full mt-1 border-green-500 focus-within:border-green-600" type="text" name="link" placeholder="search your sepcific song" wire:model.debounce.500ms="searchSong" x-on:focus="open = true" />

            {{-- search quote result --}}
            <div x-show="open" class="absolute left-0 w-full p-2 mt-1 bg-white top-full max-h-[300px] overflow-y-scroll" :class="{'block': $wire.searchSong, 'hidden': !$wire.searchSong}">
                <div class="flex flex-col gap-1">
                    @if ($songList)
                        @foreach ($songList as $key => $song)
                            <div class="flex items-center justify-between gap-5 p-2 cursor-pointer hover:bg-gray-100" wire:key="song-{{ $key }}" wire:click="selectSong({{ $key }})" x-on:click="open = false">
                                <span class="truncate">{{ $song['name'] }}</span>
                                <span class="text-sm italic truncate">{{ $song['artists'][0]['name'] }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- goto upgrade page modal --}}
    <div x-cloak x-show="upgradeModalOpen" class="absolute z-10 flex flex-col items-center justify-center w-full h-full bg-black/20">
        <div class="relative flex flex-col gap-3 p-5 bg-white rounded" x-data="{ open: false }" x-on:click.outside="upgradeModalOpen = false">
            <h1 class="text-lg">Upgrade to get Spotify Access</h1>
            <a href="{{ route('upgrade') }}">
                <x-button.red>
                    View Upgrade Option
                </x-button.red>
            </a>
        </div>
    </div>

    <div id="step2" class="bg-white ">
        <div class="h-screen p-8 space-y-6 divide-y divide-slate-100" style="box-shadow: 0px 7.93548px 51.0996px rgba(230, 234, 238, 0.6);">
            <div>
                <p class="mb-8 text-2xl font-semibold">Update Preferences</p>
                <div>
                    <p class="">Motivation SMS Frequency:</p>
                    <div class="grid grid-cols-2 gap-8">
                        <div class="grid grid-cols-3 gap-8 my-1">
                            <button wire:click="selectDuration('daily')" type="button" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 {{ !Auth::user()->isSubscribed() ? 'cursor-not-allowed' : '' }}" :class="{'ring-2 ring-indigo-500 ring-offset-2': $wire.isDaily}">Daily</button>
                            <button wire:click="selectDuration('weekly')" type="button" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50" :class="{'ring-2 ring-indigo-500 ring-offset-2': $wire.isWeekly}">Weekly</button>
                            <button wire:click="selectDuration('monthly')" type="button" class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 {{ !Auth::user()->isSubscribed() ? 'cursor-not-allowed' : '' }}" :class="{'ring-2 ring-indigo-500 ring-offset-2': $wire.isMonthly}">Monthly</button>
                        </div>
                        <div class="flex items-center">
                            <span x-show="$wire.isNever">You will never receive any sms notifications.</span>
                            <select x-show="$wire.isDaily" wire:model="currentSMSFrequency" id="schedule" name="schedule" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                @foreach ($dailyOptions as $key => $option)
                                    <option wire:key="d-{{ $key }}" value="{{ $key }}">{{ $option }}</option>
                                @endforeach
                                <option wire:key="d-18" value="18">Never</option>
                            </select>

                            <select x-show="$wire.isWeekly" wire:model="currentSMSFrequency" id="schedule" name="schedule" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                @foreach ($weeklyOptions as $key => $option)
                                    <option wire:key="d-{{ $key }}" value="{{ $key }}" {{ ($key != 1 && $key != 18 && !Auth::user()->isSubscribed()) ? 'disabled' : '' }}>{{ $option }}</option>
                                @endforeach
                                <option wire:key="d-18" value="18">Never</option>
                            </select>

                            <select x-show="$wire.isMonthly" wire:model="currentSMSFrequency" id="schedule" name="schedule" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                @foreach ($monthlyOptions as $key => $option)
                                    <option wire:key="d-{{ $key }}" value="{{ $key }}">{{ $option }}</option>
                                @endforeach
                                <option wire:key="d-18" value="18">Never</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-2">
                <p class="">Motivation Playlist:</p>
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <button class="px-8 font-medium text-white rounded-lg "  style="background: linear-gradient(0deg, #FD3A84 0%, #FFA68D 100%), #4277C1;">
                            @if (Auth::user()->isSubscribed())
                                <a class="flex items-center justify-between" href="{{ route('upgrade') }}">Request to Get 10+ Songs <img src="images/note.svg" alt=""></a>
                            @else
                                <a class="flex items-center justify-between" href="#" x-on:click="upgradeModalOpen = true">Request to Get 10+ Songs <img src="images/note.svg" alt=""></a>
                            @endif
                        </button>
                    </div>
                    
                    <div>
                        <p>Share this link:</p>
                        <x-jet-input id="link" class="block w-full mt-1 border-green-500 focus-within:border-green-600" type="text" name="link" value="{{ Auth::user()->shareLink() }}" required autofocus disabled />
                    </div>
                </div>
            </div>

            <div class="pt-2">
                <p class="">Today's Quote / Song:</p>
                <div class="grid grid-cols-2 gap-8">
                    <div class="mt-4">
                        <x-button.red>
                            <a href="{{ route('inspiration') }}">View Your Quotes &amp; Songs</a>
                        </x-button.red>
                    </div>
                    <div>
                        <p class="text-sm">When your own family & friends request that you share a song or quote, below are the defaults you have set. You can always edit these placeholders before sharing.</p>
                    </div>
                </div>
            </div>

            <div class="pt-2">
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <div class="flex justify-between mb-4">
                            <div class="flex space-x-4">
                                <img class="w-10 h-10" src="images/quotes.svg" alt="">
                                <div>
                                    <p>Default</p>
                                    <p class="text-2xl font-semibold">Quotes</p>
                                </div>
                            </div>
                            <div>
                                <img x-on:click="{{ Auth::user()->isSubscribed() ? 'quoteModalOpen = true' : 'upgradeModalOpen = true' }}" class="w-10 h-10 cursor-pointer" src="images/search.png" alt="">
                            </div>
                        </div>
                        <div class="relative" x-data="{ open: false }" x-on:click.outside="open = false">
                            <x-jet-input id="link" class="block w-full mt-1 border-green-500 focus-within:border-green-600" type="text" name="link" value="{{ isset(Auth::user()->setting->quote) ? Auth::user()->setting->quote->quote : '' }}" disabled />
                            <p class="mt-2 text-sm text-gray-300">-  {{ isset(Auth::user()->setting->quote) ? Auth::user()->setting->quote->author : '' }}</p>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between mb-4">
                            <div class="flex space-x-4">
                                <img class="w-10 h-10" src="images/songs.svg" alt="">
                                <div>
                                    <p>Default</p>
                                    <p class="text-2xl font-semibold">Songs</p>
                                </div>
                            </div>
                            <div>
                                @if ($spotifyStatus == 'CONNECTED')
                                    <img x-on:click="{{ Auth::user()->isSubscribed() ? 'songModalOpen = true' : 'upgradeModalOpen = true' }}" class="w-10 h-10 cursor-pointer" src="images/spotify.png" alt="">
                                @else
                                    <form method="GET" action="{{ route('oauth.spotify', ['redirect_url' => 'settings']) }}">
                                        <x-button.red class="w-full" wire>Connect Spotify</x-button.red>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <x-jet-input id="link" class="block w-full mt-1 border-green-500 focus-within:border-green-600" type="text" name="link" value="{{ isset(Auth::user()->setting->track) ? Auth::user()->setting->track->name : '' }}" disabled />
                        <p class="mt-2 text-sm text-gray-300">-  {{ isset(Auth::user()->setting->track) ? Auth::user()->setting->track->artist : '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>