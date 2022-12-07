<x-guest-layout>
    <div id="" class="relative h-screen overflow-hidden text-gray-800" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
        <img class="absolute w-11 h-11 top-8 lg:top-8 left-4 lg:left-8" src="images/back.svg" alt="">
        <div class="flex justify-end">
            <img class="mx-auto mt-8 mb-8 w-11 lg:hidden" src="images/m-silver.svg" alt="">
            <img class="hidden max-h-40 lg:block" src="images/top-swirl.svg" alt="">
        </div>
        
        <x-jet-authentication-card>
            <div class="text-zinc-800">
                <p class="text-lg">Let’s Sign You In</p>
                <p class="text-2xl font-semibold">You have been Missed!</p>
            </div>

            <div class="max-w-md mx-auto mt-20">
                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-jet-label for="email" value="{{ __('Your Email / Username') }}" />
                        <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Your Password') }}" />
                        <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password" />
                    </div>

                
                    <div class="flex items-center justify-between mt-4">
                        <div class="">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                    
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                    <x-button.secondary filled class="w-full mt-12">
                        {{ __('Log in') }}
                    </x-button.secondary>

                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <x-button.secondary>G</x-button.secondary>
                        <x-button.secondary>F</x-button.secondary>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <p>Don’t have a Account? <span class="text-blue-500"><a href="">Sign Up</a></span></p>
                </div>
            </div>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
