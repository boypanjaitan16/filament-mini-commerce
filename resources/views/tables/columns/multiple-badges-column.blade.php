<div class="flex flex-col space-y-1 min-w-[150px]">
  @foreach ($getState() as $item)
    <x-filament::badge>
      {{$item}}
    </x-filament::badge>
  @endforeach
</div>