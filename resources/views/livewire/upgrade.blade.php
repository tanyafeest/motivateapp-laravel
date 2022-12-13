<div class="row-start-2 text-white row-end-9">
    <div id="step1" class="flex flex-col justify-center h-screen p-8" style="background: linear-gradient(146.67deg, #805CDC 1.12%, #A941D9 122.75%);">
        <div class="p-4 rounded-lg" style="background: rgba(0, 0, 0, 0.32); box-shadow: 0px 1px 24px rgba(0, 0, 0, 0.13); backdrop-filter: blur(17.5px);">
            <table class="w-full table-auto">
                <thead class="text-sm">
                    <tr>
                        <th class="text-2xl font-semibold text-left">Upgrade Plan</th>
                        <th class="font-normal">Current Plan<br /><span class="font-bold">Basic</span></th>
                        <th class="font-normal">Upgrade<br /><span class="font-bold">Full Access</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td>Unlimited Quotes</td>
                        <td class=""><img class="mx-auto" src="images/tick.png" alt=""></td>
                        <td class=""><img class="mx-auto" src="images/tick.png" alt=""></td>
                    </tr>
                    <tr>
                        <td>Unlimited Songs</td>
                        <td class=""><img class="mx-auto" src="images/tick.png" alt=""></td>
                        <td class=""><img class="mx-auto" src="images/tick.png" alt=""></td>
                    </tr>
                    <tr>
                        <td>Secure Account</td>
                        <td class=""><img class="mx-auto" src="images/tick.png" alt=""></td>
                        <td class=""><img class="mx-auto" src="images/tick.png" alt=""></td>
                    </tr>
                    <tr>
                        <td>Set Your Schedule</td>
                        <td class=""></td>
                        <td class=""><img class="mx-auto" src="images/tick.png" alt=""></td>
                    </tr>
                    <tr>
                        <td>Spotify Playlist</td>
                        <td class=""></td>
                        <td class=""><img class="mx-auto" src="images/tick.png" alt=""></td>
                    </tr>
                    <tr>
                        <td>Default Quote &amp; Song Saver</td>
                        <td class=""></td>
                        <td class=""><img class="mx-auto" src="images/tick.png" alt=""></td>
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
            <p class="text-center"><span class="font-bold">20$</span> Annual Pass</p>
        @endif
    </div>
</div>