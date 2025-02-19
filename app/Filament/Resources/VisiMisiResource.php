<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisiMisiResource\Pages;
use App\Models\VisiMisi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;


class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;
    protected static ?string $navigationGroup = 'Profil';
    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    public static function getSlug(): string
    {
        return 'visi_misi';
    }

    public static function getModelLabel(): string
    {
        return 'Visi & Misi';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Visi & Misi';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Visi & Misi')
                    ->schema([
                        TextInput::make('visi')
                            ->label('Visi')
                            ->required(),

                        Textarea::make('misi')
                            ->label('Misi')
                            ->required(),

                        FileUpload::make('file_path')
                            ->label('Dokumen Visi & Misi')
                            ->directory('visi_misi')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                            ->maxSize(5120)
                            ->required(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('visi')
                    ->searchable()
                    ->limit(50)
                    ->label('Visi'),

                TextColumn::make('misi')
                    ->searchable()
                    ->limit(50)
                    ->label('Misi'),

                // Tambahkan Kolom untuk File Path
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
            'index' => Pages\ListVisiMisis::route('/'),
            'create' => Pages\CreateVisiMisi::route('/create'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }
}
