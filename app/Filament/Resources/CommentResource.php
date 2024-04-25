<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HtmlString;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'User Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship(name: 'user', titleAttribute: 'name')
                    ->preload()
                    ->native(false)
                    ->searchable()
                    ->label('User')
                    ->required(),
                Forms\Components\Select::make('product_id')
                    ->relationship(name: 'product', titleAttribute: 'name')
                    ->preload()
                    ->native(false)
                    ->searchable()
                    ->label('Product')
                    ->required(),
                Forms\Components\RichEditor::make('comment')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('parent.comment')
                    ->label('Reply to')
                    ->state(fn (Comment $record) => $record->parent?->user->name)
                    ->description(fn (Comment $record) => $record->parent ? new HtmlString($record->parent?->comment) : null)
                    ->placeholder('No parent comment'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Comment')
                    ->description(fn (Comment $record): HtmlString => new HtmlString($record->comment))
                    ->numeric()
                    ->searchable(),
                Tables\Columns\TextColumn::make('product.name')
                    ->label('Product')
                    ->state(function (Comment $record) {
                        if (!$record->product) {
                            return $record->parent?->product?->name;
                        }
                        return $record->product->name;
                    })
                    ->description(function (Comment $record): string | null {
                        if (!$record->product && !$record->parent?->product) {
                            return null;
                        }
                        return $record->product?->productCategory?->name ?? $record->parent?->product?->productCategory?->name;
                    })
                    ->numeric()
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'view' => Pages\ViewComment::route('/{record}'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
