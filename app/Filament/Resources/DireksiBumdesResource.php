<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DireksiBumdesResource\Pages;
use App\Models\DireksiBumdes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class DireksiBumdesResource extends Resource
{
    protected static ?string $model = DireksiBumdes::class;
    protected static ?string $navigationGroup = 'Bumdes';
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function getSlug(): string
    {
        return 'bumdes/direksi-bumdes';
    }

    public static function getModelLabel(): string
    {
        return 'Direksi Bumdes';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Direksi Bumdes';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Direksi Bumdes')
                    ->schema([
                        FileUpload::make('gambar')
                            ->label('Foto')
                            ->directory('direksi_bumdes')
                            ->image()
                            ->maxSize(2048),

                        TextInput::make('judul')
                            ->label('Judul')
                            ->required(),

                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->required(),
                    ])
                    ->columns(1),

                Forms\Components\Section::make('Tambah Anggota')
                    ->schema([
                        Repeater::make('anggota')
                            ->label('Anggota Organisasi')
                            ->schema([
                                TextInput::make('nama_lengkap')
                                    ->label('Nama Lengkap')
                                    ->required(),

                                TextInput::make('sk_nomor')
                                    ->label('Nomor SK')
                                    ->required(),

                                DatePicker::make('sk_tanggal')
                                    ->label('Tanggal SK')
                                    ->required(),

                                TextInput::make('jabatan')
                                    ->label('Jabatan')
                                    ->required(),
                            ])
                            ->columns(2)
                            ->addActionLabel('Tambah Anggota'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                    ->disk('public')
                    ->label('Foto')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->gambar))
                    ->size(50),

                TextColumn::make('judul')
                    ->searchable()
                    ->limit(50)
                    ->label('Judul'),

                TextColumn::make('deskripsi')
                    ->searchable()
                    ->limit(50)
                    ->label('Deskripsi'),
                TextColumn::make('anggota_count')
                    ->label('Jumlah Anggota')
                    ->getStateUsing(fn ($record) => is_array($record->anggota) ? count($record->anggota) : 0),
                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->label('Dibuat'),
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
            'index' => Pages\ListDireksiBumdes::route('/'),
            'create' => Pages\CreateDireksiBumdes::route('/create'),
            'edit' => Pages\EditDireksiBumdes::route('/{record}/edit'),
        ];
    }
}
