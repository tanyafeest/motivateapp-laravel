<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        {{-- top header --}}
        <div class="flex items-center justify-between">
            {{-- hamburger button --}}
            <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"><-</button>
        
            {{-- title & name --}}
            <div class="flex flex-col text-center">
                <span>Account information</span>
                <span class="font-bold">{{ Auth::user()->name }}</span>
            </div>

            {{-- avatar --}}
            <img src="/img/avatar.svg" alt="{{ Auth::user()->name }}" width="48" height="48" class="w-12 h-12" />
        </div>

        {{-- Connect Spotify --}}
        {{-- <div class="flex flex-col items-center justify-center max-w-xl mx-auto mt-10">
            @if ($spotify_id)
                <span class="text-2xl text-cyan-500">Spotify connected: <b>{{ $spotify_id }}</b></span>

                <div class="flex flex-col p-5">
                    <span class="text-xl font-medium text-teal-500">Below are your Top 10 songs you enjoy</span>
                    <div class="flex justify-center mt-5">
                        @forelse ($topItems as $topItem)
                            <div class="w-full p-2 bg-gray-300 rounded cursor-pointer hover:bg-gray-200">{{ $topItem->name }}</div>
                        @empty
                            <span class="text-sm text-center text-red-500">There are no playlists.</span>
                        @endforelse
                    </div>

                    <span class="text-xl font-medium text-teal-500">Below are your playlists</span>

                    <div class="flex justify-center mt-5">
                        @forelse ($playLists as $playlist)
                            <div class="w-full p-2 bg-gray-300 rounded cursor-pointer hover:bg-gray-200">{{ $playlist->id }}</div>
                        @empty
                            <span class="text-sm text-center text-red-500">There are no playlists.</span>
                        @endforelse
                    </div>
                </div>
            @else
                <form method="GET" action="{{ route('oauth.spotify') }}">
                    <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Connect Spotify</button>
                </form>
            @endif
        </div> --}}

        {{-- Quotes and Songs --}}
        <div class="flex w-full gap-5 mt-5">
            {{-- Quotes Card --}}
            <div class="flex flex-col w-full gap-5 p-5">
                <div class="flex items-center justify-between">
                    <span>Quotes Received</span>
                    <span>{{ Auth::user()->numberOfQuotes() }}</span>
                </div>

                <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Request More</button>
            </div>

            {{-- Songs Card --}}
            <div class="flex flex-col w-full gap-5 p-5">
                <div class="flex items-center justify-between">
                    <span>Recommended Songs</span>
                    <span>{{ Auth::user()->numberOfSongs() }}</span>
                </div>

                <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Request More</button>
            </div>
        </div>

        {{-- Setting --}}
        <div class="flex w-full mt-10">
            <div class="flex flex-col w-3/5 gap-10 p-5">
                <div class="flex flex-col gap-1">
                    <span>Receiving Motivational</span>

                    <span class="text-xl">Quotes & Songs</span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="text-sm text-gray-400">Using your public share link</span>

                    <span class="underline cursor-pointer underline-offset-4">{{ env("APP_URL") . Auth::user()->share_link . "/" . str_replace(" ", "",strtolower(Auth::user()->name)) }}</span>
                
                    <span class="text-sm text-gray-400">you can receive from any friends, family, teammates, colleaguesm anyone! Here are the steps how. Once you`ve completed, check it off your “to do” list!</span>
                </div>
            </div>

            <div class="flex flex-col w-2/5 gap-5 p-5">
                <div class="flex flex-col gap-5">
                    <div class="flex items-center mb-4">
                        <input id="text-message" type="checkbox" wire:model="todolist.0" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" wire:change="checkTodo('message')">
                        <label for="text-message" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Text a message to Friends & Family</label>
                    </div>

                    <div class="p-2 border rounded-lg shadow-md">
                        Check out <span class="text-red-500 underline cursor-pointer">https://sharelink.com/4as/asdjashdj</span> where you can recommend a motivational song or inspiring quote for me. 
                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <div class="flex items-center mb-4">
                        <input id="share-chatapp" type="checkbox" wire:model="todolist.1" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" wire:change="checkTodo('chat')">
                        <label for="share-chatapp" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Share in Chat App</label>
                    </div>

                    <div class="flex justify-between">
                        <img src="/img/whatsapp.svg" width="40" height="40" class="w-10 h-10" />
                        <img src="/img/chat.svg" width="40" height="40" class="w-10 h-10" />
                        <img src="/img/slack.svg" width="40" height="40" class="w-10 h-10" />
                        <img src="/img/twitch.svg" width="40" height="40" class="w-10 h-10" />
                    </div>
                </div>

                <div class="flex flex-col gap-5">
                    <div class="flex items-center mb-4">
                        <input id="share-socials" type="checkbox" wire:model="todolist.2" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" wire:change="checkTodo('social')">
                        <label for="share-socials" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Share Socially in Each App</label>
                    </div>

                    <div class="flex justify-between">
                        <img src="/img/instagram.svg" width="40" height="40" class="w-10 h-10" />
                        <img src="/img/facebook.svg" width="40" height="40" class="w-10 h-10" />
                        <img src="/img/tik-tok.svg" width="40" height="40" class="w-10 h-10" />
                        <img src="/img/twitter.svg" width="40" height="40" class="w-10 h-10" />
                    </div>
                </div>

                <div class="flex flex-col gap-5">
                    <div class="flex items-center mb-4">
                        <input id="send-email" type="checkbox" wire:model="todolist.3" value="3" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" wire:change="checkTodo('email')">
                        <label for="send-email" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Share Socially in Each App</label>
                    </div>

                    <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Send Email</button>
                </div>
            </div>
        </div>
    </div>
</div>
