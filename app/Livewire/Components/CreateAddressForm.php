<?php

namespace App\Livewire\Components;

use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use Filament\Forms\Components;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Illuminate\Support\Collection;

class CreateAddressForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public $containerClassName = 'w-full p-10 bg-white md:rounded';
    public $containerAdditionalClassName = "";

    public function handleSaveAddress(): void
    {
        dd($this->form->getState());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Components\TextInput::make('label')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Components\TextInput::make('recipient_name')
                    ->required()
                    ->maxLength(255),
                Components\TextInput::make('recipient_phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Components\Select::make('province_id')
                    ->label('Province')
                    ->relationship('province', 'province')
                    ->loadingMessage('Loading provinces...')
                    ->preload()
                    ->searchable()
                    ->native(false)
                    ->live(true)
                    ->required(),
                Components\Select::make('city_id')
                    ->label('City')
                    ->loadingMessage('Loading cities...')
                    ->native(false)
                    ->options(fn (Get $get): Collection => City::query()
                        ->where('province_id', $get('province_id'))
                        ->pluck('city_name', 'city_id'))
                    ->required(),
                Components\TextInput::make('district_name')
                    ->required()
                    ->maxLength(255),
                Components\TextInput::make('postal_code')
                    ->required()
                    ->numeric()
                    ->maxLength(5),
                Components\Textarea::make('street_name')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),

            ])
            ->columns([
                'xs' => 2,
                'sm' => 2,
                'md' => 2
            ])
            ->statePath('data')
            ->model(Address::class);
    }

    public function render()
    {
        return view('livewire.components.create-address-form');
    }
}
