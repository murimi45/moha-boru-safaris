<?php

namespace App\Filament\Resources\Destinations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class DestinationsTable
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
                TextColumn::make('region')->searchable()->toggleable(),
                TextColumn::make('region_key')->label('Filter')->badge()->toggleable(),
                TextColumn::make('tag')->toggleable(),
                IconColumn::make('is_featured')->label('Featured')->boolean(),
                TextColumn::make('sort_order')->sortable(),
            ])
            ->filters([
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
