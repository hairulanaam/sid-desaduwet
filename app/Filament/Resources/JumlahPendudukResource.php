<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JumlahPendudukResource\Pages;
use App\Filament\Resources\JumlahPendudukResource\RelationManagers;
use App\Models\JumlahPenduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class JumlahPendudukResource extends Resource
{
    protected static ?string $model = JumlahPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Statistik';

    public static function getSlug(): string
    {
        return '/statistik/jumlah-penduduk';
    }

    public static function getModelLabel(): string
    {
        return 'Jumlah Penduduk';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Jumlah Penduduk';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kategori')
                ->label('Kategori')
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
                TextColumn::make('kategori')->label('Kategori')->sortable()->searchable(),
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
            'index' => Pages\ListJumlahPenduduks::route('/'),
            'create' => Pages\CreateJumlahPenduduk::route('/create'),
            'edit' => Pages\EditJumlahPenduduk::route('/{record}/edit'),
        ];
    }
}
