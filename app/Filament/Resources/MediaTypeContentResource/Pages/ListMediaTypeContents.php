<?php

namespace App\Filament\Resources\MediaTypeContentResource\Pages;

use App\Filament\Resources\MediaTypeContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMediaTypeContents extends ListRecords
{
    protected static string $resource = MediaTypeContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
