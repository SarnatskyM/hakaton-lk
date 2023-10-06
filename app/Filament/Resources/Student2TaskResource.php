<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Student2TaskResource\Pages;
use App\Models\Student2Task;
use App\Models\Task;
use App\Models\User;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class Student2TaskResource extends Resource
{
    protected static ?string $model = Student2Task::class;

    protected static ?string $navigationGroup = "Основное";

    protected static ?string $label = 'Домашние задание';

    protected static ?string $pluralLabel = 'Домашние задания';

    protected static ?string $modelLabel = 'Домашние задание';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Section::make()->schema([
                    Select::make('student_id')
                        ->label('Ученик')
                        ->options(User::role('Ученик')->pluck('name', 'id'))
                        ->required(),

                    Select::make('task_id')
                        ->visibleOn('create')
                        ->label('Задание')
                        ->options(Task::all()->pluck('title', 'id')),

                    Fieldset::make('Задача')
                        ->relationship('task')
                        ->visibleOn('edit')
                        ->schema([
                            TextInput::make('title')
                                ->label("Название")
                                ->columnSpanFull()
                                ->disabled(),

                            RichEditor::make('description')
                                ->label("Описание")
                                ->columnSpanFull()
                                ->disabled(),

                            KeyValue::make('task_params')
                                ->keyLabel('Параметры')
                                ->columnSpanFull()
                                ->disabled(),
                        ]),
                ])->columnSpan(2),

                Section::make()->schema([
                    Toggle::make('is_done')
                        ->label('Сделано')
                        ->default(false),
                ])->columnSpan(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')->label('Ученик'),
                Tables\Columns\TextColumn::make('task.title')->label('Задание'),
                Tables\Columns\TextColumn::make('is_done')
                    ->badge()
                    ->formatStateUsing(function (string $state) {
                        switch ($state) {
                            case '0':
                                return 'Не сделано';
                            case '1':
                                return 'Готово';
                        }
                    })
                    ->color(fn (string $state): string => match ($state) {
                        '0' => 'gray',
                        '1' => 'success',
                    })
                    ->label('Сделано'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudent2Tasks::route('/'),
            'create' => Pages\CreateStudent2Task::route('/create'),
            'edit' => Pages\EditStudent2Task::route('/{record}/edit'),
        ];
    }
}
