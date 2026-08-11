<?php

namespace App\Filament\Resources\BookingInquiries\Tables;

use App\Models\BookingInquiry;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BookingInquiriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('reference')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('phone')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('package.name')
                    ->label('Package')
                    ->placeholder('Custom')
                    ->toggleable(),
                TextColumn::make('destination.name')
                    ->label('Destination')
                    ->placeholder('—')
                    ->toggleable(),
                TextColumn::make('travel_date')
                    ->date()
                    ->sortable()
                    ->placeholder('Flexible'),
                TextColumn::make('travellers_label')
                    ->label('Travellers'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        BookingInquiry::STATUS_NEW => 'warning',
                        BookingInquiry::STATUS_CONTACTED => 'info',
                        BookingInquiry::STATUS_CLOSED => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        BookingInquiry::STATUS_NEW => 'New',
                        BookingInquiry::STATUS_CONTACTED => 'Contacted',
                        BookingInquiry::STATUS_CLOSED => 'Closed',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()->label('Update status'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
