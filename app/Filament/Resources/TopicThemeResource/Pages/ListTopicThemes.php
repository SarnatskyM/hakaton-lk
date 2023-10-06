<?php

namespace App\Filament\Resources\TopicThemeResource\Pages;

use App\Filament\Resources\TopicThemeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopicThemes extends ListRecords
{
    protected static string $resource = TopicThemeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
