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
            'All' => Tab::make(),
            'Admin' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHasRole('admin')),
            'Marketing' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHasRole('marketing')),
            'Consument' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHasRole('consument')),
        ];
    }
}
