<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelasSosialResource\Pages;
use App\Filament\Resources\KelasSosialResource\RelationManagers;
use App\Models\KelasSosial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelasSosialResource extends Resource
{
    protected static ?string $model = KelasSosial::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Statistik';

    public static function getSlug(): string
    {
        return '/statistik/kelas-sosial';
    }

    public static function getModelLabel(): string
    {
        return 'Kelas Sosial';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Kelas Sosial';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kelas')
                    ->label('Nama Kelas')
                    ->required(),
                Forms\Components\TextInput::make('jumlah_keluarga')
                    ->label('Jumlah Keluarga')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kelas')
                    ->label('Statistik')
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_keluarga')
                    ->label('Jumlah Keluarga')
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
            'index' => Pages\ListKelasSosials::route('/'),
            'create' => Pages\CreateKelasSosial::route('/create'),
            'edit' => Pages\EditKelasSosial::route('/{record}/edit'),
        ];
    }
}
