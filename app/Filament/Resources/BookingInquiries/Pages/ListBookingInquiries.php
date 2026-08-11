<?php

namespace App\Filament\Resources\BookingInquiries\Pages;

use App\Filament\Resources\BookingInquiries\BookingInquiryResource;
use Filament\Resources\Pages\ListRecords;

class ListBookingInquiries extends ListRecords
{
    protected static string $resource = BookingInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
