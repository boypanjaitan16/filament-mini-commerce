<div class="w-full p-10 bg-white md:rounded">
    <div class="flex items-center justify-center">
        <span class="text-xl font-semibold">Login to {{ config('app.name') }}</span>
    </div>
    <form class="mt-10" wire:submit="handleLogin">
        {{ $this->form }}
        <p class="flex justify-end mt-3">
            <a href="" class="font-semibold">Forgot Password?</a>
        </p>
        <x-filament::button size="lg" type="submit" class="w-full mt-10">
            Login
        </x-filament::button>
    </form>
    <div class="flex items-center justify-center py-5">
        <span>Do not have account yet?</span> &nbsp; <a href="" class="font-semibold">Sign Up</a>
    </div>
</div>
