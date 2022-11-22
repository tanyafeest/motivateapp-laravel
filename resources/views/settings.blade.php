<x-app-layout>
    <div class="row-span-11">
        <div id="step2" class=" bg-white">
            <div class="p-8 h-screen divide-y divide-slate-100 space-y-6" style="box-shadow: 0px 7.93548px 51.0996px rgba(230, 234, 238, 0.6);">
                <div>
                    <p class="font-semibold text-2xl mb-8">Update Preferences</p>
                    <div>
                        <p class="">Motivation SMS Frequency:</p>
                        <div class="grid grid-cols-2 gap-8">
                            <div class="my-1 space-x-4">
                                <button type="button" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Daily</button>
                                <button type="button" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Weekly</button>
                                <button type="button" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Monthly</button>
                            </div>
                            <div>
                                <select id="schedule" name="schedule" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option>Monday Night</option>
                                    <option>Tuesday Night</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <p class="">Motivation Playlist:</p>
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <button class=" px-8 rounded-lg font-medium text-white flex justify-between items-center"  style="background: linear-gradient(0deg, #FD3A84 0%, #FFA68D 100%), #4277C1;">Request to Get 10+ Songs <img src="images/note.svg" alt=""></button>
                        </div>
                        
                        <div>
                            <p>Share this link:</p>
                            <x-jet-input id="link" class="block mt-1 w-full border-green-500 focus-within:border-green-600" type="text" name="link" :value="old('link')" required autofocus />
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <p class="">Today's Quote / Song:</p>
                    <div class="grid grid-cols-2 gap-8">
                        <div class="mt-4">
                            <x-button.red>View Your Quotes &amp; Songs</x-button.red>
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
                                    <img class="h-10 w-10" src="images/quotes.svg" alt="">
                                    <div>
                                        <p>Default</p>
                                        <p class="text-2xl font-semibold">Quotes</p>
                                    </div>
                                </div>
                                <div>
                                    <img class="h-10 w-10" src="images/search.png" alt="">
                                </div>
                            </div>
                            <x-jet-input id="link" class="block mt-1 w-full border-green-500 focus-within:border-green-600" type="text" name="link" :value="old('link')" required autofocus />
                            <p class="mt-2 text-gray-300 text-sm">-  Spock</p>
                        </div>
                        <div>
                            <div class="flex justify-between mb-4">
                                <div class="flex space-x-4">
                                    <img class="h-10 w-10" src="images/songs.svg" alt="">
                                    <div>
                                        <p>Default</p>
                                        <p class="text-2xl font-semibold">Songs</p>
                                    </div>
                                </div>
                                <div>
                                    <img class="h-10 w-10" src="images/spotify.png" alt="">
                                </div>
                            </div>
                            <x-jet-input id="link" class="block mt-1 w-full border-green-500 focus-within:border-green-600" type="text" name="link" :value="old('link')" required autofocus />
                            <p class="mt-2 text-gray-300 text-sm">-  Survivor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
