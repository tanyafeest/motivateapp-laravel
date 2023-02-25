<div>
    <div id="step1" class="hidden">
        <div class="grid items-end grid-cols-2 row-start-2 row-end-4 px-8 pb-8 bg-sky-50">
            <div class="">
                <h1 class="text-6xl font-bold">Stronger</h1>
                <p class="text-4xl font-light">Kanye West</p>
            </div>
            <div class="flex justify-end space-x-8">
                <img class="w-4 h-4" src="images/favorite-filled.png" alt="">
                <img class="w-4 h-4" src="images/shuffle.png" alt="">
                <img class="w-4 h-4" src="images/repeat.png" alt="">
                <img class="w-4 h-4" src="images/share.png" alt="">
            </div>
        </div>

        <div class="row-start-4 px-8 row-end-9">
            <table class="table w-full my-4">
                <tr>
                    <td><img class="w-8 h-8" src="images/played.png" alt=""></td>
                    <td><span class="text-xl font-bold">Stronger</span><br /><span class="text-sm font-light">Kanye West</span></td>
                    <td><img class="w-4 h-4" src="images/favorite.png" alt=""></td>
                    <td>4:07</td>
                </tr>
                <tr>
                    <td><img class="w-8 h-8" src="images/play-list.png" alt=""></td>
                    <td><span class="text-xl font-bold">Rockstar</span><br /><span class="text-sm font-light">Post Malone featuring 21 Savage</span></td>
                    <td><img class="w-4 h-4" src="images/favorite.png" alt=""></td>
                    <td>4:07</td>
                </tr>
                <tr>
                    <td><img class="w-8 h-8" src="images/play-list.png" alt=""></td>
                    <td><span class="text-xl font-bold">Stronger</span><br /><span class="text-sm font-light">Kanye West</span></td>
                    <td><img class="w-4 h-4" src="images/favorite.png" alt=""></td>
                    <td>4:07</td>
                </tr>
                <tr>
                    <td><img class="w-8 h-8" src="images/play-list.png" alt=""></td>
                    <td><span class="text-xl font-bold">Rockstar</span><br /><span class="text-sm font-light">Post Malone featuring 21 Savage</span></td>
                    <td><img class="w-4 h-4" src="images/favorite.png" alt=""></td>
                    <td>4:07</td>
                </tr>
                <tr>
                    <td><img class="w-8 h-8" src="images/play-list.png" alt=""></td>
                    <td><span class="text-xl font-bold">Stronger</span><br /><span class="text-sm font-light">Kanye West</span></td>
                    <td><img class="w-4 h-4" src="images/favorite.png" alt=""></td>
                    <td>4:07</td>
                </tr>
            </table>

            <div class="flex flex-col items-center">
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
            </div>
        </div>
    </div>

    <div id="step2" class="h-screen">
        <div class="row-start-2 px-8 row-end-9">
            <p class="mt-4 text-2xl font-bold">Past Motivation:</p>
            <div class="grid grid-cols-2 gap-8 mt-8">
                @foreach (Auth::user()->inspirations as $key => $inspiration)
                    <div class="p-4 bg-white shadow round-lg" wire:key="inspiration-{{ $key }}">
                        <table class="table">
                            <tr>
                                <td><img src="images/Message3.png" alt=""></td>
                                <td><p class="text-red-500">Quote:</p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><p>"{{ $inspiration->quote->quote }}"</p></td>
                            </tr>
                            <tr>
                                <td><img src="images/song.png" alt=""></td>
                                <td><p class="text-red-500">Song:</p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><p><a href="#" wire:click="handleSetCurrentTrack({{ $inspiration->track->id }})">{{ $inspiration->track->name }}</a></p></td>
                            </tr>
                            <tr>
                                <td><img src="images/send.png" alt=""></td>
                                <td><p class="text-red-500">Shared by::</p></td>
                            </tr>
                            <tr>
                                <td><img src="images/danielsmith.png" alt=""></td>
                                <td><p><a href="#">{{ $inspiration->sharedbyUser->name }}</a></p></td>
                            </tr>
                        </table>    
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>