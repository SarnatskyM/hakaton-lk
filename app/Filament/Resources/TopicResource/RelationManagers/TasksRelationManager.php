<?php

namespace App\Filament\Resources\TopicResource\RelationManagers;

use App\Models\TaskType;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class TasksRelationManager extends RelationManager
{
    protected static string $relationship = 'tasks';

    protected static ?string $label = 'Задание';

    protected static ?string $title = 'Задания';

    protected static ?string $pluralLabel = 'Задания';

    protected static ?string $modelLabel = 'Задание';

    protected static ?string $pluralModelLabel = 'Задания';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->label("Название")
                        ->required(),

                    Forms\Components\Select::make('type_id')
                        ->label('Тип задания')
                        ->preload()
                        ->options(TaskType::all()->pluck('title', 'id')),

                    Forms\Components\RichEditor::make('description')
                        ->label("Описание")
                        ->required(),

                    Forms\Components\KeyValue::make('task_params')
                        ->keyLabel('Параметры')
                ])
            ]);
    }

    public function isReadOnly(): bool
    {
        if (auth()->user()->roles[0]->id !== 2)
            return false;
        return true;
    }


    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Название')->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Описание'),
                Tables\Columns\TextColumn::make('type.title')->label('Тип задания'),
                Tables\Columns\TextColumn::make('task_params')->label('Параметры'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\Action::make()
                //     ->label('Сдать задание')
                //     ->form([
                //         TextInput::make('title'),
                //         Textarea::make('content'),
                //     ])
                //     ->fillForm(fn (Student2Task $record): array => [
                //         'title' => $record->title,
                //         'content' => $record->content,
                //     ])
                //     ->disabledForm()
                //     ->action(function (Post $record): void {
                //         $record->approve();
                //     }),
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
