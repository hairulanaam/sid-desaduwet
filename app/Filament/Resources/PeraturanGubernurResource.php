<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeraturanGubernurResource\Pages;
use App\Filament\Resources\PeraturanGubernurResource\RelationManagers;
use App\Models\PeraturanGubernur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;


class PeraturanGubernurResource extends Resource
{
    protected static ?string $model = PeraturanGubernur::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    protected static ?string $navigationGroup = 'E-Doc';

    public static function getSlug(): string
    {
        return '/e-doc/peraturan-gubernur';
    }

    public static function getModelLabel(): string
    {
        return 'Peraturan Gubernur';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Peraturan Gubernur';
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
                    ->label('Peraturan Gubernur')
                    ->directory('peraturan_gubernur')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeraturanGubernurs::route('/'),
            'create' => Pages\CreatePeraturanGubernur::route('/create'),
            'edit' => Pages\EditPeraturanGubernur::route('/{record}/edit'),
        ];
    }
}
