<?php

namespace App\Livewire\Components;

use App\Models\ProductCategory;
use Illuminate\Support\Collection;
use Livewire\Component;

class Header extends Component
{
    public Collection $categories;
    public Collection $subCategories;

    public function render()
    {
        $this->categories = ProductCategory::all();

        return view('livewire.components.header');
    }
}
