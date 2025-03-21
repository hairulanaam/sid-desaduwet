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
            TextInput::make('masjid')
                ->label('Masjid')
                ->maxLength(255),

            TextInput::make('mushalla')
                ->label('Mushalla')
                ->maxLength(255),

            TextInput::make('pemakaman')
                ->label('Pemakaman')
                ->maxLength(255),

            TextInput::make('paud')
                ->label('PAUD')
                ->maxLength(255),

            TextInput::make('tk')
                ->label('TK')
                ->maxLength(255),

            TextInput::make('sd')
                ->label('SD')
                ->maxLength(255),

            TextInput::make('smp')
                ->label('SMP')
                ->maxLength(255),

            TextInput::make('pondok_pesantren')
                ->label('Pondok Pesantren')
                ->maxLength(255),

            TextInput::make('lembaga_kursus')
                ->label('Lembaga Kursus')
                ->maxLength(255),

            TextInput::make('lapangan_sepak_bola')
                ->label('Lapangan Sepak Bola')
                ->maxLength(255),

            TextInput::make('poskesdes')
                ->label('Poskesdes')
                ->maxLength(255),

            TextInput::make('posyandu')
                ->label('Posyandu')
                ->maxLength(255),

            TextInput::make('balai_desa')
                ->label('Balai Desa')
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
                TextColumn::make('id')->label('No')->sortable(),
                TextColumn::make('masjid')->label('Masjid')->searchable(),
                TextColumn::make('mushalla')->label('Mushalla')->searchable(),
                TextColumn::make('pemakaman')->label('Pemakaman')->searchable(),
                TextColumn::make('paud')->label('PAUD')->searchable(),
                TextColumn::make('tk')->label('TK')->searchable(),
                TextColumn::make('sd')->label('SD')->searchable(),
                TextColumn::make('smp')->label('SMP')->searchable(),
                TextColumn::make('pondok_pesantren')->label('Pondok Pesantren')->searchable(),
                TextColumn::make('lembaga_kursus')->label('Lembaga Kursus')->searchable(),
                TextColumn::make('lapangan_sepak_bola')->label('Lapangan Sepak Bola')->searchable(),
                TextColumn::make('poskesdes')->label('Poskesdes')->searchable(),
                TextColumn::make('posyandu')->label('Posyandu')->searchable(),
                TextColumn::make('balai_desa')->label('Balai Desa')->searchable(),
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