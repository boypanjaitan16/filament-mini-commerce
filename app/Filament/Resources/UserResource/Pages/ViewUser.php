<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()->label('Edit User')->icon('heroicon-o-pencil-square'),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('name')->columnSpanFull(),
                Infolists\Components\TextEntry::make('email'),
                Infolists\Components\IconEntry::make('is_email_verified')
                    ->label('Email Verified')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                Infolists\Components\TextEntry::make('phone_number')
                    ->label('Phone Number')
                    ->state(function (User $user): string | null {
                        if(!$user->phone_number){
                            return null;
                        }
                        return "($user->phone_dial_code) $user->phone_number";
                    }),
                Infolists\Components\IconEntry::make('is_phone_verified')
                    ->label('Phone Verified')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                Infolists\Components\TextEntry::make('created_at')->dateTime(),
                Infolists\Components\TextEntry::make('updated_at')->dateTime(),
            ])->columns(2);
    }
}
