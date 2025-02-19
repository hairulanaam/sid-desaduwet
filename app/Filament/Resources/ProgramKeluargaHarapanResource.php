<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramKeluargaHarapanResource\Pages;
use App\Filament\Resources\ProgramKeluargaHarapanResource\RelationManagers;
use App\Models\ProgramKeluargaHarapan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramKeluargaHarapanResource extends Resource
{
    protected static ?string $model = ProgramKeluargaHarapan::class;

    protected static ?string $navigationIcon = 'heroicon-o-hand-thumb-up';
    protected static ?string $navigationGroup = 'Statistik';

    public static function getSlug(): string
    {
        return '/statistik/program-keluarga-harapan';
    }

    public static function getModelLabel(): string
    {
        return 'Program Keluarga Harapan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Program Keluarga Harapan';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kelas')
                    ->label('Nama Kelas')
                    ->required(),
                Forms\Components\TextInput::make('menerima_pkh')
                    ->label('Menerima Program Keluarga Harapan')
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
                Tables\Columns\TextColumn::make('menerima_pkh')
                    ->label('Menerima Program Keluarga Harapan')
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
            'index' => Pages\ListProgramKeluargaHarapans::route('/'),
            'create' => Pages\CreateProgramKeluargaHarapan::route('/create'),
            'edit' => Pages\EditProgramKeluargaHarapan::route('/{record}/edit'),
        ];
    }
}
