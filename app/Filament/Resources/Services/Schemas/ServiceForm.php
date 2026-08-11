<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Models\Service;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
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
                            ->unique(Service::class, 'slug', ignoreRecord: true),
                        TextInput::make('icon')
                            ->required()
                            ->helperText('Bootstrap Icons class, e.g. bi-compass'),
                        TextInput::make('tagline'),
                        TextInput::make('sort_order')->numeric()->default(0)->required(),
                        Toggle::make('is_featured')->label('Featured')->default(false),
                        Toggle::make('is_published')->label('Published')->default(true),
                    ]),
                Section::make('Copy')
                    ->schema([
                        Textarea::make('excerpt')->rows(2)->columnSpanFull(),
                        Textarea::make('intro')->rows(3)->columnSpanFull(),
                        Textarea::make('description')->rows(6)->columnSpanFull(),
                        TagsInput::make('highlights')
                            ->helperText('Shown as “What’s Included” on the service detail page.')
                            ->columnSpanFull(),
                    ]),
                Section::make('Images')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Card image')
                            ->image()
                            ->disk('public')
                            ->directory('services')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(5120)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Optional photo for the service. Existing path-based images stay until replaced.'),
                        FileUpload::make('hero_image')
                            ->label('Hero image')
                            ->image()
                            ->disk('public')
                            ->directory('services/heroes')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(8192)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Wide photo for the service detail page. Falls back to the card image if empty.'),
                    ]),
            ]);
    }
}
