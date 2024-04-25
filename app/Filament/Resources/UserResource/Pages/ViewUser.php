<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Infolists\Components\MultipleBadgesEntry;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Infolist;
use Illuminate\Support\Facades\Log;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()->label('Edit User')->icon('heroicon-o-pencil-square'),
            Actions\ActionGroup::make([
                Actions\Action::make('adjustRoles')
                    ->label('Adjust Roles')
                    ->modalHeading('Select Roles')
                    ->modalDescription('A single user can have more than one role')
                    ->fillForm(fn (User $record): array => [
                        'roles' => $record->roles->map(
                            fn (Role $role): string => $role->name
                        ),
                    ])
                    ->form([
                        Components\Select::make('roles')
                            ->label('Roles')
                            ->options(function (User $record) {
                                return Role::query()->pluck('display_name', 'name');
                            })
                            ->multiple()
                            ->native(false)
                            ->required(),
                    ])
                    ->action(function (array $data, User $record): void {
                        $record->syncRoles($data['roles']);
                    }),
                Actions\Action::make('adjustPermissions')
                    ->label('Adjust Permissions')
                    ->modalHeading('Select Permissions')
                    ->modalDescription('A single user can have more than one permissions')
                    ->fillForm(fn (User $record): array => [
                        'permissions' => $record->permissions->map(
                            fn (Permission $permission): string => $permission->name
                        ),
                    ])
                    ->form([
                        Components\Select::make('permissions')
                            ->label('Permissions')
                            ->options(function (User $record) {
                                return Permission::query()->pluck('display_name', 'name');
                            })
                            ->multiple()
                            ->native(false)
                            ->required(),
                    ])
                    ->action(function (array $data, User $record): void {
                        $record->syncPermissions($data['permissions']);
                    })
            ])
                ->label('Settings')
                ->icon('heroicon-o-cog')
                ->color('primary')
                ->button(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make([
                    SpatieMediaLibraryImageEntry::make('avatar')
                        ->collection('avatars')
                        ->placeholder('No avatar')
                        ->circular()
                        ->columnSpanFull(),
                    Infolists\Components\TextEntry::make('name')->columnSpanFull(),
                    MultipleBadgesEntry::make('roles')
                        ->label('Roles')
                        ->state(function (User $record) {
                            if ($record->roles->count() == 0) {
                                return [];
                            }
                            return $record->roles->map(
                                fn ($role) => $role->name
                            );
                        }),
                    MultipleBadgesEntry::make('permissions')
                        ->label('Permissions')
                        ->state(function (User $record) {
                            if ($record->permissions->count() == 0) {
                                return [];
                            }
                            return $record->permissions->map(
                                fn ($permission) => $permission->name
                            );
                        }),
                    Infolists\Components\TextEntry::make('email'),
                    Infolists\Components\IconEntry::make('is_email_verified')
                        ->label('Email Verified')
                        ->boolean()
                        ->trueIcon('heroicon-o-check-badge')
                        ->falseIcon('heroicon-o-x-mark'),
                    Infolists\Components\TextEntry::make('phone_number')
                        ->label('Phone Number')
                        ->state(function (User $user): string | null {
                            if (!$user->phone_number) {
                                return null;
                            }
                            return "(+$user->phone_dial_code) $user->phone_number";
                        }),
                    Infolists\Components\IconEntry::make('is_phone_verified')
                        ->label('Phone Verified')
                        ->boolean()
                        ->trueIcon('heroicon-o-check-badge')
                        ->falseIcon('heroicon-o-x-mark'),
                    Infolists\Components\TextEntry::make('created_at')->dateTime(),
                    Infolists\Components\TextEntry::make('updated_at')->dateTime(),
                ])->columns(2),
            ]);
    }
}
