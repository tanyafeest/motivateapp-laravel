<x-guest-layout>
    <div class="container h-screen max-w-2xl mx-auto">
        <div class="flex flex-col gap-5 pt-20">
            <span class="text-4xl font-bold text-center text-cyan-500">MotiveMob</span>

            @if ($userRequestedInspire)
            <div class="flex flex-col items-center justify-center text-center">
                <span class="text-2xl">Ready to inspire</span>
                <span class="">{{ $userRequestedInspire->name }}</span>

                <img src="/img/636e426c80302.svg" class="w-[90px] h-[90px] my-5" />

                <span>Authenticate your identify so <b>{{ $userRequestedInspire->name }}</b> knows it Came From You!</span>
            </div>
            @endif

            <a href="{{ route('oauth.google') }}" class="px-4 py-2 font-bold text-center text-white transition bg-red-500 rounded hover:bg-red-700">
                Create with Google
            </a>
            <a href="{{ route('oauth.facebook') }}" class="px-4 py-2 font-bold text-center text-white transition bg-blue-500 rounded hover:bg-blue-700">
                Create with Facebook
            </a>
            <a href="{{ route('oauth.instagram') }}" class="px-4 py-2 font-bold text-center text-white transition bg-orange-500 rounded hover:bg-orange-700">
                Create with Instagram
            </a>
            <a href="{{ route('oauth.twitter') }}" class="px-4 py-2 font-bold text-center text-white transition rounded bg-cyan-500 hover:bg-cyan-700">
                Create with Twitter
            </a>
            <a href="{{ route('oauth.apple') }}" class="px-4 py-2 font-bold text-center text-white transition rounded bg-lime-500 hover:bg-lime-700">
                Create with Apple
            </a>
        </div>
    </div>
</x-guest-layout>