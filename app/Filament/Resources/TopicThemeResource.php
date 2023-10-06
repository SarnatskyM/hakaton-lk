<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopicThemeResource\Pages;
use App\Models\TopicTheme;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TopicThemeResource extends Resource
{
    protected static ?string $model = TopicTheme::class;

    protected static ?string $navigationGroup = "Справочники";

    protected static ?string $label = 'Topic theme';

    protected static ?string $pluralLabel = 'Topic theme';

    protected static ?string $modelLabel = 'Topic theme';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('title')
                        ->label('Название')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Название')->searchable(),
            ])
            ->filters([
                //
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTopicThemes::route('/'),
            'create' => Pages\CreateTopicTheme::route('/create'),
            'edit' => Pages\EditTopicTheme::route('/{record}/edit'),
        ];
    }    
}
