<x-app-layout>
        <div class="lg:bg-sky-50">
            @livewire('header-profile')
        </div>
    <div id="step2" class="flex flex-col mt-20 h-screen p-8">
        

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('payment.subscription') }}" class="" id="subscribe-form">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-20">
                    <div class="">
                        <x-jet-label for="card-email" value="{{ __('Email') }}" />
                        <x-jet-input id="card-email" class="block w-full" type="email" name="card-email" value="{{ Auth::user()->email }}" readonly required />
                    </div>

                    <div class="space-y-4">
                        <div>
                            <x-jet-label for="card-number" value="{{ __('Card information') }}" />
                            <div class="block w-full px-3 py-2 text-sm bg-white border-b border-gray-800 h-[38px]">
                                <div id="card-number"></div>
                                <div id="card-number-error" class="mt-4 text-[#000000]"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-3">
                            <div class="col-span-1 mt-10">
                                <x-jet-label for="card-zip" value="{{ __('Expiry') }}" />
                                <div class="block w-full px-3 py-2 text-sm bg-white border-b border-gray-800 h-[38px]">
                                    <div id="card-expiry"></div>
                                </div>
                            </div>
                            <div class="col-span-1 col-start-3 mt-10">
                                <x-jet-label for="card-zip" value="{{ __('Cvc') }}" />
                                <div class="block w-full px-3 py-2 text-sm bg-white border-b border-gray-800 h-[38px]">
                                    <div id="card-cvc"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-20">
                    <div class="relative">
                        <x-jet-label for="card-name" value="{{ __('Name on card') }}" />
                        <x-jet-input id="card-name" class="block w-full" type="text" name="card-name" value="{{ Auth::user()->name }}" required />
                    </div>

                    <div class="space-y-4">
                        <div>
                            <x-jet-label for="card-country" value="{{ __('Country or region') }}" />
                            <select id="card-country" class="w-full h-[38px] border-none rounded-md shadow-sm focus:ring-0" id="card-country" name="card-country">
                                @foreach ($countries as $country)
                                    <option>{{ $country['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="margin-top:3.5rem">
                            <x-jet-label for="card-zip" value="{{ __('Zip') }}" />
                            <x-jet-input id="card-zip" class="block w-full" type="text" name="card-zip" required autofocus />
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button.red filled id="btn_subscribe" class="">
                    {{ __('Subscribe') }}
                </x-button.red>
            </div>
        </form>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const clientSecret = '{{ $intent->client_secret }}';
        const STRIPE_ID = '{{ $intent->id}}';
        const STRIPE_KEY = '{{ config("services.stripe.key") }}';
        const email = document.getElementById('card-email').value;

        const style = {
            base: {
                color: '#32325D',
                fontWeight: 500,
                fontFamily: 'Source Code Pro, Consolas, Menlo, monospace',
                fontSize: '14px',
                fontSmoothing: 'antialiased',

                '::placeholder': {
                    color: '#CFD7DF',
                },
                ':-webkit-autofill': {
                    color: '#e39f48',
                },
            },
            invalid: {
                color: '#E25950',

                '::placeholder': {
                    color: '#FFCCA5',
                },
            },
        };

        const options = {
            style: style
        };

        const stripe = Stripe(STRIPE_KEY);

        const elements = stripe.elements({ clientSecret: clientSecret });

        // card number
        const cardNumberElement = elements.create('cardNumber', options);
        cardNumberElement.mount('#card-number');

        // card expiry
        const cardExpiryElement = elements.create('cardExpiry', options);
        cardExpiryElement.mount('#card-expiry');

        // card cvc
        const cardCvcElement = elements.create('cardCvc', options);
        cardCvcElement.mount('#card-cvc');

        cardNumberElement.addEventListener('change', function(event) {
            const displayError = document.getElementById('card-number-error');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        const cardHolderName = document.getElementById('card-name');
        const subscribeBtn = document.getElementById("btn_subscribe");

        subscribeBtn.addEventListener('click', async (e) => {
            console.log("attempting");
            
            const country = document.getElementById('card-country').value;
            const postal_code = document.getElementById('card-zip').value;
            console.log("CardNumberElement: ", cardNumberElement);
            console.log("User Email: ", '{{ Auth::user()->email}}');
            e.preventDefault();
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, 
                {
                    payment_method: {
                        card: cardNumberElement,
                        billing_details: { 
                            name: cardHolderName.value,
                            email: '{{ Auth::user()->email }}'
                        }
                    }
                }
            );

            console.log(setupIntent);
            console.log(error);
            if (error) {
                const errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
            } else {
                console.log(setupIntent.payment_method);
                paymentMethodHandler(setupIntent.payment_method);
            }
        });

        function paymentMethodHandler(payment_method) {
            const form = document.getElementById('subscribe-form'); 
            const hiddenInput = document.createElemenet('input');

            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', payment_method);
            
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>
</x-app-layout>