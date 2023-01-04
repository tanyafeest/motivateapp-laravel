<x-app-layout>
    <div class="flex flex-col h-full px-8" style="background: linear-gradient(146.67deg, #805CDC 1.12%, #A941D9 122.75%);">
        @livewire('header-profile')
        
        <div class="w-full px-8 py-4 rounded-lg" style="background: rgba(0, 0, 0, 0.32); box-shadow: 0px 1px 24px rgba(0, 0, 0, 0.13); backdrop-filter: blur(17.5px);">
            <table class="w-full table-auto text-white">
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
</x-app-layout>
