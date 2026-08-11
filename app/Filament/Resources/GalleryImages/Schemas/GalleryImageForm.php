<?php

namespace App\Filament\Resources\GalleryImages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Photograph')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')->required()->columnSpanFull(),
                        Textarea::make('caption')->rows(2)->columnSpanFull(),
                        FileUpload::make('image')
                            ->label('Full image')
                            ->image()
                            ->disk('public')
                            ->directory('gallery')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(8192)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->helperText('Opened in the lightbox. Existing path-based images stay until replaced.')
                            ->columnSpanFull(),
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail')
                            ->image()
                            ->disk('public')
                            ->directory('gallery/thumbs')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Optional smaller grid tile. Falls back to the full image if empty.')
                            ->columnSpanFull(),
                        Select::make('destination_id')
                            ->relationship('destination', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Select::make('category_key')
                            ->label('Category')
                            ->options([
                                'wildlife' => 'Wildlife',
                                'landscapes' => 'Landscapes',
                                'camps' => 'Camps & Lodges',
                                'coast' => 'Coast',
                                'on-safari' => 'On Safari',
                            ])
                            ->required()
                            ->native(false),
                        TextInput::make('sort_order')->numeric()->default(0)->required(),
                        Toggle::make('is_tall')->label('Tall tile in masonry grid')->default(false),
                        Toggle::make('is_featured')->label('Show on homepage preview')->default(false),
                        Toggle::make('is_published')->label('Published')->default(true),
                    ]),
            ]);
    }
}
