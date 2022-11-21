<x-app-layout>
    <div class="row-start-2 row-end-9">
        <div id="step2" class=" bg-white">
            <div class="w-[72rem] p-8 h-screen" style="box-shadow: 0px 7.93548px 51.0996px rgba(230, 234, 238, 0.6);">
                <p class="font-semibold text-2xl mb-8">Update Preferences</p>

                <p class="text-xs">Motivation SMS Frequency:</p>

                <x-jet-input id="link" class="block mt-1 w-full border-green-500 focus-within:border-green-600" type="text" name="link" :value="old('link')" required autofocus />

                <p class="text-xs mt-4">you can receive from any friends, family, teammates, colleaguesm anyone! Here are the steps how. Once you`ve completed, check it off your “to do” list!
            </div>
        </div>
    </div>
</x-app-layout>
