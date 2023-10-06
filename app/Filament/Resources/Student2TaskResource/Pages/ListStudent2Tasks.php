<?php

namespace App\Filament\Resources\Student2TaskResource\Pages;

use App\Filament\Resources\Student2TaskResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;

class ListStudent2Tasks extends ListRecords
{
    protected static string $resource = Student2TaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Все задания'),
            'inactive' => Tab::make('Не проверенные')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_done', 0)),
            'active' => Tab::make('Готовые задания')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_done', 1)),

        ];
    }
}
