<?php

namespace App\Filament\Resources\TopicThemeResource\Pages;

use App\Filament\Resources\TopicThemeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopicTheme extends EditRecord
{
    protected static string $resource = TopicThemeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
