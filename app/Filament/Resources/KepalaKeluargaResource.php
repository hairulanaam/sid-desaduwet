<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KepalaKeluargaResource\Pages;
use App\Filament\Resources\KepalaKeluargaResource\RelationManagers;
use App\Models\KepalaKeluarga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

class KepalaKeluargaResource extends Resource
{
    protected static ?string $model = KepalaKeluarga::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationGroup = 'Statistik';

    public static function getSlug(): string
    {
        return '/statistik/kepala-keluarga';
    }

    public static function getModelLabel(): string
    {
        return 'Kepala Keluarga';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Kepala Keluarga';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kategori')
                    ->label('Kategori')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('jumlah_keluarga')
                    ->label('Jumlah Keluarga')
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
                
                TextColumn::make('jumlah_keluarga')
                    ->label('Jumlah Keluarga')
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
            'index' => Pages\ListKepalaKeluargas::route('/'),
            'create' => Pages\CreateKepalaKeluarga::route('/create'),
            'edit' => Pages\EditKepalaKeluarga::route('/{record}/edit'),
        ];
    }
}
