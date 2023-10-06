<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopicResource\Pages;
use App\Filament\Resources\TopicResource\RelationManagers\SummaryRelationManager;
use App\Filament\Resources\TopicResource\RelationManagers\TasksRelationManager;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\TopicTheme;
use App\Models\User;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class TopicResource extends Resource
{
    protected static ?string $model = Topic::class;

    protected static ?string $navigationGroup = "Основное";

    protected static ?string $label = 'Тема';

    protected static ?string $pluralLabel = 'Темы';

    protected static ?string $modelLabel = 'Тема';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->label("Название")
                            ->required(),
                        RichEditor::make('description')
                            ->label("Описание")
                            ->required(),
                    ])
                    ->columnSpan(2),

                Section::make()
                    ->schema([
                        Select::make('subject_id')
                            ->label('Предмет')
                            ->options(Subject::all()->pluck('title', 'id'))
                            ->preload()
                            ->required(),

                        Select::make('teacher_id')
                            ->label('Преподаватель')
                            ->options(User::role('Преподаватель')->pluck('name', 'id'))
                            ->default(Auth::user()->id)
                            ->required(),

                        Select::make('theme_id')
                            ->label('Тема')
                            ->options(TopicTheme::all()->pluck('title', 'id'))
                            ->preload()
                            ->required(),

                    ])
                    ->columnSpan(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Название')->searchable(),
                TextColumn::make('subject.title')->label('Предмет'),
                TextColumn::make('teacher.name')->label('Преподаватель'),
                TextColumn::make('theme.title')->label('Тема'),
            ])
            ->filters([
                SelectFilter::make('subject_id')
                    ->label('Предмет')
                    ->options(Subject::all()->pluck('title', 'id'))
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            SummaryRelationManager::class,
            TasksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTopics::route('/'),
            'create' => Pages\CreateTopic::route('/create'),
            'edit' => Pages\EditTopic::route('/{record}/edit'),
            'view' => Pages\ViewTopic::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->roles[0]->id === 1) {
            return parent::getEloquentQuery()->where("teacher_id", auth()->user()->id);
        }
        return parent::getEloquentQuery();
    }
}
