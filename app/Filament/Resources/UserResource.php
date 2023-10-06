<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers\ClassRelationManager;
use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = "Роли и разрешения";

    protected static ?string $label = 'Пользователи';

    protected static ?string $pluralLabel = "Пользователи";

    protected static ?string $modelLabel = 'Пользователи';

    protected static ?string $tenantOwnershipRelationshipName = 'Пользователи';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Section::make()->schema([
                    TextInput::make('name')
                        ->label('Имя')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->email()
                        ->label('Почта')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('password')
                        ->label('Пароль')
                        ->password()
                        ->required(fn (Page $livewire) => $livewire instanceof CreateUser)
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                        ->dehydrated(fn ($state) => filled($state))
                        ->maxLength(255),
                ])->columnSpan(2),

                Section::make()->schema([
                    Select::make('roles')
                        ->preload()
                        ->label('Роли')
                        ->multiple()
                        ->required()
                        ->relationship('roles', 'name'),
                
                ])->columnSpan(1)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Имя')->searchable(),
                TextColumn::make('roles.name')->label('Роль')->searchable(),
                TextColumn::make('email')->label('email'),
                TextColumn::make('created_at')->label('Создан'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            ClassRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
