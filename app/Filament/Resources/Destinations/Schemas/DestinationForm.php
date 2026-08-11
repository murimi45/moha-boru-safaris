<?php

namespace App\Filament\Resources\Destinations\Schemas;

use App\Models\Destination;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class DestinationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basics')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (($get('slug') ?? '') !== Str::slug((string) $old)) {
                                    return;
                                }

                                $set('slug', Str::slug((string) $state));
                            }),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(Destination::class, 'slug', ignoreRecord: true),
                        TextInput::make('tag')
                            ->required()
                            ->helperText('Short label shown on cards, e.g. “The Great Migration”.'),
                        TextInput::make('best_time')
                            ->helperText('e.g. Jul – Oct'),
                        TextInput::make('region')
                            ->required()
                            ->helperText('Shown on the destinations index, e.g. Narok County.'),
                        TextInput::make('location')
                            ->required()
                            ->helperText('Shown on cards and the detail panel.'),
                        Select::make('region_key')
                            ->label('Region filter')
                            ->options([
                                'south' => 'Southern Circuit',
                                'north' => 'Northern Kenya',
                                'rift' => 'Rift Valley',
                                'coast' => 'Coast',
                            ])
                            ->required()
                            ->native(false),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->required(),
                        Toggle::make('is_featured')
                            ->label('Featured on homepage')
                            ->default(false),
                    ]),
                Section::make('Copy')
                    ->schema([
                        Textarea::make('excerpt')->rows(2)->columnSpanFull(),
                        Textarea::make('intro')->rows(3)->columnSpanFull(),
                        Textarea::make('description')->rows(6)->columnSpanFull(),
                        TagsInput::make('activities')
                            ->helperText('Press Enter after each activity.')
                            ->columnSpanFull(),
                    ]),
                Section::make('Images')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('image')
                            ->label('Card image')
                            ->image()
                            ->disk('public')
                            ->directory('destinations')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->helperText('Upload a photo for cards and listings. Existing path-based images stay until you replace them.')
                            ->columnSpanFull(),
                        FileUpload::make('hero_image')
                            ->label('Hero image')
                            ->image()
                            ->disk('public')
                            ->directory('destinations/heroes')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(8192)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Wide photo for the destination detail page. Falls back to the card image if empty.')
                            ->columnSpanFull(),
                        FileUpload::make('gallery')
                            ->label('Gallery photos')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->disk('public')
                            ->directory('destinations/gallery')
                            ->visibility('public')
                            ->maxSize(5120)
                            ->maxFiles(16)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Photos shown in the destination detail gallery.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
