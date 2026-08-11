<?php

namespace App\Filament\Resources\BookingInquiries;

use App\Filament\Resources\BookingInquiries\Pages\EditBookingInquiry;
use App\Filament\Resources\BookingInquiries\Pages\ListBookingInquiries;
use App\Filament\Resources\BookingInquiries\Pages\ViewBookingInquiry;
use App\Filament\Resources\BookingInquiries\Schemas\BookingInquiryForm;
use App\Filament\Resources\BookingInquiries\Schemas\BookingInquiryInfolist;
use App\Filament\Resources\BookingInquiries\Tables\BookingInquiriesTable;
use App\Models\BookingInquiry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BookingInquiryResource extends Resource
{
    protected static ?string $model = BookingInquiry::class;

    protected static ?string $navigationLabel = 'Booking Inquiries';

    protected static ?string $modelLabel = 'Booking Inquiry';

    protected static ?string $pluralModelLabel = 'Booking Inquiries';

    protected static ?string $recordTitleAttribute = 'reference';

    protected static string|UnitEnum|null $navigationGroup = 'Operations';

    protected static ?int $navigationSort = 1;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInbox;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return BookingInquiryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return BookingInquiryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BookingInquiriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBookingInquiries::route('/'),
            'view' => ViewBookingInquiry::route('/{record}'),
            'edit' => EditBookingInquiry::route('/{record}/edit'),
        ];
    }
}
