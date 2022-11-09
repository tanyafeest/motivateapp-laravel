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
        <div class="flex flex-col items-center justify-center max-w-xl mx-auto mt-10">
            @if ($spotify_id)
                <span class="text-2xl text-cyan-500">Spotify connected: <b>{{ $spotify_id }}</b></span>

                <div class="flex flex-col p-5">
                    <span class="text-xl font-medium text-teal-500">Below are your Top 10 songs you enjoy</span>
                    <div class="flex justify-center mt-5">
                        @forelse ($playLists as $playlist)
                            <div class="w-full p-2 bg-gray-300 rounded cursor-pointer hover:bg-gray-200">{{ $playlist->name }}</div>
                        @empty
                            <span class="text-sm text-center text-red-500">There are no playlists.</span>
                        @endforelse
                    </div>

                    <span class="text-xl font-medium text-teal-500">Below are your playlists</span>

                    <div class="flex justify-center mt-5">
                        @forelse ($playLists as $playlist)
                            <div class="w-full p-2 bg-gray-300 rounded cursor-pointer hover:bg-gray-200">{{ $playlist->name }}</div>
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
        </div>
    </div>
</div>
