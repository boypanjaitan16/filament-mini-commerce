<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('New User')->icon('heroicon-o-user-plus'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'active' => Tab::make()->label('Verified')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereNotNull('email_verified_at')),
            'inactive' => Tab::make()->label('Not Verified')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereNull('email_verified_at')),
        ];
    }
}
