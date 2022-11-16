<x-guest-layout>
    <div id="" class="overflow-hidden h-screen relative" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
        <img class="w-11 h-11 absolute top-8 left-8" src="images/back.svg" alt="">
        <div class="flex justify-end">
            <img class="max-h-40" src="images/top-swirl.svg" alt="">
        </div>
        
        <x-jet-authentication-card>
            <div class="text-zinc-800">
                <p>Let’s Sign you In</p>
                <p>You have been Missed!</p>
            </div>

            <div class="max-w-md mx-auto mt-24">
                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-jet-label for="email" value="{{ __('Your Email / Username') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Your Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-jet-button class="ml-4">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
