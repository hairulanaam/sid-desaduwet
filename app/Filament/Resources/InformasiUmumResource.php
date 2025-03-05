<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformasiUmumResource\Pages;
use App\Models\InformasiUmum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Model;

class InformasiUmumResource extends Resource
{
    protected static ?string $model = InformasiUmum::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Profil';

    public static function getSlug(): string
    {
        return '/profil/informasi-umum';
    }

    public static function getModelLabel(): string
    {
        return 'Informasi Umum';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Informasi Umum';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(10)
                    ->required(),

                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->directory('informasi_umum'),

                    Section::make('Tabel Informasi')
                    ->schema([
                        // Input untuk menentukan header kolom tabel
                        Repeater::make('tabel.header')
                            ->label('Header Tabel')
                            ->schema([
                                TextInput::make('nama_kolom')->label('Nama Kolom'),
                            ])
                            ->grid(3)
                            ->columnSpanFull()
                            ->afterStateUpdated(fn ($state, callable $set) => 
                                $set('tabel.header', empty($state) ? null : $state)
                            ),
                
                        // Input untuk mengisi data tabel dengan jumlah kolom yang fleksibel
                        Repeater::make('tabel.rows')
                            ->label('Data Baris')
                            ->schema([
                                Repeater::make('data')
                                    ->label('Isi Baris')
                                    ->schema([
                                        TextInput::make('value')->label('Data'),
                                    ])
                                    ->grid(3),
                            ])
                            ->collapsed()
                            ->grid(1)
                            ->columnSpanFull()
                            ->afterStateUpdated(fn ($state, callable $set) => 
                                $set('tabel.rows', empty($state) ? null : $state)
                            ),
                    ])                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->label('Judul')->sortable()->searchable(),
                TextColumn::make('deskripsi')->label('Deskripsi')->limit(50),
                ImageColumn::make('gambar')
                    ->disk('public')
                    ->label('Gambar')
                    ->getStateUsing(fn(Model $record) => asset('storage/' . $record->gambar)),
                TextColumn::make('tabel_count')
                    ->label('Jumlah Baris Tabel')
                    ->getStateUsing(fn($record) => isset($record->tabel['rows']) && is_array($record->tabel['rows']) ? count($record->tabel['rows']) : 0)
                    ->sortable(),
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInformasiUmums::route('/'),
            'create' => Pages\CreateInformasiUmum::route('/create'),
            'edit' => Pages\EditInformasiUmum::route('/{record}/edit'),
        ];
    }
}
