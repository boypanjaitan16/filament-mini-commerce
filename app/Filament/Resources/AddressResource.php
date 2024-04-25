<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Filament\Resources\AddressResource\RelationManagers;
use App\Models\Address;
use App\Models\City;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationGroup = 'User Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->preload()
                    ->searchable()
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('label')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('recipient_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('recipient_phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('province_id')
                    ->relationship('province', 'province')
                    ->loadingMessage('Loading provinces...')
                    ->preload()
                    ->searchable()
                    ->native(false)
                    ->live(true)
                    ->required(),
                Forms\Components\Select::make('city_id')
                    ->label('City')
                    ->loadingMessage('Loading cities...')
                    ->noSearchResultsMessage('Please select province first.')
                    ->native(false)
                    // ->disabled(fn (Get $get): bool => !filled($get('province_id')))
                    ->options(fn (Get $get): Collection => City::query()
                        ->where('province_id', $get('province_id'))
                        ->pluck('city_name', 'city_id'))
                    ->required(),
                Forms\Components\TextInput::make('district_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('postal_code')
                    ->required()
                    ->numeric()
                    ->maxLength(5),
                Forms\Components\Textarea::make('street_name')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('label')
                    ->searchable(),
                Tables\Columns\TextColumn::make('recipient_name')
                    ->label('Recipient Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('recipient_phone_number')
                    ->label('Recipient Phone Number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('province.province')
                    ->label('Province')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city.city_name')
                    ->label('City')
                    ->searchable(),
                Tables\Columns\TextColumn::make('district_name')
                    ->label('District')
                    ->searchable(),
                Tables\Columns\TextColumn::make('postal_code')
                    ->label('Postal Code')
                    ->sortable(),
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
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'view' => Pages\ViewAddress::route('/{record}'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }
}
