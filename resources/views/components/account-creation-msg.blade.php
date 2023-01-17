<div x-data="{ open: true }">
    <div x-show="open" class="rounded-lg text-white p-4 bg-red-500/40 m-8 space-y-2 lg:z-20 relative">
        <div class="absolute top-4 right-4">
            <button @click="open = ! open"><img class="w-[14px] h-[14px]" src="images/close.png" alt=""></button>
        </div>
        <h2 class="font-semibold text-xl mb-4">Congratulations!</h2>
        <p>You just created your program to begin getting motivated! We`ll shortly send you a confirmation text to receive your personalized motivation. </p>
        <p>To get started now, review your dashboard below and invite others to give a quote and song to help inspire! </p>
    </div>
</div>