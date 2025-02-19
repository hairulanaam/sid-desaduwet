<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LembagaDesaResource\Pages;
use App\Models\LembagaDesa;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LembagaDesaResource extends Resource
{
    protected static ?string $model = LembagaDesa::class;
    protected static ?string $navigationGroup = 'Profil';
    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    public static function getSlug(): string
    {
        return 'profil/lembaga-desa';
    }

    public static function getModelLabel(): string
    {
        return 'Lembaga Desa';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Lembaga Desa';
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('judul')
                ->label('Judul')
                ->required()
                ->maxLength(255),

            Textarea::make('deskripsi') // Gunakan Textarea untuk teks panjang
                ->label('Deskripsi')
                ->required()
                ->maxLength(1000),

            Repeater::make('anggota')
                ->label('Anggota Lembaga')
                ->relationship('anggota') // Pastikan model memiliki relasi anggota()
                ->schema([
                    TextInput::make('nama')->label('Nama')->required(),
                    TextInput::make('agama')->label('Agama')->required(),
                    TextInput::make('jabatan')->label('Jabatan')->required(),
                    TextInput::make('kontak')->label('Kontak')->required(),
                ])
                ->columns(4) // Agar tampil rapi dalam 4 kolom
                ->addActionLabel('Tambah Anggota'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->label('No')->sortable(),
            TextColumn::make('judul')->label('Judul')->searchable(),
            TextColumn::make('deskripsi')->label('Deskripsi')->limit(50), // Batasi teks panjang

            TextColumn::make('anggota_count') // Pastikan model memiliki relasi anggota
                ->label('Jumlah Anggota')
                ->counts('anggota') // Pastikan `anggota` adalah HasMany
                ->sortable(),
        ])
        ->filters([
            // Tambahkan filter jika diperlukan
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLembagaDesas::route('/'),
            'create' => Pages\CreateLembagaDesa::route('/create'),
            'edit' => Pages\EditLembagaDesa::route('/{record}/edit'),
        ];
    }
}
