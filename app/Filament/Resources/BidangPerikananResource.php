<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BidangPerikananResource\Pages;
use App\Models\BidangPerikanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class BidangPerikananResource extends Resource
{
    protected static ?string $model = BidangPerikanan::class;
    protected static ?string $navigationGroup = 'Potensi Desa';
    protected static ?string $navigationIcon = 'heroicon-o-eye-dropper';

    public static function getSlug(): string
    {
        return 'potensi-desa/bidang-perikanan';
    }

    public static function getModelLabel(): string
    {
        return 'Bidang Perikanan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Bidang Perikanan';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Bidang Perikanan')
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
                            ->disk('public')
                            ->directory('bidang_perikanan')
                            ->maxSize(2048) // Maksimal 2MB
                            ->required(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->gambar)),
                    
                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->wrap(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBidangPerikanans::route('/'),
            'create' => Pages\CreateBidangPerikanan::route('/create'),
            'edit' => Pages\EditBidangPerikanan::route('/{record}/edit'),
        ];
    }
}
