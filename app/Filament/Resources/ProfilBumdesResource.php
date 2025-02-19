<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilBumdesResource\Pages;
use App\Models\ProfilBumdes;
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


class ProfilBumdesResource extends Resource
{
    protected static ?string $model = ProfilBumdes::class;
    protected static ?string $navigationGroup = 'Bumdes';
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function getSlug(): string
    {
        return 'bumdes/profil-bumdes';
    }

    public static function getModelLabel(): string
    {
        return 'Profil Bumdes';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Profil Bumdes';
    }

    public static function form(Forms\Form $form): Forms\Form
{
    return $form
        ->schema([
            Forms\Components\Section::make('Informasi Profil Bumdes')
                ->schema([
                    Forms\Components\TextInput::make('judul')
                        ->label('Judul')
                        ->required(),
                    
                    Forms\Components\TextInput::make('deskripsi')
                        ->label('Deskripsi')
                        ->required(),
                    
                    Forms\Components\FileUpload::make('gambar')
                        ->label('Gambar')
                        ->image()
                        ->directory('profil_bumdes') //
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
            TextColumn::make('judul')
                ->searchable(),
            TextColumn::make('deskripsi')
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
            'index' => Pages\ListProfilBumdes::route('/'),
            'create' => Pages\CreateProfilBumdes::route('/create'),
            'edit' => Pages\EditProfilBumdes::route('/{record}/edit'),
        ];
    }
}
