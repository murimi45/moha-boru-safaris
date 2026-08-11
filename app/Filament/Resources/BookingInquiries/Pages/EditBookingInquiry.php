<?php

namespace App\Filament\Resources\BookingInquiries\Pages;

use App\Filament\Resources\BookingInquiries\BookingInquiryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBookingInquiry extends EditRecord
{
    protected static string $resource = BookingInquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
