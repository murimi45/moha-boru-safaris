<?php

namespace App\Filament\Resources\Packages\Schemas;

use App\Models\Destination;
use App\Models\Package;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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

class PackageForm
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
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (($get('slug') ?? '') !== Str::slug((string) $old)) {
                                    return;
                                }

                                $set('slug', Str::slug((string) $state));
                            }),
                        TextInput::make('slug')
                            ->required()
                            ->unique(Package::class, 'slug', ignoreRecord: true),
                        Select::make('destination_id')
                            ->label('Primary destination')
                            ->relationship('destination', 'name')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                if (! $state) {
                                    return;
                                }

                                $destination = Destination::find($state);
                                if ($destination) {
                                    $set('destination_key', $destination->slug);
                                }
                            }),
                        TextInput::make('destination_key')
                            ->required()
                            ->helperText('Used by the public package filters. Usually the destination slug.'),
                        TextInput::make('duration')->required(),
                        Select::make('duration_key')
                            ->options([
                                'short' => 'Short — 1 to 4 Days',
                                'medium' => 'Medium — 5 to 7 Days',
                                'long' => 'Extended — 8+ Days',
                            ])
                            ->required()
                            ->native(false),
                        TextInput::make('guests')->required(),
                        Select::make('budget_key')
                            ->options([
                                'value' => 'Value',
                                'premium' => 'Premium',
                                'ultra' => 'Ultra Luxury',
                            ])
                            ->required()
                            ->native(false),
                        TextInput::make('price')->required(),
                        TextInput::make('price_note')
                            ->helperText('e.g. per person, sharing — based on double occupancy'),
                        TextInput::make('badge'),
                        TextInput::make('sort_order')->numeric()->default(0)->required(),
                        Toggle::make('is_featured')->label('Featured on homepage')->default(false),
                    ]),
                Section::make('Copy')
                    ->schema([
                        Textarea::make('excerpt')->rows(2)->columnSpanFull(),
                        Textarea::make('intro')->rows(3)->columnSpanFull(),
                        TagsInput::make('included')->columnSpanFull(),
                        TagsInput::make('excluded')->columnSpanFull(),
                        Repeater::make('itinerary')
                            ->schema([
                                TextInput::make('title')->required(),
                                Textarea::make('body')->required()->rows(3),
                            ])
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                            ->columnSpanFull(),
                    ]),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Card image')
                            ->image()
                            ->disk('public')
                            ->directory('packages')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->helperText('Upload a photo for package cards. Existing path-based images stay until replaced.'),
                        FileUpload::make('hero_image')
                            ->label('Hero image')
                            ->image()
                            ->disk('public')
                            ->directory('packages/heroes')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(8192)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Wide photo for the package detail page. Falls back to the card image if empty.'),
                    ]),
            ]);
    }
}
