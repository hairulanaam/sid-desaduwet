<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UndangUndangResource\Pages;
use App\Models\UndangUndang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;

class UndangUndangResource extends Resource
{
    protected static ?string $model = UndangUndang::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'E-Doc';

    public static function getSlug(): string
    {
        return '/e-doc/undang-undang';
    }

    public static function getModelLabel(): string
    {
        return 'Undang Undang';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Undang Undang';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_data')
                    ->label('Nama Data')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),

                FileUpload::make('file_path')
                    ->label('Undang Undang')
                    ->directory('undang_undang')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->maxSize(5120)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_data')
                    ->label('Nama Data')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date()
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->locale('id')->translatedFormat('l, d F Y'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('file_path')
                    ->label('Nama File')
                    ->formatStateUsing(fn($state) => basename($state)),

                Tables\Columns\TextColumn::make('file_url')
                    ->label('Tindakan')
                    ->formatStateUsing(
                        fn($state, $record) =>
                        '<a href="' . $record->file_url . '" target="_blank">Tampilkan</a> | 
                         <a href="' . $record->file_url . '" download>Download</a>'
                    )->html(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUndangUndangs::route('/'),
            'create' => Pages\CreateUndangUndang::route('/create'),
            'edit' => Pages\EditUndangUndang::route('/{record}/edit'),
        ];
    }
}
