<x-app-layout>
    <div class="text-white row-span-11">
        <div id="step1" class="flex flex-col items-center justify-center hidden h-full p-8 " style="background: linear-gradient(146.67deg, #805CDC 1.12%, #A941D9 122.75%);">
            <div class="w-full px-8 py-4 rounded-lg" style="background: rgba(0, 0, 0, 0.32); box-shadow: 0px 1px 24px rgba(0, 0, 0, 0.13); backdrop-filter: blur(17.5px);">
                <table class="w-full table-auto">
                    <thead class="text-sm">
                        <tr>
                            <th class="text-2xl font-semibold text-left border-r border-purple-400">Upgrade Plan</th>
                            <th class="font-normal border-r border-purple-400">Current Plan<br /><span class="font-bold">Basic</span></th>
                            <th class="font-normal">Upgrade<br /><span class="font-bold">Full Access</span></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-400">
                        <tr class="">
                            <td class="border-r border-purple-400">Unlimited Quotes</td>
                            <td class="px-3 py-4 border-r border-purple-400"><img class="mx-auto" src="images/tick.png" alt=""></td>
                            <td class="px-3 py-4"><img class="mx-auto" src="images/tick.png" alt=""></td>
                        </tr>
                        <tr>
                            <td class="border-r border-purple-400">Unlimited Songs</td>
                            <td class="px-3 py-4 border-r border-purple-400"><img class="mx-auto" src="images/tick.png" alt=""></td>
                            <td class="px-3 py-4"><img class="mx-auto" src="images/tick.png" alt=""></td>
                        </tr>
                        <tr>
                            <td class="border-r border-purple-400">Secure Account</td>
                            <td class="px-3 py-4 border-r border-purple-400"><img class="mx-auto" src="images/tick.png" alt=""></td>
                            <td class="px-3 py-4"><img class="mx-auto" src="images/tick.png" alt=""></td>
                        </tr>
                        <tr>
                            <td class="border-r border-purple-400">Set Your Schedule</td>
                            <td class="px-3 py-4 border-r border-purple-400"></td>
                            <td class="px-3 py-4"><img class="mx-auto" src="images/tick.png" alt=""></td>
                        </tr>
                        <tr>
                            <td class="border-r border-purple-400">Spotify Playlist</td>
                            <td class="px-3 py-4 border-r border-purple-400"></td>
                            <td class="px-3 py-4"><img class="mx-auto" src="images/tick.png" alt=""></td>
                        </tr>
                        <tr>
                            <td class="border-r border-purple-400">Default Quote &amp; Song Saver</td>
                            <td class="px-3 py-4 border-r border-purple-400"></td>
                            <td class="px-3 py-4"><img class="mx-auto" src="images/tick.png" alt=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <x-button.white class="max-w-[300px] mt-12">Upgrade to Get Full Access</x-button.white>
            <p class="text-center"><span class="font-bold">20$</span> Annual Pass</p>
        </div>

        <div id="step2" class="flex flex-col justify-center h-full p-8">
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
    </div>
</x-app-layout>
