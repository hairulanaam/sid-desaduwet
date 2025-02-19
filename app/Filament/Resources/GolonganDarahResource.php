<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GolonganDarahResource\Pages;
use App\Filament\Resources\GolonganDarahResource\RelationManagers;
use App\Models\GolonganDarah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class GolonganDarahResource extends Resource
{
    protected static ?string $model = GolonganDarah::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';
    protected static ?string $navigationGroup = 'Statistik';

    public static function getSlug(): string
    {
        return '/statistik/golongan-darah';
    }

    public static function getModelLabel(): string
    {
        return 'Golongan Darah';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Golongan Darah';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('golongan_darah')
                    ->label('Golongan Darah')
                    ->required(),
                Forms\Components\TextInput::make('laki_laki')
                    ->label('Laki-Laki')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('perempuan')
                    ->label('Perempuan')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('jumlah_penduduk')
                    ->label('Jumlah Penduduk')
                    ->numeric()
                    ->disabled()
                    ->dehydrated(false), // Tidak dikirim ke database
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('golongan_darah')->label('Golongan Darah')->sortable()->searchable(),
                TextColumn::make('laki_laki')->label('Laki-Laki')->sortable(),
                TextColumn::make('perempuan')->label('Perempuan')->sortable(),
                TextColumn::make('jumlah_penduduk')->label('Jumlah Penduduk')
                    ->sortable()
                    ->formatStateUsing(fn($record) => $record->laki_laki + $record->perempuan),
            ])
            ->filters([
                //
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
            'index' => Pages\ListGolonganDarahs::route('/'),
            'create' => Pages\CreateGolonganDarah::route('/create'),
            'edit' => Pages\EditGolonganDarah::route('/{record}/edit'),
        ];
    }
}
