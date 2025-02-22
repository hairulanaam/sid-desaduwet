<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerangkatDesaResource\Pages;
use App\Models\PerangkatDesa;
use App\Models\Sejarah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;


class PerangkatDesaResource extends Resource
{
    protected static ?string $model = PerangkatDesa::class;
    protected static ?string $navigationGroup = 'Profil';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getSlug(): string
    {
        return 'profil/perangkat-desa';
    }

    public static function getModelLabel(): string
    {
        return 'Perangkat Desa';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Perangkat Desa';
    }

    public static function form(Forms\Form $form): Forms\Form
{
    return $form
        ->schema([
            Forms\Components\Section::make('Informasi Perangkat Desa')
                ->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('nama')
                        ->required(),
                    
                    Forms\Components\TextInput::make('jabatan')
                        ->label('jabatan')
                        ->required(),
                    
                    Forms\Components\FileUpload::make('gambar')
                        ->label('Gambar')
                        ->image()
                        ->directory('perangkat_desa') // Folder di storage/app/public/sejarah
                        ->maxSize(2048) // Maksimal 2MB
                        ->required(),
                ])
                ->columns(1), // Menyusun semua elemen dalam satu kolom
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('gambar')
                ->disk('public') // Pastikan menggunakan disk 'public'
                ->label('Gambar')
                ->getStateUsing(fn ($record) => asset('storage/' . $record->gambar)), // Ambil URL dengan asset()
            TextColumn::make('nama')
                ->searchable(),
            TextColumn::make('jabatan')
                ->limit(50),
            TextColumn::make('created_at')
                ->dateTime('d M Y H:i')
                ->label('Dibuat'),
        ])
            ->filters([
                //
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
            'index' => Pages\ListPerangkatDesas::route('/'),
            'create' => Pages\CreatePerangkatDesa::route('/create'),
            'edit' => Pages\EditPerangkatDesa::route('/{record}/edit'),
        ];
    }
}