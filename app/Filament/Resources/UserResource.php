<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\DialCode;
use App\Models\Role;
use App\Models\User;
use App\Tables\Columns\MultipleBadgesColumn;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Account System';
    // protected static ?string $modelLabel = 'All Users';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                SpatieMediaLibraryFileUpload::make('avatar')
                    ->collection('avatars')
                    ->conversion('small')
                    ->required()
                    ->image()
                    ->avatar()
                    ->imageEditor()
                    ->circleCropper()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at')
                    ->label('Email Verified')
                    ->native(false),
                Forms\Components\Select::make('phone_dial_code')
                    ->relationship(name: 'dialCode', titleAttribute: 'name')
                    ->getOptionLabelFromRecordUsing(fn (DialCode $record) => "(+{$record->id}) {$record->name}")
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->maxLength(12),
                Forms\Components\DateTimePicker::make('phone_number_verified_at')
                    ->label('Phone Number Verified')
                    ->native(false),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->revealable()
                    ->hiddenOn('edit')
                    ->maxLength(255)
                    ->columnSpanFull(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('avatar')
                    ->collection('avatars')
                    ->conversion('small')
                    ->circular()
                    ->placeholder('No avatar'),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_email_verified')
                    ->label('Email Verified')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label('Phone Number')
                    ->searchable()
                    ->state(function (User $user): string | null {
                        if (!$user->phone_number) {
                            return null;
                        }
                        return "(+$user->phone_dial_code) $user->phone_number";
                    }),
                Tables\Columns\IconColumn::make('is_phone_verified')
                    ->label('Phone Verified')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
