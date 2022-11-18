<x-app-layout>
    <div class="grid grid-cols-2 gap-8 p-8 mt-4">
        <div>
            <div class="flex justify-between mb-4">
                <div class="flex space-x-4">
                    <img src="images/quotes.svg" alt="">
                    <div>
                        <p class="text-2xl font-semibold">Quotes</p>
                        <p>Received</p>
                    </div>
                </div>
                <div>
                    <p class="font-semibold text-4xl text-transparent bg-clip-text bg-gradient-to-br from-pink-300 to-red-600">3</p>
                </div>
            </div>
            
            <x-button.red class="w-full">Request More</x-button.red>
        </div>
        <div>
            <div class="flex justify-between mb-4">
                <div class="flex space-x-4">
                    <img src="images/songs.svg" alt="">
                    <div>
                        <p>Recommended</p>
                        <p class="text-2xl font-semibold">Songs</p>
                    </div>
                </div>
                <div>
                    <p class="font-semibold text-4xl text-transparent bg-clip-text bg-gradient-to-br from-pink-300 to-red-600">3</p>
                </div>
            </div>

            <x-button.red class="w-full">Request More</x-button.red>
            
            <p class="text-xs text-stone-300 mt-4"><strong>Note:</strong> Average user has 85 quotes and 107 songs submitted</p>
        </div>
    </div>
</x-app-layout>
