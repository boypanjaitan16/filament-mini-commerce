<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Welcome to MiniCommerce')]
class Home extends Component
{
    public string $message = "Message from Home";
    public Collection $bestDealsProducts;

    public function render()
    {
        $this->bestDealsProducts = Product::query()->orderBy('name', 'DESC')->limit(7)->get();

        return view('livewire.home');
    }
}
