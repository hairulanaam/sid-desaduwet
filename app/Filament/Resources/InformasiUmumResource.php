<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformasiUmumResource\Pages;
use App\Filament\Resources\InformasiUmumResource\RelationManagers;
use App\Models\InformasiUmum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

use Filament\Forms\Components\KeyValue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InformasiUmumResource extends Resource
{
    protected static ?string $model = InformasiUmum::class;

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

    public function getTabelAttribute($value)
    {
        return $value ? json_decode($value, true) : ['header' => [], 'rows' => []];
    }

    public function setTabelAttribute($value)
    {
        $this->setAttribute('tabel', json_encode($value));
    }



    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Profil';

    public static function form(Forms\Form $form): Forms\Form
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
                    ->cols(100)
                    ->required(),

                FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->directory('informasi_umum'),

                // Form untuk Header
                Section::make('Tabel Informasi')
                    ->schema([
                        // Header Tabel (Kolom Dinamis)
                        Repeater::make('tabel.header')
                            ->label('Header Tabel')
                            ->schema([
                                TextInput::make('nama_kolom')->label('Nama Kolom'),
                            ])
                            ->grid(3)
                            ->columnSpanFull()
                            ->afterStateHydrated(fn($state, Forms\Set $set) => $set('tabel.header', collect($state)->map(fn($col) => ['nama_kolom' => $col])->toArray()))
                            ->dehydrateStateUsing(fn($state) => collect($state)->pluck('nama_kolom')->toArray()),


                        // Data Rows (Menyesuaikan dengan Header)
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
                            ->afterStateHydrated(
                                fn($state, Forms\Set $set) =>
                                $set('tabel.rows', collect($state)->map(fn($row) => [
                                    'data' => collect($row)->map(fn($value) => ['value' => $value])->toArray()
                                ])->toArray())
                            )
                            ->dehydrateStateUsing(
                                fn($state) =>
                                collect($state)->map(fn($row) => collect($row['data'])->pluck('value')->toArray())->toArray()
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
                    ->disk('public') // Pastikan menggunakan disk 'public'
                    ->label('Gambar')
                    ->getStateUsing(fn($record) => asset('storage/' . $record->gambar)), // Ambil URL dengan asset()
                TextColumn::make('tabel')
                    ->label('Tabel')
                    ->formatStateUsing(fn($state) => json_encode($state, JSON_PRETTY_PRINT))
                    ->limit(100) // Batasi panjang teks agar tidak terlalu panjang
                    ->tooltip(fn($state) => json_encode($state, JSON_PRETTY_PRINT))
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
            'index' => Pages\ListInformasiUmums::route('/'),
            'create' => Pages\CreateInformasiUmum::route('/create'),
            'edit' => Pages\EditInformasiUmum::route('/{record}/edit'),
        ];
    }
}
