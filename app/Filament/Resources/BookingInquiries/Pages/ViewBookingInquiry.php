<?php

namespace App\Filament\Resources\BookingInquiries\Pages;

use App\Filament\Resources\BookingInquiries\BookingInquiryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBookingInquiry extends ViewRecord
{
    protected static string $resource = BookingInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
