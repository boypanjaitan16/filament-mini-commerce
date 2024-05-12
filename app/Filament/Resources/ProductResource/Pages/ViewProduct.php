<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Infolists\Infolist;
use Filament\Infolists;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Log;

class ViewProduct extends ViewRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()->label('Edit Product')->icon('heroicon-o-pencil-square'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Detail')
                    ->collapsible()
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('banner')
                            ->collection('banners')
                            ->placeholder('No banner')
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('productCategory.name')
                            ->url(function (Product $record) {
                                return route('filament.admin.resources.product-categories.view', ['record' => $record->productCategory]);
                            })
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('name'),
                        Infolists\Components\TextEntry::make('price')->money('IDR'),
                        Infolists\Components\KeyValueEntry::make('specification')
                            ->state(function (Product $product) {
                                if (!$product->specification) {
                                    return [
                                        '' => ''
                                    ];
                                }
                                return $product->specification;
                            })
                            ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('description')
                            ->html()
                            ->placeholder('No description')
                            ->columnSpanFull(),
                    ])->columns(2),

            ]);
    }
}
