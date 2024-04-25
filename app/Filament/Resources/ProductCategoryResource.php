<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductCategoryResource\Pages;
use App\Filament\Resources\ProductCategoryResource\RelationManagers;
use App\Models\ProductCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductCategoryResource extends Resource
{
    protected static ?string $model = ProductCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'Categories';
    protected static ?string $navigationGroup = 'Product Configuration';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('parent_id')
                    ->relationship(
                        name: 'parent',
                        titleAttribute: 'name',
                        modifyQueryUsing: function (Builder $query, ?ProductCategory $record) {
                            if (!$record) {
                                return $query;
                            }
                            return $query->where('id', '!=', $record->id);
                        }
                    )
                    ->preload()
                    ->searchable()
                    ->native(false)
                    ->label('Parent Category')
                    ->createOptionForm([
                        Forms\Components\Select::make('parent_id')
                            ->options(ProductCategory::all()->pluck('name', 'id'))
                            ->preload()
                            ->searchable()
                            ->native(false)
                            ->label('Parent Category'),
                        Forms\Components\TextInput::make('name')
                            ->label('Category Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])
                    ->createOptionUsing(function (array $data): int {
                        return ProductCategory::create($data)->getKey();
                    }),
                Forms\Components\TextInput::make('name')
                    ->label('Category Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Parent Category')
                    ->numeric()
                    ->placeholder('No parent category')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Category Name')
                    ->description(fn (ProductCategory $record): string => $record->description ?? '')
                    ->searchable(),
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
            'index' => Pages\ListProductCategories::route('/'),
            'create' => Pages\CreateProductCategory::route('/create'),
            'view' => Pages\ViewProductCategory::route('/{record}'),
            'edit' => Pages\EditProductCategory::route('/{record}/edit'),
        ];
    }
}
