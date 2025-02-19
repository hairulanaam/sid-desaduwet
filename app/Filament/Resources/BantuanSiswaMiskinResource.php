<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BantuanSiswaMiskinResource\Pages;
use App\Filament\Resources\BantuanSiswaMiskinResource\RelationManagers;
use App\Models\BantuanSiswaMiskin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class BantuanSiswaMiskinResource extends Resource
{
    protected static ?string $model = BantuanSiswaMiskin::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Statistik';

    public static function getSlug(): string
    {
        return '/statistik/bantuan-siswa-miskin';
    }

    public static function getModelLabel(): string
    {
        return 'Bantuan Siswa Miskin';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Bantuan Siswa Miskin';
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
                    ->label('Jumlah Penerima Bantuan Siswa Miskin')
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
                    ->label('Jumlah Penerima Bantuan Siswa Miskin')
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
            'index' => Pages\ListBantuanSiswaMiskins::route('/'),
            'create' => Pages\CreateBantuanSiswaMiskin::route('/create'),
            'edit' => Pages\EditBantuanSiswaMiskin::route('/{record}/edit'),
        ];
    }
}
