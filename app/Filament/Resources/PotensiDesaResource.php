<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PotensiDesaResource\Pages;
use App\Filament\Resources\PotensiDesaResource\RelationManagers;
use App\Models\PotensiDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PotensiDesaResource extends Resource
{
    protected static ?string $model = PotensiDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Informasi Umum';
    public static function getPluralModelLabel(): string
    {
        return 'Potensi Desa';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('bidang')
                ->required()
                ->label('Jenis Bidang')
                ->maxLength(100),
            Forms\Components\TextInput::make('deskripsi')
                ->required()
                ->label('Deskripsi')
                ->maxLength(100),
            Forms\Components\FileUpload::make('gambar')
                ->required()
                ->label('Gambar')
                ->image()
                ->disk('public')
                ->directory('potensidesa_gambar')
                ->visibility('public')
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
                    ->url(fn ($record) => asset('storage/' . $record->foto)) // Pastikan URL benar
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('bidang')
                    ->searchable()
                    ->limit(20),  
                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable()
                    ->limit(length: 20),  
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
            'index' => Pages\ListPotensiDesas::route('/'),
            'create' => Pages\CreatePotensiDesa::route('/create'),
            'edit' => Pages\EditPotensiDesa::route('/{record}/edit'),
        ];
    }
}
