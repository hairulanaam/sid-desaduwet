<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Filament\Resources\BeritaResource\RelationManagers;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Informasi Umum';

    public static function getPluralModelLabel(): string
    {
        return 'Berita Desa';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('judul')
                ->required()
                ->label('Judul')
                ->maxLength(100),
            Forms\Components\DatePicker::make('tanggal_publish')
                ->required()
                ->label('Tanggal Publikasi')
                ->maxDate(now()),
            Forms\Components\TextInput::make('deskripsi')
                ->required()
                ->label('Deskripsi')
                ->maxLength(300),
            Forms\Components\FileUpload::make('gambar')
                ->required()
                ->label('Dokumentasi')
                ->image()
                ->disk('public')
                ->directory('berita_gambar')
                ->maxSize(5240) 
                ->helperText('Max size: 5MB, formats: jpg, png, jpeg') 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar') 
                    ->disk('public')
                    ->height(50) 
                    ->width(50)
                    ->url(fn ($record) => asset('storage/' . $record->gambar)),
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->limit(15),  
                Tables\Columns\TextColumn::make('tanggal_publish'),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(30),  
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
