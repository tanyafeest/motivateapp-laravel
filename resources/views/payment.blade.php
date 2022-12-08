<x-app-layout>
    <div id="step2" class="flex flex-col justify-center h-screen p-8">
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="" class="">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-20">
                    <div class="">
                        <x-jet-label for="card-email" value="{{ __('Email') }}" />
                        <x-jet-input id="card-email" class="block w-full" type="email" name="card-email" value="{{ Auth::user()->email }}" readonly required />
                    </div>

                    <div class="space-y-4">
                        <div id="card-element"></div>
                        <div id="card-errors" role="alert"></div>
                    </div>
                </div>

                <div class="space-y-20">
                    <div class="relative">
                        <x-jet-label for="card-name" value="{{ __('Name on card') }}" />
                        <x-jet-input id="card-name" class="block w-full" type="text" name="card-name" value="{{ Auth::user()->name }}" readonly required />
                    </div>

                    <div class="space-y-4">
                        <div>
                            <x-jet-label for="card-country" value="{{ __('Country or region') }}" />
                            <select class="w-full h-10 border-none rounded-md shadow-sm focus:ring-0" id="card-country" name="card-country">
                                @foreach ($countries as $country)
                                    <option>{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-jet-label for="card-zip" value="{{ __('Zip') }}" />
                            <x-jet-input id="card-zip" class="block w-full" type="text" name="card-zip" :value="old('card-zip')" required autofocus autocomplete="card-zip" />
                        </div>
                        <div id="card-element"></div>
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

    <script>
        const clientSecret = '{{ $intent->client_secret }}';
        const STRIPE_KEY = '{{ env('STRIPE_KEY') }}';

        const style = {
            base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
                '::placeholder': {
                color: '#aab7c4'
            }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        const options = {
            hidePostalCode: false,
            style: style
        };

        const stripe = Stripe(STRIPE_KEY);

        const elements = stripe.elements({ clientSecret: clientSecret });

        const cardElement = elements.create('card', options);
        const addressElement = elements.create('address', { mode: 'billing' });

        cardElement.mount('#card-element');
        // addressElement.mount('#address-element');

        cardElement.addEventListener('change', function(event) {
            const displayError = document.getElementById('card-errors');
            
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        const cardHolderName = document.getElementById('name');
        const subscribeBtn = document.getElementById("btn_subscribe");

        subscribeBtn.addEventListener('click', async (e) => {
            console.log("attempting");
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, 
                {
                    payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );
            
            if (error) {
                const errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
            } else {
                paymentMethodHandler(setupIntent.payment_method);
            }
        });

        function paymentMethodHandler(payment_method) {
            const form = document.getElementById('subscribe-form'); 
            const hiddenInput = document.createElement('input');

            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', payment_method);
            
            form.appendChild(hiddenInput);
            form.submit();
        }
    </script>
</x-app-layout>