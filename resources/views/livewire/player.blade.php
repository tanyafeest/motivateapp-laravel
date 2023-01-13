<div class="h-screen">
    @if ($currentTrack)
        {{-- images for left side --}}
        {{-- <div class="relative flex px-5 py-10">
            <img src="{{ isset($currentTrack['album_img']) ? $currentTrack['album_img'] : '/default/png' }}" class="w-full h-[400px]">
            <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full">
                <div class="relative w-[300px] h-[300px]">
                    <img src="{{ isset($currentTrack['artist_img']) ? $currentTrack['artist_img'] : '/default/png' }}" class="w-[300px] h-[300px]">
                
                    <div class="absolute top-0 left-0 flex flex-col w-full h-full gap-24 mt-3 text-white">
                        <span class="text-3xl font-bold text-center">{{ $currentTrack['artist_name'] }}</span>
                        <span class="text-6xl font-bold text-center truncate">{{ $currentTrack['name'] }}</span>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="h-full">
            <div class="grid items-end grid-cols-2 row-start-2 row-end-4 px-8 pb-8 bg-sky-50">
                <div class="">
                    <h1 class="text-6xl font-bold truncate">{{ $currentTrack['name'] }}</h1>
                    <p class="text-4xl font-light">{{ $currentTrack['artist_name'] }}</p>
                </div>
                <div class="flex justify-end space-x-8">
                    <img class="w-4 h-4" src="images/favorite-filled.png" alt="">
                    <img class="w-4 h-4" src="images/shuffle.png" alt="">
                    <img class="w-4 h-4" src="images/repeat.png" alt="">
                    <img class="w-4 h-4" src="images/share.png" alt="">
                </div>
            </div>
    
            <div class="row-start-4 px-8 row-end-9">
                <table class="table w-full gap-5 my-4">
                    @forelse (Auth::user()->inspirations as $key => $inspiration)
                        <tr wire:key="track-{{ $key }}">
                            <td><img onclick="load('{{ $inspiration->track->external_url }}')" wire:click="handleSetCurrentTrack({{ $inspiration->track->id }})" class="w-8 h-8 cursor-pointer" src="images/play-list.png" alt=""></td>
                            <td><span class="text-xl font-bold">{{ $inspiration->track->name }}</span><br /><span class="text-sm font-light">{{ $inspiration->track->artist }}</span></td>
                            <td><img class="w-4 h-4" src="images/favorite.png" alt=""></td>
                            <td>{{ date("H:i:s", $inspiration->track->duration / 1000) }}</td>
                        </tr>
                    @empty
                        
                    @endforelse
                </table>
    
                {{-- <div class="flex flex-col items-center">
                    <div class="w-full">
                        <div class="my-4"><hr /></div>
                        <div class="flex justify-between text-xs font-medium text-gray-400">
                            <div>
                                1:43
                            </div>
                            <div>
                                3:58
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div><img class="w-5 h-5" src="images/previous.png" alt=""></div>
                        <div><img src="images/play_arrow.png" alt=""></div>
                        <div><img class="w-5 h-5" src="images/next.png" alt=""></div>
                    </div>
                </div> --}}

                {{-- embeded widget --}}
                <div id="embed-iframe"></div>
            </div>
        </div>
    @else
        <div class="flex flex-col items-center justify-center h-full">
            There are no songs here.
        </div>
    @endif

    <script type="text/javascript">
        const embedableWidget = document.getElementById("embed-iframe");

        function load(url) {
            fetch(`https://open.spotify.com/oembed?url=${url}`)
                .then((response) => response.json())
                .then((data) => {
                    embedableWidget.innerHTML = data.html;
                });
        }

        load('{{ $currentTrack["uri"] }}');
    </script>
</div>