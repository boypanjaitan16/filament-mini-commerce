<div class="{{ $containerClassName }} {{ $containerAdditionalClassName }}">
    <h2 class="text-xl font-semibold">Where we should deliver your order?</h2>
    <p>Add new address</p>
    <form class="mt-5" wire:submit="handleSaveAddress">
        {{ $this->form }}

        <x-filament::button size="lg" type="submit" class="w-full mt-5">
            Save Address
        </x-filament::button>
    </form>
</div>
