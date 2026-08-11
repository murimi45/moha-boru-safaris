<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Review')
                    ->columns(2)
                    ->schema([
                        Textarea::make('quote')
                            ->label('Review')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        TextInput::make('name')->required(),
                        TextInput::make('email')
                            ->email()
                            ->helperText('Guest email from public submissions — never shown on the site.'),
                        TextInput::make('role')
                            ->label('Trip / Destination')
                            ->required()
                            ->helperText('e.g. Maasai Mara, June 2026'),
                        Select::make('rating')
                            ->options([
                                5 => '5 stars',
                                4 => '4 stars',
                                3 => '3 stars',
                                2 => '2 stars',
                                1 => '1 star',
                            ])
                            ->placeholder('No rating'),
                        TextInput::make('initials')
                            ->required()
                            ->maxLength(4)
                            ->helperText('Shown in the avatar circle. Auto-filled for guest submissions.'),
                        TextInput::make('sort_order')->numeric()->default(0)->required(),
                        Toggle::make('is_published')
                            ->label('Published')
                            ->helperText('Guest reviews start unpublished until you approve them.')
                            ->default(true),
                    ]),
            ]);
    }
}
