<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JamkesmasResource\Pages;
use App\Filament\Resources\JamkesmasResource\RelationManagers;
use App\Models\Jamkesmas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JamkesmasResource extends Resource
{
    protected static ?string $model = Jamkesmas::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $navigationGroup = 'Statistik';

    public static function getSlug(): string
    {
        return '/statistik/jamkesmas';
    }

    public static function getModelLabel(): string
    {
        return 'Jamkesmas';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Jamkesmas';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kelas')
                    ->label('Nama Kelas')
                    ->required(),
                Forms\Components\TextInput::make('menerima_jamkesmas')
                    ->label('Menerima Jamkesmas')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('jumlah_kepala_keluarga')
                    ->label('Jumlah Kepala Keluarga')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kelas')
                    ->label('Nama Kelas')
                    ->sortable(),
                Tables\Columns\TextColumn::make('menerima_jamkesmas')
                    ->label('Menerima Jamkesmas')
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_kepala_keluarga')
                    ->label('Jumlah Kepala Keluarga')
                    ->sortable(),
            ])
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
            'index' => Pages\ListJamkesmas::route('/'),
            'create' => Pages\CreateJamkesmas::route('/create'),
            'edit' => Pages\EditJamkesmas::route('/{record}/edit'),
        ];
    }
}
