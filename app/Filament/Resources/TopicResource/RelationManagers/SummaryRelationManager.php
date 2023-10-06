<?php

namespace App\Filament\Resources\TopicResource\RelationManagers;

use App\Models\LectureType;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SummaryRelationManager extends RelationManager
{
    protected static string $relationship = 'summary';

    protected static ?string $label = 'Урок';

    protected static ?string $title = 'Урок';

    protected static ?string $pluralLabel = 'Уроки';

    protected static ?string $modelLabel = 'Урок';

    protected static ?string $pluralModelLabel = 'Уроки';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->label("Название")
                        ->required(),

                    Forms\Components\Select::make('type_id')
                        ->options(LectureType::all()->pluck('title', 'id'))
                        ->label('Тип')
                        ->required(),

                    Forms\Components\RichEditor::make('description')
                        ->label("Описание")
                        ->required(),

                ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Название')->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Описание'),
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
