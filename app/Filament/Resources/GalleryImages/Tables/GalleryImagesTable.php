<?php

namespace App\Filament\Resources\GalleryImages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class GalleryImagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('')
                    ->square()
                    ->getStateUsing(fn ($record) => media_url($record->thumbnail ?: $record->image)),
                TextColumn::make('title')->searchable()->sortable()->weight('bold'),
                TextColumn::make('category_key')->label('Category')->badge()->sortable(),
                TextColumn::make('destination.name')->label('Destination')->placeholder('—')->toggleable(),
                IconColumn::make('is_tall')->label('Tall')->boolean()->toggleable(),
                IconColumn::make('is_featured')->label('Featured')->boolean(),
                IconColumn::make('is_published')->label('Published')->boolean(),
                TextColumn::make('sort_order')->sortable(),
            ])
            ->filters([
                SelectFilter::make('category_key')
                    ->label('Category')
                    ->options([
                        'wildlife' => 'Wildlife',
                        'landscapes' => 'Landscapes',
                        'camps' => 'Camps & Lodges',
                        'coast' => 'Coast',
                        'on-safari' => 'On Safari',
                    ]),
                TernaryFilter::make('is_featured')->label('Featured'),
                TernaryFilter::make('is_published')->label('Published'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
