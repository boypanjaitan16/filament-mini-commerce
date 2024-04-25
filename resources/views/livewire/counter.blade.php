<div>
    <p>{{$title}}</p>
    <h1>{{ $count }}</h1>
 
    <button wire:click="increment" class="bg-red-400 px-3 py-1 rounded">+</button>
 
    <button wire:click="decrement" class="bg-yellow-400 px-3 py-1 rounded">-</button>
    <hr />
    <form>
        <label for="title">Title:</label>
    
        <input type="text" id="title" wire:model.live="title"> 
    </form>
    <hr />
    <p>Title character length: <span x-text="$wire.title.length"></span></p>
    <hr />
    <x-filament::badge>
        Bli Erik
    </x-filament::badge>
    <hr />
    <x-filament::breadcrumbs :breadcrumbs="[
        '/' => 'Home',
        '/dashboard' => 'Dashboard',
        '/dashboard/users' => 'Users',
        '/dashboard/users/create' => 'Create User',
    ]" />
    <hr />
    <x-filament::button>
        New user
    </x-filament::button>
    <hr />
    <x-filament::dropdown>
        <x-slot name="trigger">
            <x-filament::button>
                More actions
            </x-filament::button>
        </x-slot>
        
        <x-filament::dropdown.list>
            <x-filament::dropdown.list.item>
                View
            </x-filament::dropdown.list.item>
            
            <x-filament::dropdown.list.item>
                Edit
            </x-filament::dropdown.list.item>
            
            <x-filament::dropdown.list.item wire:click="openDeleteModal">
                Delete
            </x-filament::dropdown.list.item>
        </x-filament::dropdown.list>
    </x-filament::dropdown>
</div>
