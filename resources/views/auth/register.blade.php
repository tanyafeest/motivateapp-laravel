<x-guest-layout>
    <div id="" class="overflow-hidden h-screen relative text-gray-800" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
        <img class="w-11 h-11 absolute top-8 left-8" src="images/back.svg" alt="">
        <div class="flex justify-end">
            <img class="max-h-40" src="images/top-swirl.svg" alt="">
        </div>

        <x-jet-authentication-card>
            <div class="text-zinc-800">
                <p class="text-lg">Create Your Account</p>
                <p class="font-bold text-2xl">to Get Inspired!</p>
            </div>

            <div class="max-w-3xl mx-auto mt-2">
                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="grid grid-rows-5 grid-flow-col gap-4">
                            <div>
                                <x-jet-label for="name" value="{{ __('First Name') }}" />
                                <x-jet-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <div class="text-sm">
                                Male
                                Female
                            </div>

                            <div class="">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required />
                            </div>

                            <div class="">
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                <x-jet-input id="password" class="block w-full" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <div>
                                <x-jet-label for="name" value="{{ __('Current Grade') }}" />
                                <x-jet-input id="name" class="block w-full" type="text" name="grade" :value="old('grade')" required autofocus autocomplete="grade" />
                            </div>
                       
                            <div>
                                <x-jet-label for="name" value="{{ __('Last Name') }}" />
                                <x-jet-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>

                            <div>
                               
                            </div>

                            <div>
                                <x-jet-label for="email" value="{{ __('Cell Phone') }}" />
                                <x-jet-input id="email" class="block  w-full" type="text" name="phone" :value="old('phone')" required />
                            </div>

                            <div>
                                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-jet-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            <div>
                                <x-jet-label for="name" value="{{ __('Activities') }}" />
                                <x-jet-input id="name" class="block  w-full" type="text" name="activities" :value="old('activities')" required autofocus autocomplete="activities" />
                            </div>
                        
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms" required />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-center mt-4">
                        {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a> --}}

                        <x-button.secondary filled class="">
                            {{ __('Submit') }}
                        </x-button.secondary>
                    </div>
                </form>
            </div>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
