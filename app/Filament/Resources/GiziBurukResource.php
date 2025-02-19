<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GiziBurukResource\Pages;
use App\Filament\Resources\GiziBurukResource\RelationManagers;
use App\Models\GiziBuruk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class GiziBurukResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Statistik';

    public static function getSlug(): string
    {
        return '/statistik/gizi-buruk';
    }

    public static function getModelLabel(): string
    {
        return 'Gizi Buruk';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Gizi Buruk';
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
                    ->label('Jumlah Gizi Buruk')
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
                    ->label('Jumlah Gizi Buruk')
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGiziBuruks::route('/'),
            'create' => Pages\CreateGiziBuruk::route('/create'),
            'edit' => Pages\EditGiziBuruk::route('/{record}/edit'),
        ];
    }
}
