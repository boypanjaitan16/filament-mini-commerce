<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div class="flex flex-row space-x-1">
        @foreach ($getState() ?? [] as $item)
            <x-filament::badge>
            {{$item}}
            </x-filament::badge>
        @endforeach
    </div>
</x-dynamic-component>
