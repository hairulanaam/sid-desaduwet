<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Publikasi';
    public static function getSlug(): string
    {
        return '/publikasi/agenda';
    }

    public static function getModelLabel(): string
    {
        return 'Agenda';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Agenda';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),

                Forms\Components\TimePicker::make('jam')
                    ->label('Jam')
                    ->required()
                    ->seconds(false) // Nonaktifkan detik
                    ->format('H:i') // Format 24 jam
                    ->native(false) // Gunakan tampilan custom jika ingin kompatibilitas lebih baik
                    ->placeholder('Masukkan jam (HH:MM)'),
                Forms\Components\Textarea::make('agenda')
                    ->label('Deskripsi Agenda')
                    ->required(),

                Forms\Components\TextInput::make('lokasi')
                    ->label('Lokasi')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('petugas')
                    ->label('Petugas')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date()
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->locale('id')->translatedFormat('l, d F Y'))
                    ->sortable(),

                    Tables\Columns\TextColumn::make('jam')
                    ->label('Jam')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('H:i') . ' WIB')
                    ->sortable(),                

                Tables\Columns\TextColumn::make('lokasi')
                    ->label('Lokasi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('petugas')
                    ->label('Petugas')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}
