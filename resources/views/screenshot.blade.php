<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<div class="relative flex flex-col h-screen text-white" style="background: linear-gradient(146.67deg, #DC735C 1.12%, #A941D9 122.75%), linear-gradient(146.67deg, #7A5CDC 1.12%, #AF55D8 122.75%);">
    <div class="relative flex flex-col items-center gap-2 pb-10">
        {{-- overlay --}}
        <div class="absolute w-full h-full bg-white/10">
        </div>

        <div class="flex justify-end">
            <img class="w-12 h-12 mx-auto mt-20" src={{ asset("images/mm-logo1.png") }} alt="">
        </div>

        <div class="flex items-center justify-between gap-10">
            {{-- title --}}
            <div class="flex flex-col font-bold">
                <span class="text-lg">Thank You</span>
                <span class="text-4xl">{{ $inspiration->sharedbyUser->first_name }} for</span>
                <span class="text-4xl">motivating me with:</span>
            </div>

            <div class="flex">
                <img class="w-24 rounded-full" src="{{ $inspiration->sharedbyUser->profile_photo_path }}" />
                <img class="z-10 w-24 -ml-5 rounded-full ring-4 ring-[#DC735C]" src="{{ Auth::user()->profile_photo_path }}" />
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center px-20 py-10">
        <div class="flex flex-col justify-center gap-3 text-center">
            <h1 class="text-5xl font-bold">“{{ $inspiration->quote->quote }}”</h1>
            <span class="text-2xl font-light">- {{ $inspiration->quote->author }} -</span>
        </div>

        <div class="flex items-end gap-10">
            <img class="w-[240px] -rotate-[20deg] rounded-xl" src="{{ $inspiration->track->album_img }}" />

            <div class="flex flex-col p-10 rounded-3xl bg-white/10">
                <span class="text-2xl font-light">And they thought you might enjoy listening to: </span>
                <span class="text-4xl font-bold">{{ $inspiration->track->name }} ({{ $inspiration->track->artist }})</span>
            </div>
        </div>
    </div>

    <div class="absolute bottom-0 flex items-center justify-center w-full h-16 items bg-black/10">
        Shared using MotiveMob.com
    </div>
</div>