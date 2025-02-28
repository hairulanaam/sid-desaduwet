<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeografisDesaResource\Pages;
use App\Filament\Resources\GeografisDesaResource\RelationManagers;
use App\Models\GeografisDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class GeografisDesaResource extends Resource
{
    protected static ?string $model = GeografisDesa::class;

    protected static ?string $navigationGroup = 'Profil';
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function getSlug(): string
    {
        return 'profil/geografis-desa';
    }

    public static function getModelLabel(): string
    {
        return 'Geografis Desa';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Geografis Desa';
    }

    public static function form(Form $form): Forms\Form
{
    return $form
        ->schema([
            Forms\Components\Section::make('Informasi Sambutan')
                ->schema([
                    Forms\Components\TextInput::make('judul')
                        ->label('Judul')
                        ->required(),
                    
                    Forms\Components\TextArea::make('deskripsi')
                        ->label('Deskripsi')
                        ->required(),
                    
                    Forms\Components\FileUpload::make('gambar')
                        ->label('Gambar')
                        ->image()
                        ->directory('sambutan') //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGeografisDesas::route('/'),
            'create' => Pages\CreateGeografisDesa::route('/create'),
            'edit' => Pages\EditGeografisDesa::route('/{record}/edit'),
        ];
    }
}
