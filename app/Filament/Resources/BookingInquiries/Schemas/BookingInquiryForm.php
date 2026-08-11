<?php

namespace App\Filament\Resources\BookingInquiries\Schemas;

use App\Models\BookingInquiry;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookingInquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Status')
                    ->schema([
                        Select::make('status')
                            ->options([
                                BookingInquiry::STATUS_NEW => 'New',
                                BookingInquiry::STATUS_CONTACTED => 'Contacted',
                                BookingInquiry::STATUS_CLOSED => 'Closed',
                            ])
                            ->required()
                            ->native(false),
                    ]),
                Section::make('Traveller')
                    ->columns(2)
                    ->schema([
                        TextInput::make('reference')->disabled(),
                        TextInput::make('name')->disabled(),
                        TextInput::make('email')->label('Email')->email()->disabled(),
                        TextInput::make('phone')->disabled(),
                        TextInput::make('country')->disabled(),
                    ]),
                Section::make('Journey')
                    ->columns(2)
                    ->schema([
                        Select::make('package_id')
                            ->relationship('package', 'name')
                            ->disabled(),
                        Select::make('destination_id')
                            ->relationship('destination', 'name')
                            ->disabled(),
                        Select::make('service_id')
                            ->relationship('service', 'name')
                            ->disabled(),
                        TextInput::make('travel_date')->disabled(),
                        TextInput::make('adults')->disabled(),
                        TextInput::make('children')->disabled(),
                        TextInput::make('budget_key')->label('Budget')->disabled(),
                        Textarea::make('message')->disabled()->columnSpanFull(),
                    ]),
            ]);
    }
}
