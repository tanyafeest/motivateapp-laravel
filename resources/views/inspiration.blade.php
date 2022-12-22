<x-app-layout>
    <div id="step1" class="grid grid-rows-3 items-center h-screen text-white" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), linear-gradient(146.67deg, #7A5CDC 1.12%, #AF55D8 122.75%);"> 
        <div class="flex flex-col items-center mb-6">
            <img class="w-[75px]" src="images/adamdriver.png" alt="">
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
                        <img class="w-12 h-12" src="images/add.png" alt="">
                        <img class="w-12 h-12" src="images/play.png" alt="">
                        <img class="w-12 h-12" src="images/spotify1.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center w-full h-full px-8 pt-4 mt-8 lg:flex-row lg:space-x-8">
            <p class="mb-8 text-sm text-center text-justify w-1/2">Download this inspirational graphic to share on twitter, instagram, facebook or anywhere. </p>
            <div class="w-1/2 flex justify-center"><x-button.white>Download &amp; Share</x-button.white></div>
        </div>
    </div>
    
    <div id="step2" class="hidden">
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

    <div id="step3" class="hidden">
        <div class="px-8 row-span-7">
            <p class="mt-4 text-2xl font-bold">Past Motivation:</p>

            <div class="grid grid-cols-2 gap-8 mt-8">
                <div class="p-4 bg-white shadow round-lg">
                    <table class="table">
                        <tr>
                            <td><img src="images/Message3.png" alt=""></td>
                            <td><p class="text-red-500">Quote:</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p>"I can't erase what you done to me."</p></td>
                        </tr>
                        <tr>
                            <td><img src="images/song.png" alt=""></td>
                            <td><p class="text-red-500">Song:</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p><a href="#">First Time</a></p></td>
                        </tr>
                        <tr>
                            <td><img src="images/send.png" alt=""></td>
                            <td><p class="text-red-500">Shared by::</p></td>
                        </tr>
                        <tr>
                            <td><img src="images/danielsmith.png" alt=""></td>
                            <td><p><a href="#">Daniel Smith</a></p></td>
                        </tr>
                    </table>    
                </div>
                <div class="p-4 bg-white shadow round-lg">
                    <table class="table">
                        <tr>
                            <td><img src="images/Message3.png" alt=""></td>
                            <td><p class="text-red-500">Quote:</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p>"I can't erase what you done to me."</p></td>
                        </tr>
                        <tr>
                            <td><img src="images/song.png" alt=""></td>
                            <td><p class="text-red-500">Song:</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p><a href="#">First Time</a></p></td>
                        </tr>
                        <tr>
                            <td><img src="images/send.png" alt=""></td>
                            <td><p class="text-red-500">Shared by::</p></td>
                        </tr>
                        <tr>
                            <td><img src="images/danielsmith.png" alt=""></td>
                            <td><p><a href="#">Daniel Smith</a></p></td>
                        </tr>
                    </table>    
                </div>
                <div class="p-4 bg-white shadow round-lg">
                    <table class="table">
                        <tr>
                            <td><img src="images/Message3.png" alt=""></td>
                            <td><p class="text-red-500">Quote:</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p>"I can't erase what you done to me."</p></td>
                        </tr>
                        <tr>
                            <td><img src="images/song.png" alt=""></td>
                            <td><p class="text-red-500">Song:</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p><a href="#">First Time</a></p></td>
                        </tr>
                        <tr>
                            <td><img src="images/send.png" alt=""></td>
                            <td><p class="text-red-500">Shared by::</p></td>
                        </tr>
                        <tr>
                            <td><img src="images/danielsmith.png" alt=""></td>
                            <td><p><a href="#">Daniel Smith</a></p></td>
                        </tr>
                    </table>    
                </div>
                <div class="p-4 bg-white shadow round-lg">
                    <table class="table">
                        <tr>
                            <td><img src="images/Message3.png" alt=""></td>
                            <td><p class="text-red-500">Quote:</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p>"I can't erase what you done to me."</p></td>
                        </tr>
                        <tr>
                            <td><img src="images/song.png" alt=""></td>
                            <td><p class="text-red-500">Song:</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p><a href="#">First Time</a></p></td>
                        </tr>
                        <tr>
                            <td><img src="images/send.png" alt=""></td>
                            <td><p class="text-red-500">Shared by::</p></td>
                        </tr>
                        <tr>
                            <td><img src="images/danielsmith.png" alt=""></td>
                            <td><p><a href="#">Daniel Smith</a></p></td>
                        </tr>
                    </table>    
                </div>
                <div class="p-4 bg-white shadow round-lg">
                    <table class="table">
                        <tr>
                            <td><img src="images/Message3.png" alt=""></td>
                            <td><p class="text-red-500">Quote:</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p>"I can't erase what you done to me."</p></td>
                        </tr>
                        <tr>
                            <td><img src="images/song.png" alt=""></td>
                            <td><p class="text-red-500">Song:</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p><a href="#">First Time</a></p></td>
                        </tr>
                        <tr>
                            <td><img src="images/send.png" alt=""></td>
                            <td><p class="text-red-500">Shared by::</p></td>
                        </tr>
                        <tr>
                            <td><img src="images/danielsmith.png" alt=""></td>
                            <td><p><a href="#">Daniel Smith</a></p></td>
                        </tr>
                    </table>    
                </div>
                <div class="p-4 bg-white shadow round-lg">
                    <table class="table">
                        <tr>
                            <td><img src="images/Message3.png" alt=""></td>
                            <td><p class="text-red-500">Quote:</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p>"I can't erase what you done to me."</p></td>
                        </tr>
                        <tr>
                            <td><img src="images/song.png" alt=""></td>
                            <td><p class="text-red-500">Song:</p></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><p><a href="#">First Time</a></p></td>
                        </tr>
                        <tr>
                            <td><img src="images/send.png" alt=""></td>
                            <td><p class="text-red-500">Shared by::</p></td>
                        </tr>
                        <tr>
                            <td><img src="images/danielsmith.png" alt=""></td>
                            <td><p><a href="#">Daniel Smith</a></p></td>
                        </tr>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>