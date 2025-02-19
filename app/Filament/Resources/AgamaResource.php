<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgamaResource\Pages;
use App\Filament\Resources\AgamaResource\RelationManagers;
use App\Models\Agama;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class AgamaResource extends Resource
{
    protected static ?string $model = Agama::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'Statistik';

    public static function getSlug(): string
    {
        return '/statistik/agama';
    }

    public static function getModelLabel(): string
    {
        return 'Agama';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Agama';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('agama')
                    ->label('Agama')
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
                TextColumn::make('agama')->label('Agama')->sortable()->searchable(),
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
            'index' => Pages\ListAgamas::route('/'),
            'create' => Pages\CreateAgama::route('/create'),
            'edit' => Pages\EditAgama::route('/{record}/edit'),
        ];
    }
}
