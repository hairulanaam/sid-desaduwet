<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PekerjaanResource\Pages;
use App\Models\Pekerjaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PekerjaanResource extends Resource
{
    protected static ?string $model = Pekerjaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Statistik';

    public static function getSlug(): string
    {
        return '/statistik/pekerjaan';
    }

    public static function getModelLabel(): string
    {
        return 'Pekerjaan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pekerjaan';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pekerjaan')
                    ->label('Nama Pekerjaan')
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
                TextColumn::make('nama_pekerjaan')->label('Nama Pekerjaan')->sortable()->searchable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPekerjaans::route('/'),
            'create' => Pages\CreatePekerjaan::route('/create'),
            'edit' => Pages\EditPekerjaan::route('/{record}/edit'),
        ];
    }
}
