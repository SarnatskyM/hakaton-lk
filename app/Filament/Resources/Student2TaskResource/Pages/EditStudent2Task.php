<?php

namespace App\Filament\Resources\Student2TaskResource\Pages;

use App\Filament\Resources\Student2TaskResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudent2Task extends EditRecord
{
    protected static string $resource = Student2TaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
