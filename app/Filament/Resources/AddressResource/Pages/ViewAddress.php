<?php

namespace App\Filament\Resources\AddressResource\Pages;

use App\Filament\Resources\AddressResource;
use App\Models\Address;
use Filament\Actions;
use Filament\Infolists\Infolist;
use Filament\Infolists;
use Filament\Resources\Pages\ViewRecord;

class ViewAddress extends ViewRecord
{
    protected static string $resource = AddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()->label('Edit Address')->icon('heroicon-o-pencil-square'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make([
                    Infolists\Components\TextEntry::make('user.name')
                        ->label('User')
                        ->url(function (Address $record) {
                            return route('filament.admin.resources.users.view', ['record' => $record->user]);
                        }),
                    Infolists\Components\TextEntry::make('label')
                        ->label('Label'),
                    Infolists\Components\TextEntry::make('recipient_name')
                        ->label('Recipient Name'),
                    Infolists\Components\TextEntry::make('recipient_phone_number')
                        ->label('Recipient Phone Number'),
                    Infolists\Components\TextEntry::make('province.province')
                        ->label('Province'),
                    Infolists\Components\TextEntry::make('city.city_name')
                        ->label('City'),
                    Infolists\Components\TextEntry::make('district_name')
                        ->label('Disctrict'),
                    Infolists\Components\TextEntry::make('postal_code')
                        ->label('Postal Code'),
                    Infolists\Components\TextEntry::make('street_name')
                        ->label('Street Name')
                        ->columnSpanFull(),
                ])->columns(2),

            ]);
    }
}
