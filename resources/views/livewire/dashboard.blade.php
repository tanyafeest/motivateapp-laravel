<div>
    <div>
        {{-- Stop trying to control. --}}
    </div>
    <div class="row-start-2 row-end-4 bg-red-100">
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
                        <p class="text-4xl font-semibold text-transparent bg-clip-text bg-gradient-to-br from-pink-300 to-red-600">{{ Auth::user()->numberOfQuotes() }}</p>
                    </div>
                </div>
                <x-button.red onclick="handleRequestMore()" class="w-full">Request More</x-button.red>
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
                        <p class="text-4xl font-semibold text-transparent bg-clip-text bg-gradient-to-br from-pink-300 to-red-600">{{ Auth::user()->numberOfSongs() }}</p>
                    </div>
                </div>
    
                <x-button.red onclick="handleRequestMore()" class="w-full">Request More</x-button.red>
                
                <p class="mt-4 text-xs text-stone-300"><strong>Note:</strong> Average user has 85 quotes and 107 songs submitted</p>
            </div>
        </div>
    </div>
    
    <div class="row-start-4 row-end-9">
        <div id="step1" class="hidden bg-sky-300 relative text-white min-h-[440px]">
            <img src="images/dashboard.png" class="absolute bottom-0 right-0 max-w-xl" alt="">
            <p class="absolute text-6xl left-8 top-16">
                <span class="font-semibold">Motivate</span><br /> to Be <span class="font-semibold">Your<br /> Best</span>
            </p>
        </div>
    
        <div id="step2" class="flex justify-between bg-white ">
            <div class="w-[72rem] p-8 h-screen" style="box-shadow: 0px 7.93548px 51.0996px rgba(230, 234, 238, 0.6);">
                <p>Receiving Motivational</p>
                <p class="mb-8 text-2xl font-semibold">Quotes & Songs:</p>
    
                <p class="text-xs">Using your public share link:</p>
    
                <x-jet-input id="link" class="block w-full mt-1 border-green-500 focus-within:border-green-600" type="text" name="link" value="{{ Auth::user()->shareLink() }}" readonly required autofocus />
    
                <p class="mt-4 text-xs">you can receive from any friends, family, teammates, colleaguesm anyone! Here are the steps how. Once you`ve completed, check it off your “to do” list!
            </div>
            <div class="h-screen p-8 text-sm" style="box-shadow: 0px 7.93548px 51.0996px rgba(230, 234, 238, 0.6);">
                <div>
                    <div>
                        <div>
                            <x-jet-checkbox id="text-message" wire:model="todoList.0" value="0" wire:change="checkTodo('message', 'toggle')" class="text-gray-800" name="msg" autofocus />
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
                                <p>Check out <span class="text-red-500 underline">{{ Auth::user()->shareLink() }}</span> where you can recommend a motivational song or inspiring quote for me. </p>
                            </div>
                            <img src="images/copy.svg" alt="">
                        </div>
                    </div>
                    
                    <div>
                        <div>
                            <x-jet-checkbox id="share-chatapp" wire:model="todoList.1" value="1" wire:change="checkTodo('chat', 'toggle')" class="text-gray-800" name="msg" :value="old('msg')" autofocus />
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
                            <x-jet-checkbox id="share-socials" wire:model="todoList.2" value="2" wire:change="checkTodo('social', 'toggle')" class="text-gray-800" name="msg" :value="old('msg')" autofocus />
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
                            <x-jet-checkbox id="send-email" wire:model="todoList.3" value="3" wire:change="checkTodo('email', 'toggle')" class="text-gray-800" name="msg" :value="old('msg')" autofocus />
                            Send Email to Friends &amp; Family
                        </div>
                    </div>
                </div>
    
                <x-button.red class="w-full mt-2">
                    <a href="{{ Auth::user()->encodedMail() }}">Send Email</a>
                </x-button.red>
            </div>
        </div>
    </div>

    @push('custom-script')
    <script>
        const auth = @js(Auth::user());

        function handleRequestMore() {
            navigator.clipboard.writeText("{{ Auth::user()->shareLink() }}");
            Toast.info('Link has been copied. Please share with your friends and family.', `Hey, ${auth.name}`);
        }
        
        window.onload = () => {
            const msg = `Hey, ${auth.name}! Welcome to Motivemob world!`;

            if(!sessionStorage.getItem("isLoggedIn")) {
                Toast.success(msg, 'Welcome');
                sessionStorage.setItem("isLoggedIn", true);
            }
        }
    </script>
    @endpush
</div>