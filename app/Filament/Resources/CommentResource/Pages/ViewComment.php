<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
use App\Models\Comment;
use Filament\Actions;
use Filament\Infolists\Infolist;
use Filament\Infolists;
use Filament\Forms\Components;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\HtmlString;

class ViewComment extends ViewRecord
{
    protected static string $resource = CommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()->label('Edit Comment')->icon('heroicon-o-pencil-square'),
            Actions\Action::make('replyComment')
                ->label('Reply Comment')
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->modalHeading('Add a Reply')
                ->modalDescription('Reply directly to a comment')
                ->form([
                    Components\Select::make('user_id')
                        ->relationship(name: 'user', titleAttribute: 'name')
                        ->preload()
                        ->native(false)
                        ->searchable()
                        ->label('User')
                        ->required(),
                    Components\RichEditor::make('comment')
                        ->required()
                        ->maxLength(65535)
                        ->columnSpanFull(),
                ])
                ->action(function (array $data, Comment $record): void {
                    // $record->syncRoles($data['roles']);
                    Comment::create([
                        'parent_id' => $record->id,
                        'user_id' => $data['user_id'],
                        'product_id' => $record->product_id,
                        'comment' => $data['comment']
                    ]);
                }),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make([
                    Infolists\Components\TextEntry::make('parent.comment')
                        ->label('Reply to')
                        ->placeholder('No parent comment')
                        ->state(fn (Comment $record) => $record->parent ? new HtmlString($record->parent->comment) : null)
                        ->url(function (Comment $record) {
                            if (!$record->parent) {
                                return null;
                            }
                            return route('filament.admin.resources.comments.view', ['record' => $record->parent]);
                        })->columnSpanFull(),
                    Infolists\Components\TextEntry::make('user.name')
                        ->label('User')
                        ->url(function (Comment $record) {
                            return route('filament.admin.resources.users.view', ['record' => $record->user]);
                        }),
                    Infolists\Components\TextEntry::make('product.name')
                        ->label('Product')
                        ->state(function (Comment $record) {
                            if (!$record->product) {
                                return $record->parent?->product?->name;
                            }
                            return $record->product->name;
                        })
                        ->url(function (Comment $record) {
                            if (!$record->product && !$record->parent?->product) {
                                return null;
                            }
                            return route('filament.admin.resources.products.view', ['record' => $record->product ?? $record->parent->product]);
                        }),
                    Infolists\Components\TextEntry::make('comment')
                        ->html()
                        ->columnSpanFull(),
                ])->columns(2),

            ]);
    }
}
