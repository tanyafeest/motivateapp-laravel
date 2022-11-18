<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Upgrade') }}
        </h2>
    </x-slot>
    
    {{-- payment --}}
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- top header --}}
            <div class="flex items-center justify-between">
                {{-- hamburger button --}}
                <button type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"><-</button>
            
                {{-- title & name --}}
                <div class="flex flex-col text-center">
                    <span>Account information</span>
                    <span class="font-bold">{{ Auth::user()->name }}</span>
                </div>
    
                {{-- avatar --}}
                <img src="/img/avatar.svg" alt="{{ Auth::user()->name }}" width="48" height="48" class="w-12 h-12" />
            </div>

            {{-- payment view --}}
            <div class="flex flex-col w-full gap-10 p-5">
                <form action="{{ route('payment.subscription') }}" method="POST" id="subscribe-form">
                    @csrf
                    <div class="grid w-full grid-cols-2 gap-5">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="jhondoe@gmail.com" required>
                        </div>
    
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name on Card</label>
                            <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" required>
                        </div>
    
                        <div class="flex flex-col gap-1">
                            <div id="card-element"></div>
                            <div id="card-errors" role="alert"></div>
                        </div>
    
                        <div id="address-element"></div>
                    </div>
                </form>

                <button id="btn_subscribe" data-secret="{{ $intent->client_secret }}" type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 text-center">Subscribe</button>
            </div>
        </div>
    </div>
</x-app-layout>

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
    addressElement.mount('#address-element');

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