<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PetaDesaResource\Pages;
use App\Models\PetaDesa;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PetaDesaResource extends Resource
{
    protected static ?string $model = PetaDesa::class;
    protected static ?string $navigationGroup = 'Profil';
    protected static ?string $navigationIcon = 'heroicon-o-map';

    public static function getSlug(): string
    {
        return 'profil/peta-desa';
    }

    public static function getModelLabel(): string
    {
        return 'Peta Desa';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Peta Desa';
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->label('Nama')
                ->required()
                ->maxLength(255),

            TextInput::make('agama')
                ->label('Agama')
                ->required()
                ->maxLength(50),

            TextInput::make('jabatan')
                ->label('Jabatan')
                ->required()
                ->maxLength(255),

            TextInput::make('kontak')
                ->label('Kontak')
                ->required()
                ->maxLength(20),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->label('No')->sortable(),
            TextColumn::make('nama')->label('Nama')->searchable(),
            TextColumn::make('agama')->label('Agama'),
            TextColumn::make('jabatan')->label('Jabatan'),
            TextColumn::make('kontak')->label('Kontak'),
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
            'index' => Pages\ListPetaDesas::route('/'),
            'create' => Pages\CreatePetaDesa::route('/create'),
            'edit' => Pages\EditPetaDesa::route('/{record}/edit'),
        ];
    }
}