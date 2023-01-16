<x-guest-layout>
    <div x-data="{ age: 0 }" id="" class="relative h-screen overflow-hidden text-gray-800" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), #D9D9D9;">
        <img class="absolute w-11 h-11 top-8 left-8" src="images/back.svg" alt="">
        <div class="flex justify-end">
            <img class="max-h-40" src="images/top-swirl.svg" alt="">
        </div>

        <x-jet-authentication-card>
            <div class="text-zinc-800">
                <p class="text-lg">Create Your Account</p>
                <p class="text-2xl font-semibold">to Get Inspired!</p>
            </div>

            <div class="max-w-3xl mx-auto mt-2">
                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                                <x-jet-input id="first_name" class="block w-full" type="text" name="first_name"  value="{{ session('temp_first_name') }}" readonly required autofocus />
                            </div>

                            <div>
                                <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                                <x-jet-input id="last_name" class="block w-full" type="text" name="last_name" value="{{ session('temp_last_name') }}" readonly required autofocus />
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

                            <div>
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

                            <div class="">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block w-full" type="email" name="email" value="{{ session('temp_email') }}" readonly required />
                            </div>

                            <div>
                                <x-jet-label for="phone" value="{{ __('Cell Phone') }}" />
                                <x-jet-input id="phone" class="block w-full" type="tel" name="phone" :value="old('phone')" pattern="[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}" required />
                            </div>

                            <div class="">
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                <x-jet-input id="password" class="block w-full" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <div>
                                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-jet-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            <template x-if="age == 0">
                                <div>
                                    <x-jet-label for="grade" value="{{ __('Current Grade') }}" />
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

                            <template x-if="age == 0">
                                <div>
                                    <x-jet-label for="activity" value="{{ __('Activities') }}" />
                                    <select class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="sport" name="sport">
                                        @foreach ($sports as $sport)
                                            <option value="{{ $sport->id }}">{{ $sport->sport }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </template>
                        
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms" required />

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

                    <div class="flex items-center justify-center mt-4">
                        {{-- <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script>
        $(document).ready(function(){
            // register validation
            // initialize the phone number filed with Intl Tele
            const phone = document.getElementById("phone");

            phone.setAttribute('readonly', true);
            const intlPhone = window.intlTelInput(phone, {
                initialCountry: "us",
                autoPlaceholder: "aggressive",
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });
            intlPhone.promise.then(function() {
                phone.removeAttribute('readonly');
            });

            function inputMasking(formatterInput) {
                // get the format fromt intl-tel-input placeholder
                let format = $(formatterInput).attr('placeholder');

                if(!format) {
                    format = '201 555 0123';
                }
                // replace all digits to zero and use is as the mask
                $(formatterInput).mask(format.replace(/[1-9]/g, 0));
            }

            $('#phone').on('countrychange', function(e, countryData) {
                $(this).val('');
                inputMasking(this);
                console.log($(this).attr('placeholder'));
            });

            // // initialize the mask
            inputMasking('#phone');
        });
    </script>
</x-guest-layout>
