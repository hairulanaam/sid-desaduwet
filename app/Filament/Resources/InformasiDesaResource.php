<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformasiDesaResource\Pages;
use App\Filament\Resources\InformasiDesaResource\RelationManagers;
use App\Models\InformasiDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InformasiDesaResource extends Resource
{
    protected static ?string $model = InformasiDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Beranda';
    public static function getPluralModelLabel(): string
    {
        return 'Informasi Desa';
    }
    public static function getSlug(): string
    {
        return 'beranda/informasi-desa';
    }

    public static function getModelLabel(): string
    {
        return 'Informasi Desa';
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->limit(1);
    }
    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_desa')
                    ->required()
                    ->label('Nama Desa')
                    ->maxLength(100),
                Forms\Components\TextInput::make('penduduk')
                    ->required()
                    ->label('Jumlah Penduduk')
                    ->numeric(),
                Forms\Components\TextInput::make('kepala_keluarga')
                    ->required()
                    ->label('Jumlah Kepala Keluarga')
                    ->numeric(),
                Forms\Components\TextInput::make('dusun')
                    ->required()
                    ->label('Jumlah Dusun')
                    ->numeric(),
                Forms\Components\TextInput::make('rt_rw')
                    ->required()
                    ->label('Jumlah RT/RW'),
                Forms\Components\TextInput::make('luas_wilayah')
                    ->required()
                    ->label('Luas Wilayah')
                    ->numeric(),
                Forms\Components\TextInput::make('peta_desa')
                    ->required()
                    ->label('Link Peta Desa')
                    ->maxLength(300),
                Forms\Components\TextInput::make('alamat_desa')
                    ->required()
                    ->label('Alamat Lengkap')
                    ->maxLength(100),
                Forms\Components\TextInput::make('telepon_desa')
                    ->required()
                    ->label('Nomer Telepon')
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_desa')
                    ->limit(15),  
                Tables\Columns\TextColumn::make('alamat_desa')
                    ->limit(80),  
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
            'index' => Pages\ListInformasiDesas::route('/'),
            'create' => Pages\CreateInformasiDesa::route('/create'),
            'edit' => Pages\EditInformasiDesa::route('/{record}/edit'),
        ];
    }
}
