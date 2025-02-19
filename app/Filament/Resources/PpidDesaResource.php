<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PpidDesaResource\Pages;
use App\Models\PpidDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PpidDesaResource extends Resource
{
    protected static ?string $model = PpidDesa::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Publikasi';
    
    public static function getSlug(): string
    {
        return '/publikasi/ppid-desa';
    }

    public static function getModelLabel(): string
    {
        return 'PPID Desa';
    }

    public static function getPluralModelLabel(): string
    {
        return 'PPID Desa';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->directory('ppid_desa')
                    ->nullable(),
                
                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),
                
                Forms\Components\TextInput::make('penulis')
                    ->label('Penulis')
                    ->required()
                    ->maxLength(100),
                
                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required(),
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
                
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->gambar)), // Ambil URL dengan asset()
                
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->locale('id')->translatedFormat('l, d F Y'))
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('penulis')
                    ->label('Penulis')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50),
            ])
            ->filters([
                Tables\Filters\Filter::make('tanggal')
                    ->form([
                        Forms\Components\DatePicker::make('from'),
                        Forms\Components\DatePicker::make('to'),
                    ])
                    ->query(fn ($query, $data) => $query
                        ->when($data['from'], fn ($query) => $query->where('tanggal', '>=', $data['from']))
                        ->when($data['to'], fn ($query) => $query->where('tanggal', '<=', $data['to']))),
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
            'index' => Pages\ListPpidDesas::route('/'),
            'create' => Pages\CreatePpidDesa::route('/create'),
            'edit' => Pages\EditPpidDesa::route('/{record}/edit'),
        ];
    }
}
