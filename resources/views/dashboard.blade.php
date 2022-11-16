<x-app-layout>
    <div class="grid grid-cols-2 gap-8 p-8">
        <div>
            <div class="flex justify-between">
                <div class="flex space-x-4">
                    <img src="images/quotes.svg" alt="">
                    <p>Quotes</p>
                    <p>Received</p>
                </div>
                <div>
                    <p>3</p>
                </div>
            </div>
            
            <x-button>Request More</x-button>
        </div>
        <div>
            <div class="flex justify-between">
                <div class="flex space-x-4">
                    <img src="images/songs.svg" alt="">
                    <p>Recommended</p>
                    <p>Songs</p>
                </div>
                <div>
                    <p>5</p>
                </div>
            </div>
            
            <x-button>Request More</x-button>

            <p>Note: Average user has 85 quotes and 107 songs submitted</p>
        </div>
    </div>
</x-app-layout>
