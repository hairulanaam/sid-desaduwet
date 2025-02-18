<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoKegiatanResource\Pages;
use App\Filament\Resources\VideoKegiatanResource\RelationManagers;
use App\Models\VideoKegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VideoKegiatanResource extends Resource
{
    protected static ?string $model = VideoKegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    protected static ?string $navigationGroup = 'Publikasi';
    
    public static function getSlug(): string
    {
        return 'video-kegiatan';
    }

    public static function getModelLabel(): string
    {
        return 'Video Kegiatan';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Video Kegiatan';
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
                
                Forms\Components\TextInput::make('sumber')
                    ->label('Sumber')
                    ->required()
                    ->maxLength(100),
                
                Forms\Components\Textarea::make('url')
                    ->label('Url Video')
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
                
                Tables\Columns\TextColumn::make('sumber')
                    ->label('Sumber')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('url')
                    ->label('Url Video')
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVideoKegiatans::route('/'),
            'create' => Pages\CreateVideoKegiatan::route('/create'),
            'edit' => Pages\EditVideoKegiatan::route('/{record}/edit'),
        ];
    }
}
