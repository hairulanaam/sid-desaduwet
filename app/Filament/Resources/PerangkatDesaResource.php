<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerangkatDesaResource\Pages;
use App\Filament\Resources\PerangkatDesaResource\RelationManagers;
use App\Models\PerangkatDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerangkatDesaResource extends Resource
{
    protected static ?string $model = PerangkatDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Informasi Umum';
    public static function getPluralModelLabel(): string
    {
        return 'Perangkat Desa';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('nama')
                ->required()
                ->label('Nama Lengkap')
                ->maxLength(100),
            Forms\Components\TextInput::make('jabatan')
                ->required()
                ->label('Jabatan')
                ->maxLength(100),
            Forms\Components\FileUpload::make('foto')
                ->required()
                ->label('Foto')
                ->image()
                ->disk('public')
                ->directory('perangkatdesa_gambar')
                ->visibility('public')
                ->maxSize(5240) 
                ->helperText('Max size: 5MB, formats: jpg, png, jpeg') 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto') 
                    ->disk('public')
                    ->height(50) 
                    ->width(50)
                    ->url(fn ($record) => asset('storage/' . $record->foto)) // Pastikan URL benar
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->limit(20),  
                Tables\Columns\TextColumn::make('jabatan')
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
            'index' => Pages\ListPerangkatDesas::route('/'),
            'create' => Pages\CreatePerangkatDesa::route('/create'),
            'edit' => Pages\EditPerangkatDesa::route('/{record}/edit'),
        ];
    }
}
