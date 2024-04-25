<?php

namespace App\Filament\Resources\ProductCategoryResource\Pages;

use App\Filament\Resources\ProductCategoryResource;
use App\Models\ProductCategory;
use Filament\Actions;
use Filament\Infolists\Infolist;
use Filament\Infolists;
use Filament\Resources\Pages\ViewRecord;

class ViewProductCategory extends ViewRecord
{
    protected static string $resource = ProductCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()->label('Edit Category')->icon('heroicon-o-pencil-square'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make([
                    Infolists\Components\TextEntry::make('name'),
                    Infolists\Components\TextEntry::make('parent.name')
                        ->url(function (ProductCategory $record) {
                            if (!$record->parent) {
                                return null;
                            }
                            return route('filament.admin.resources.product-categories.view', ['record' => $record->parent]);
                        })
                        ->label('Parent Category')
                        ->placeholder('No parent'),
                    Infolists\Components\TextEntry::make('description')
                        ->placeholder('No description')
                        ->columnSpanFull(),
                ])->columns(2),

            ]);
    }
}
