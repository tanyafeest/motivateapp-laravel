<div class="h-full px-4 lg:px-8" style="background: linear-gradient(146.67deg, #805CDC 1.12%, #A941D9 122.75%);">
    @livewire('header-profile', ['text' => 'white'])
        <div id="step1" class="flex flex-col h-screen p-8" style="background: linear-gradient(146.67deg, #805CDC 1.12%, #A941D9 122.75%);">
            <div class="w-full mt-12 px-8 py-4 rounded-lg" style="background: rgba(0, 0, 0, 0.32); box-shadow: 0px 1px 24px rgba(0, 0, 0, 0.13); backdrop-filter: blur(17.5px);">
                <table class="w-full table-auto text-center text-white divide-y divide-purple-400">
                    <thead class="text-sm">
                        <tr class="">
                            <th class="text-2xl font-semibold text-center border-r border-purple-400">Upgrade Plan</th>
                            <th class="font-normal border-r border-purple-400">Current Plan<br /><span class="font-bold">Basic</span></th>
                            <th class="font-normal border-purple-400">Upgrade<br /><span class="font-bold">Full Access</span></th>
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

            @if ($isSubscribed)
                @if ($isCanceled)
                    <div class="flex justify-center w-full">
                        <x-button.white class="max-w-[300px] mt-12" wire:click="resume">
                            Upgrade again?
                        </x-button.white>
                    </div>
                    <p class="text-center">
                        Your subscription has been cancelled, but You will be on grade period until <span class="font-bold">{{ Auth::user()->getCurrentPeriodEnd() }}</span>.
                    </p>
                @else
                    <div class="flex justify-center w-full">
                        <x-button.white class="max-w-[300px] mt-12" wire:click="cancel">
                            Cancel Subscription
                        </x-button.white>
                    </div>
                    <p class="text-center">
                        Your subscription will renew on <span class="font-bold">{{ Auth::user()->getCurrentPeriodEnd() }}</span> (12 months after last payment).
                    </p>
                @endif
            @else
                <div class="flex justify-center w-full">
                    <x-button.white class="max-w-[300px] mt-12">
                        <a href="{{ route('payment') }}">Upgrade to Get Full Access</a>
                    </x-button.white>
                </div>
                <p class="text-center"><span class="font-bold">${{ config('services.stripe.subscription_price') }} </span> Annual Pass</p>
            @endif
        </div>
</div>
