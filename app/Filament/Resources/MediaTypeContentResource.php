<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaTypeContentResource\Pages;
use App\Models\MediaTypeContent;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MediaTypeContentResource extends Resource
{
    protected static ?string $model = MediaTypeContent::class;

    protected static ?string $navigationGroup = "Справочники";

    protected static ?string $label = 'Медиа тип';

    protected static ?string $pluralLabel = "Медиа типы";

    protected static ?string $modelLabel = 'Медиа типы';

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
            'index' => Pages\ListMediaTypeContents::route('/'),
            'create' => Pages\CreateMediaTypeContent::route('/create'),
            'edit' => Pages\EditMediaTypeContent::route('/{record}/edit'),
        ];
    }    
}
