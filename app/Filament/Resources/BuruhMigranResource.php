<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BuruhMigranResource\Pages;
use App\Models\BuruhMigran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class BuruhMigranResource extends Resource
{
    protected static ?string $model = BuruhMigran::class;
    protected static ?string $navigationIcon = 'heroicon-o-globe-europe-africa';
    protected static ?string $navigationGroup = 'Statistik';

    public static function getSlug(): string
    {
        return '/statistik/buruh-migran';
    }

    public static function getModelLabel(): string
    {
        return 'Buruh Migran';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Buruh Migran';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kategori')
                    ->label('Kategori')
                    ->required()
                    ->maxLength(255),

                TextInput::make('jumlah')
                    ->label('Jumlah Buruh Migran')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kategori')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('jumlah')
                    ->label('Jumlah Buruh Migran')
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBuruhMigrans::route('/'),
            'create' => Pages\CreateBuruhMigran::route('/create'),
            'edit' => Pages\EditBuruhMigran::route('/{record}/edit'),
        ];
    }
}
