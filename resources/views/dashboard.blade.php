<x-app-layout>
    <div class="bg-red-100 row-start-2 row-end-4">
        <div class="grid grid-cols-2 gap-8 p-8">
            <div>
                <div class="flex justify-between mb-4">
                    <div class="flex space-x-4">
                        <img src="images/quotes.svg" alt="">
                        <div>
                            <p class="text-2xl font-semibold">Quotes</p>
                            <p>Received</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold text-4xl text-transparent bg-clip-text bg-gradient-to-br from-pink-300 to-red-600">3</p>
                    </div>
                </div>
                <x-button.red class="w-full">Request More</x-button.red>
            </div>
            <div>
                <div class="flex justify-between mb-4">
                    <div class="flex space-x-4">
                        <img src="images/songs.svg" alt="">
                        <div>
                            <p>Recommended</p>
                            <p class="text-2xl font-semibold">Songs</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold text-4xl text-transparent bg-clip-text bg-gradient-to-br from-pink-300 to-red-600">3</p>
                    </div>
                </div>

                <x-button.red class="w-full">Request More</x-button.red>
                
                <p class="text-xs text-stone-300 mt-4"><strong>Note:</strong> Average user has 85 quotes and 107 songs submitted</p>
            </div>
        </div>
    </div>

    <div class="row-start-4 row-end-9">
        <div id="step1" class="hidden bg-sky-300 relative text-white min-h-[440px]">
            <img src="images/dashboard.png" class="absolute bottom-0 right-0 max-w-xl" alt="">
            <p class="text-6xl absolute left-8 top-16">
                <span class="font-semibold">Motivate</span><br /> to Be <span class="font-semibold">Your<br /> Best</span>
            </p>
        </div>

        <div id="step2" class=" bg-white flex justify-between">
            <div class="w-[72rem] p-8 h-screen" style="box-shadow: 0px 7.93548px 51.0996px rgba(230, 234, 238, 0.6);">
                <p>Receiving Motivational</p>
                <p class="font-semibold text-2xl mb-8">Quotes & Songs:</p>

                <p class="text-xs">Using your public share link:</p>

                <x-jet-input id="link" class="block mt-1 w-full border-green-500 focus-within:border-green-600" type="text" name="link" :value="old('link')" required autofocus />

                <p class="text-xs mt-4">you can receive from any friends, family, teammates, colleaguesm anyone! Here are the steps how. Once you`ve completed, check it off your “to do” list!
            </div>
            <div class="h-screen p-8 text-sm" style="box-shadow: 0px 7.93548px 51.0996px rgba(230, 234, 238, 0.6);">
                <div>
                    <div>
                        <div>
                            <x-jet-checkbox id="link" class="text-gray-800" name="msg" :value="old('msg')" autofocus />
                            Text a message to Friends &amp; Family
                        </div>
                        <div class="flex justify-between space-x-2 px-4">
                            <div class="">
                                <a href="#" class="group flex items-center justify-center rounded-lg">
                                    <span class="sr-only">User</span>
                                    <img class="w-20" src="images/User.svg" />
                                </a>
                            </div>
                            <div class="bg-white rounded-xl shadow p-2">
                                <p>Check out https://sharelink.com/4as/asdjashdj where you can recommend a motivational song or inspiring quote for me. </p>
                            </div>
                            <img src="images/copy.svg" alt="">
                        </div>
                    </div>
                    
                    <div>
                        <div>
                            <x-jet-checkbox id="link" class="text-gray-800" name="msg" :value="old('msg')" autofocus />
                            Share in Chat App
                        </div>
                        <div class="flex justify-between space-x-4 py-4">
                            <img src="images/whatsapp.svg" alt="">
                            <img src="images/slack.svg" alt="">
                            <img src="images/chat.svg" alt="">
                            <img src="images/twitch.svg" alt="">
                        </div>
                    </div>
                    
                    <div>
                        <div>
                            <x-jet-checkbox id="link" class="text-gray-800" name="msg" :value="old('msg')" autofocus />
                            Share Socially in Each App
                        </div>
                        <div class="flex justify-between space-x-4 py-4">
                            <img src="images/instagram.svg" alt="">
                            <img src="images/facebook.svg" alt="">
                            <img src="images/tik-tok.svg" alt="">
                            <img src="images/twitter.svg" alt="">
                        </div>
                    </div>
                    
                    <div>
                        <div>
                            <x-jet-checkbox id="link" class="text-gray-800" name="msg" :value="old('msg')" autofocus />
                            Send Email to Friends &amp; Family
                        </div>
                    </div>
                </div>

                <x-button.red class="w-full mt-2">Send Email</x-button.red>
            </div>
        </div>
    </div>
</x-app-layout>
