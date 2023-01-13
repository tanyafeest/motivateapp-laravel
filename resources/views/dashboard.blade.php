<x-app-layout>
    <div class="flex flex-col lg:bg-sky-300 lg:h-full">
        <div class="lg:bg-sky-50">
            @livewire('header-profile')
        </div>
    
        <div class="pb-12 bg-white h-screen lg:h-auto">
            @livewire('quotes-songs')
        </div>
        
        <div id="step1" class="hidden lg:block">
            <img src="images/dashboard.png" class="lg:absolute bottom-0 right-0 max-w-xl" alt="">

            <div class="relative">
                <p class="absolute text-6xl left-8 top-16 text-white">
                    <span class="font-semibold">Motivate</span><br /> to Be <span class="font-semibold">Your<br /> Best</span>
                </p>
            </div>
        </div>

        <div id="step2" class="hidden lg:hidden bg-white lg:flex lg:justify-between">
            <div class="p-8" style="box-shadow: 0px 7.93548px 51.0996px rgba(230, 234, 238, 0.6);">
                <p>Receiving Motivational</p>
                <p class="mb-8 text-2xl font-semibold">Quotes & Songs:</p>

                <p class="text-xs">Using your public share link:</p>

                <x-jet-input id="link" class="block w-full mt-1 border-green-500 focus-within:border-green-600" type="text" name="link" :value="old('link')" required autofocus />

                <p class="mt-4 text-xs">you can receive from any friends, family, teammates, colleagues anyone! Here are the steps how. Once you`ve completed, check it off your “to do” list!
            </div>
            <div class="p-8 text-sm lg:h-screen" style="box-shadow: 0px 7.93548px 51.0996px rgba(230, 234, 238, 0.6);">
                <div class="flex flex-col space-y-8 lg:block lg:space-y-2">
                    <div>
                        <div>
                            <x-jet-checkbox id="link" class="text-gray-800" name="msg" :value="old('msg')" autofocus />
                            Text a message to Friends &amp; Family
                        </div>
                        <div class="flex justify-between px-4 space-x-2">
                            <div class="">
                                <a href="#" class="flex items-center justify-center rounded-lg group">
                                    <span class="sr-only">User</span>
                                    <img class="w-20" src="images/User.svg" />
                                </a>
                            </div>
                            <div class="p-2 bg-white shadow rounded-xl">
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
                        <div class="flex justify-between py-4 space-x-4">
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
                        <div class="flex justify-between py-4 space-x-4">
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
