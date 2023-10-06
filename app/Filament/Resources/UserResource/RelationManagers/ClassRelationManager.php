<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\Classes;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ClassRelationManager extends RelationManager
{
    protected static string $relationship = 'class';

    protected static ?string $title = 'Классы';

    protected static ?string $label = 'Классы';

    protected static ?string $pluralLabel = 'Классы';

    protected static ?string $modelLabel = 'Классы';

    protected static ?string $pluralModelLabel = 'Классы';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Forms\Components\Select::make('class_id')
                        ->label("Класс")
                        ->options(Classes::all()->pluck('title', 'id'))
                        ->required(),
                ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('class_id')
            ->columns([
                Tables\Columns\TextColumn::make('class.title')->label('Название'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
