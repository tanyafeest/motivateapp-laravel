<div class="flex flex-col h-screen row-start-2 gap-10 text-white row-end-9">
    <div class="flex flex-col gap-8 p-14">
        <textarea></textarea>
        <x-button.red class="w-full">Submit</x-button.red>
    </div>

    <div class="flex flex-col gap-4 p-10 text-black">
        <div class="flex flex-col">
            <p class="text-2xl font-bold">Prefer to pick out a quote for them instead?</p>
            <p>Write your own above or use one of the recommended quotes below:</p>
        </div>

        <div class="grid grid-cols-2 gap-10">
            <div class="flex flex-col">
                <div class="p-3 bg-white">
                    <p class="text-lg font-semibold truncate whitespace-nowrap">{{ $randomConfidenceQuote === null ? "There is no confidence quote" : $randomConfidenceQuote->quote }}</p>
                    <p class="text-sm text-gray-500 text-end">-  {{ $randomConfidenceQuote === null ? "None" : $randomConfidenceQuote->author }}</p>
                </div>
                <x-button.red class="w-full">Select Confidence Quote</x-button.red>
            </div>

            <div class="flex flex-col">
                <div class="p-3 bg-white">
                    <p class="text-lg font-semibold truncate whitespace-nowrap">{{ $randomPotentialQuote === null ? "There is no confidence quote" : $randomPotentialQuote->quote }}</p>
                    <p class="text-sm text-gray-500 text-end">-  {{ $randomPotentialQuote === null ? "None" : $randomPotentialQuote->author }}</p>
                </div>
                <x-button.red class="w-full">Select Potential Quote</x-button.red>
            </div>

            <div class="flex flex-col">
                <div class="p-3 bg-white">
                    <p class="text-lg font-semibold truncate whitespace-nowrap">{{ $randomDeterminationQuote === null ? "There is no confidence quote" : $randomDeterminationQuote->quote }}</p>
                    <p class="text-sm text-gray-500 text-end">-  {{ $randomDeterminationQuote === null ? "None" : $randomDeterminationQuote->author }}</p>
                </div>
                <x-button.red class="w-full">Select Determination Quote</x-button.red>
            </div>

            <div class="flex flex-col">
                <div class="p-3 bg-white">
                    <p class="text-lg font-semibold truncate whitespace-nowrap">{{ $randomResilienceQuote === null ? "There is no confidence quote" : $randomResilienceQuote->quote }}</p>
                    <p class="text-sm text-gray-500 text-end">-  {{ $randomResilienceQuote === null ? "None" : $randomResilienceQuote->author }}</p>
                </div>
                <x-button.red class="w-full">Select Resilience Quote</x-button.red>
            </div>
        </div>
    </div>
</div>