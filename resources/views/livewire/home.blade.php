<main class="relative">
    <livewire:components.header />
    <section class="mt-20 lg:mt-[90px] md:px-32">
        <div class="py-5 bg-gray-100 md:-mx-32 md:px-32">
            <div class="w-full h-[30vh] rounded bg-gray-200">
            </div>
        </div>
        <div class="py-10">
            <h2 class="text-xl font-bold">Promo Best Deals</h2>
            <div class="grid grid-cols-2 gap-5 mt-5 md:grid-cols-4 lg:grid-cols-7">
            @foreach ($bestDealsProducts as $product)
                <div class="rounded">
                    <img class="rounded-md" src="{{$product->getFirstMediaUrl('banners', 'small')}}" alt="{{$product->name}}" />
                    <h4 class="text-base">{{$product->name}}</h4>
                    <span class="font-semibold">Rp {{$product->price}}</span>
                </div>
            @endforeach
            </div>
        </div>
        <div class="py-10">
            <h2 class="text-xl font-bold">For You</h2>
            <div class="grid grid-cols-2 gap-5 mt-5 md:grid-cols-4 lg:grid-cols-7">
            @for ($i=0; $i<14; $i++)
                <div class="bg-gray-200 rounded h-[40vh]">
                </div>
            @endfor
            </div>
        </div>
    </section>
</main>
