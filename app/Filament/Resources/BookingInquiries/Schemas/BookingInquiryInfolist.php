<?php

namespace App\Filament\Resources\BookingInquiries\Schemas;

use App\Models\BookingInquiry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookingInquiryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Enquiry')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('reference')->weight('bold'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                BookingInquiry::STATUS_NEW => 'warning',
                                BookingInquiry::STATUS_CONTACTED => 'info',
                                BookingInquiry::STATUS_CLOSED => 'success',
                                default => 'gray',
                            }),
                        TextEntry::make('created_at')->dateTime(),
                    ]),
                Section::make('Traveller')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('email')->label('Email')->copyable(),
                        TextEntry::make('phone')->placeholder('—')->copyable(),
                        TextEntry::make('country')->placeholder('—'),
                    ]),
                Section::make('Journey')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('package.name')->label('Package')->placeholder('Custom itinerary'),
                        TextEntry::make('destination.name')->label('Destination')->placeholder('—'),
                        TextEntry::make('service.name')->label('Service')->placeholder('—'),
                        TextEntry::make('travel_date')->date()->placeholder('Flexible'),
                        TextEntry::make('travellers_label')->label('Travellers'),
                        TextEntry::make('budget_key')
                            ->label('Budget')
                            ->formatStateUsing(fn (?string $state) => $state ? ucfirst($state) : '—'),
                        TextEntry::make('message')->placeholder('—')->columnSpanFull(),
                    ]),
            ]);
    }
}
