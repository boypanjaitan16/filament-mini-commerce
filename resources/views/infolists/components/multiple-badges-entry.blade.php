<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div class="flex flex-row gap-1">
    @if (!$getState())
        <span class="text-sm text-gray-600">No data</span>
    @else
        @foreach ($getState() ?? [] as $item)
            <x-filament::badge>
            {{$item}}
            </x-filament::badge>
        @endforeach
    @endif
        
    </div>
</x-dynamic-component>
