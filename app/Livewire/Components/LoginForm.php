<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms\Components;
use Filament\Forms\Get;
use Illuminate\Support\Collection;

class LoginForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Components\TextInput::make('email')
                    ->placeholder('Your Email')
                    ->hiddenLabel()
                    ->required()
                    ->email(),
                Components\TextInput::make('password')
                    ->placeholder('Password')
                    ->hiddenLabel()
                    ->required()
                    ->password()
                    ->revealable(),

            ])
            ->statePath('data');
    }

    public function handleLogin(): void
    {
    }

    public function render()
    {
        return view('livewire.components.login-form');
    }
}
