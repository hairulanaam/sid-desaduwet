<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KehamilanResource\Pages;
use App\Models\Kehamilan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class KehamilanResource extends Resource
{
    protected static ?string $model = Kehamilan::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Statistik';

    public static function getSlug(): string
    {
        return '/statistik/kehamilan';
    }

    public static function getModelLabel(): string
    {
        return 'Kehamilan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Kehamilan';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kategori')
                    ->label('Kategori')
                    ->required()
                    ->maxLength(255),
                TextInput::make('perempuan')
                    ->label('Perempuan')
                    ->numeric()
                    ->required()
                    ->live(), // Tambahkan live() agar perubahan langsung terdeteksi

                TextInput::make('jumlah_penduduk')
                    ->label('Jumlah Penduduk')
                    ->numeric()
                    ->disabled(), // Tidak bisa diedit karena otomatis
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
                TextColumn::make('perempuan')
                    ->label('Perempuan')
                    ->sortable(),
                TextColumn::make('jumlah_penduduk')
                    ->label('Jumlah Penduduk')
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
            'index' => Pages\ListKehamilans::route('/'),
            'create' => Pages\CreateKehamilan::route('/create'),
            'edit' => Pages\EditKehamilan::route('/{record}/edit'),
        ];
    }
}
