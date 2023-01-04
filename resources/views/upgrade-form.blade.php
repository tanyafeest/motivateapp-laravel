<x-app-layout>
    <div class="flex flex-col">
        <div class="bg-sky-50">
            @livewire('header-profile')
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="" class="">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div class="space-y-4">
                        <div>
                            <x-jet-label for="card" value="{{ __('Card information') }}" />
                            <x-jet-input id="card" class="block w-full" type="text" name="card" :value="old('card')" required autofocus autocomplete="card" inputmode="numeric" pattern="[0-9\s]{13,19}" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" />
                        </div>
                        <div class="grid grid-cols-3">
                            <div class="col-span-1">
                                <x-jet-label class="invisible" for="expiry" value="{{ __('expiry') }}" />
                                <x-jet-input id="expiry" class="block" type="text" name="expiry" :value="old('expiry')" required autofocus autocomplete="expiry" />
                            </div>
                            <div class="col-span-1 col-start-3">
                                <x-jet-label class="invisible" for="card" value="{{ __('cvc') }}" />
                                <x-jet-input id="cvc" class="block" type="text" name="cvc" :value="old('cvc')" required autofocus autocomplete="cvc" />
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div>
                        <x-jet-label for="name" value="{{ __('Name on card') }}" />
                        <x-jet-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="space-y-4">
                        <div>
                            <x-jet-label for="country" value="{{ __('Country or region') }}" />
                            <x-jet-input id="country" class="block w-full" type="text" name="country" :value="old('country')" required autofocus autocomplete="country" />
                        </div>
                        <div>
                            <x-jet-label for="zip" value="{{ __('Zip') }}" />
                            <x-jet-input id="zip" class="block w-full" type="text" name="zip" :value="old('zip')" required autofocus autocomplete="zip" />
                        </div>
                    </div>
                </div>
                

                
                
                
            
                
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button.red filled class="">
                    {{ __('Subscribe') }}
                </x-button.red>
            </div>
        </form>
    </div>
</x-app-layout>
