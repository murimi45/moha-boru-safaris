<?php

namespace App\Filament\Resources\Packages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class PackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                ImageColumn::make('image')
                    ->label('')
                    ->circular()
                    ->getStateUsing(fn ($record) => media_url($record->image)),
                TextColumn::make('name')->searchable()->sortable()->weight('bold'),
                TextColumn::make('destination.name')->label('Destination')->sortable()->toggleable(),
                TextColumn::make('duration')->toggleable(),
                TextColumn::make('price')->sortable(),
                TextColumn::make('badge')->badge()->toggleable(),
                TextColumn::make('budget_key')->badge()->toggleable(),
                IconColumn::make('is_featured')->label('Featured')->boolean(),
                TextColumn::make('sort_order')->sortable(),
            ])
            ->filters([
                SelectFilter::make('destination_id')
                    ->relationship('destination', 'name')
                    ->label('Destination'),
                TernaryFilter::make('is_featured')->label('Featured'),
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
