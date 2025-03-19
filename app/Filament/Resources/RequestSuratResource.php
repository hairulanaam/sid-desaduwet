<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RequestSuratResource\Pages;
use App\Filament\Resources\RequestSuratResource\RelationManagers;
use App\Models\RequestSurat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RequestSuratResource extends Resource
{
    protected static ?string $model = RequestSurat::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function getSlug(): string
    {
        return '/request-surat';
    }

    public static function getModelLabel(): string
    {
        return 'Request Surat';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Request Surat';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make() // Mengganti Card dengan Section
                    ->schema([
                        Forms\Components\TextInput::make('no_surat')
                            ->label('No. Surat')
                            ->disabled()
                            ->dehydrated(false)
                            ->required(),
                        Forms\Components\TextInput::make('nik')
                            ->label('NIK')
                            ->disabled()
                            ->dehydrated(false),
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama')
                            ->disabled()
                            ->dehydrated(false),
                        Forms\Components\Textarea::make('alamat')
                            ->label('Alamat')
                            ->disabled()
                            ->dehydrated(false)
                            ->rows(3),
                        Forms\Components\TextInput::make('jenis_surat')
                            ->label('Jenis Surat')
                            ->disabled()
                            ->dehydrated(false),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'diminta' => 'Diminta',
                                'diproses' => 'Diproses',
                                'selesai' => 'Selesai',
                                'diantar' => 'Diantar',
                            ])
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_surat')
                    ->label('No. Surat')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat'),
                Tables\Columns\TextColumn::make('jenis_surat')
                    ->label('Jenis Surat'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'diminta' => 'warning',
                        'diproses' => 'primary',
                        'selesai' => 'success',
                        'diantar' => 'info',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Permintaan')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'diminta' => 'Diminta',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'diantar' => 'Diantar',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListRequestSurats::route('/'),
            'create' => Pages\CreateRequestSurat::route('/create'),
            'edit' => Pages\EditRequestSurat::route('/{record}/edit'),
        ];
    }
}
