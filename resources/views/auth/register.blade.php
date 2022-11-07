<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" x-data="{ age: 0 }">
            @csrf

            <div>
                <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                <x-jet-input id="first_name" class="block w-full mt-1" type="text" name="first_name" value="{{ session('temp_first_name') }}" readonly required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                <x-jet-input id="last_name" class="block w-full mt-1" type="text" name="last_name" value="{{ session('temp_last_name') }}" readonly required autofocus />
            </div>

            <div class="flex justify-center py-4 pt-5">
                <div class="flex gap-5">
                    <div class="flex items-center gap-5">
                        <x-jet-label for="gender" value="{{ __('Male') }}" />
                        <input type="radio" id="gender_male" name="gender" value="0" checked />
                    </div>
                    <div class="flex items-center gap-5">
                        <x-jet-label for="gender" value="{{ __('Female') }}" />
                        <input type="radio" id="gender_female" name="gender" value="1" />
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('E-mail') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" value="{{ session('temp_email') }}" readonly required />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Cell Phone') }}" />
                <x-jet-input id="phone" class="block w-full mt-1" type="text" name="phone" placeholder="123-456-7890" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="age" value="{{ __('Age') }}" />
                <select class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="age" name="age" x-model="age">
                    <option value="0">10-19</option>
                    <option value="1">20-29</option>
                    <option value="2">30-39</option>
                    <option value="3">40-49</option>
                    <option value="4">50-59</option>
                    <option value="5">60-69</option>
                    <option value="6">70-99</option>
                </select>
            </div>

            <template x-if="age == 0">
                <div class="mt-4">
                    <x-jet-label for="sport" value="{{ __('Activities') }}" />
                    <select class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="sport" name="sport">
                        @foreach ($sports as $sport)
                            <option value="{{ $sport->id }}">{{ $sport->sport }}</option>
                        @endforeach
                    </select>
                </div>
            </template>

            <template x-if="age == 0">
                <div class="mt-4">
                    <x-jet-label for="current_grade" value="{{ __('Current Grade') }}" />
    
                    <select class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="current_grade" name="current_grade">
                        <option value="6">6th</option>
                        <option value="7">7th</option>
                        <option value="8">8th</option>
                        <option value="9">9th</option>
                        <option value="10">10th</option>
                        <option value="11">11th</option>
                        <option value="12">12th</option>
                        <option value="15">College</option>
                    </select>
                </div>
            </template>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Your Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Retype Password') }}" />
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="  terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="mt-4">
                <label for="terms" class="flex items-center">
                    <x-jet-checkbox id="terms" name="terms" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('I agree to the privacy and terms of service.') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
