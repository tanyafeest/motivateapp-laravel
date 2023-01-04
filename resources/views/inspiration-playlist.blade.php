<x-app-layout>
    <div class="flex flex-col">
        <div class="lg:bg-sky-50">
            @livewire('header-profile')
        </div>
        
        <div class="">
            <div class="flex grid items-end grid-cols-2 row-span-2 px-8 pb-8 bg-sky-50">
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
    </div>
</x-app-layout>