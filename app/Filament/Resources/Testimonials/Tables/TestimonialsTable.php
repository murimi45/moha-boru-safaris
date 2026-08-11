<?php

namespace App\Filament\Resources\Testimonials\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class TestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            // Small catalogue — skip Filament pagination (avoids a known timeout path).
            ->paginated(false)
            ->columns([
                TextColumn::make('name')->searchable()->sortable()->weight('bold'),
                TextColumn::make('role')->label('Trip')->searchable()->toggleable(),
                TextColumn::make('quote')->limit(50)->wrap()->toggleable(),
                TextColumn::make('rating')
                    ->label('Rating')
                    ->formatStateUsing(fn ($state): string => filled($state) ? str_repeat('★', (int) $state) : '—')
                    ->toggleable(),
                TextColumn::make('email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('initials')->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_published')->label('Published')->boolean(),
                TextColumn::make('sort_order')->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                TernaryFilter::make('is_published')
                    ->label('Status')
                    ->placeholder('All reviews')
                    ->trueLabel('Published')
                    ->falseLabel('Pending approval'),
            ])
            ->recordActions([
                Action::make('publish')
                    ->label('Publish')
                    ->icon(Heroicon::OutlinedCheck)
                    ->color('success')
                    ->visible(fn ($record): bool => ! $record->is_published)
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['is_published' => true])),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
