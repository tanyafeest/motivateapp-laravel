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

        {{-- upgarde plan --}}
        <div class="flex w-full p-5 rounded-lg bg-gray-200/50">
            <table class="w-full">
                <thead>
                    <tr class="text-xl">
                        <td class="py-5">Upgrade Plan</td>
                        <td class="text-center">Current Plan Basic</td>
                        <td class="text-center">Upgrade Full Access</td>
                    </tr>
                </thead>

                <tbody>
                    <tr class="text-base">
                        <td class="py-3">Unlimited Quotes</td>
                        <td class="text-center">Yes</td>
                        <td class="text-center">Yes</td>
                    </tr>

                    <tr class="text-base">
                        <td class="py-3">Unlimited Songs</td>
                        <td class="text-center">Yes</td>
                        <td class="text-center">Yes</td>
                    </tr>

                    <tr class="text-base">
                        <td class="py-3">Secure Account</td>
                        <td class="text-center">Yes</td>
                        <td class="text-center">Yes</td>
                    </tr>

                    <tr class="text-base">
                        <td class="py-3">Set Your Schedule</td>
                        <td class="text-center">No</td>
                        <td class="text-center">Yes</td>
                    </tr>

                    <tr class="text-base">
                        <td class="py-3">Spotify Playlist</td>
                        <td class="text-center">No</td>
                        <td class="text-center">Yes</td>
                    </tr>

                    <tr class="text-base">
                        <td class="py-3">Default Quote & Song Saver</td>
                        <td class="text-center">No</td>
                        <td class="text-center">Yes</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- actions --}}
        <div class="flex flex-col items-center justify-center w-full mt-10">
            <a type="button" href="{{ route('payment') }}" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Upgrade to Get Full Access</a>
            <span>20$ per Annual</span>
        </div>
    </div>
</div>
