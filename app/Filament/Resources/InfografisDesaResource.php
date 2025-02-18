<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfografisDesaResource\Pages;
use App\Models\InfografisDesa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Console\View\Components\Info;

class InfografisDesaResource extends Resource
{
    protected static ?string $model = InfografisDesa::class;
    protected static ?string $navigationGroup = 'APBDes';
    protected static ?string $navigationIcon = 'heroicon-o-document-currency-dollar';

    public static function getSlug(): string
    {
        return 'apbdes/infografis-desa';
    }

    public static function getModelLabel(): string
    {
        return 'Infografis Desa';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Infografis Desa';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('Gambar')
                    ->label('gambar')
                    ->directory('infografis_desa')
                    ->image()
                    ->maxSize(2048) // Max 2MB
                    ->required(),

                TextInput::make('Judul')
                    ->label('judul')
                    ->maxLength(255)
                    ->required(),

                Textarea::make('Deskripsi')
                    ->label('deskripsi')
                    ->rows(4)
                    ->required(),
                FileUpload::make('file_path')
                    ->label('Dokumen Infografis')
                    ->directory('infografis_desa')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->maxSize(5120)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('Gambar')
                    ->label('Gambar')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->Gambar)),

                TextColumn::make('Judul')
                    ->label('Judul Infografis')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('Deskripsi')
                    ->label('Deskripsi')
                    ->limit(50),

                TextColumn::make('file_path')
                    ->label('Dokumen')
                    ->formatStateUsing(fn ($state) => $state 
                        ? '<a href="'.asset('storage/'.$state).'" target="_blank" class="text-blue-500 underline">Download</a>' 
                        : 'Tidak Ada')
                    ->html(),

                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->label('Dibuat'),
            ])
            ->filters([])
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
            'index' => Pages\ListInfografisDesas::route('/'),
            'create' => Pages\CreateInfografisDesa::route('/create'),
            'edit' => Pages\EditInfografisDesa::route('/{record}/edit'),
        ];
    }
}
