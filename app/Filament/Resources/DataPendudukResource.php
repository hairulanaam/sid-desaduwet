<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataPendudukResource\Pages;
use App\Filament\Resources\DataPendudukResource\RelationManagers;
use App\Models\DataPenduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataPendudukImport;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Carbon\Carbon;

class DataPendudukResource extends Resource
{
    protected static ?string $model = DataPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Master Data';

    public static function getSlug(): string
    {
        return '/master-data/data-penduduk';
    }

    public static function getModelLabel(): string
    {
        return 'Data Penduduk';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Data Penduduk';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Konversi tanggal lahir ke format yang sesuai
        $data['tanggal_lahir'] = Carbon::createFromFormat('d-m-Y', $data['tanggal_lahir'])->format('Y-m-d');
        return $data;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('no_kk')
                    ->label('No. KK')
                    ->required()
                    ->numeric()
                    ->maxLength(16),

                TextInput::make('nik')
                    ->label('NIK')
                    ->required()
                    ->numeric()
                    ->maxLength(16),

                TextInput::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),

                TextInput::make('kabupaten_kota')
                    ->label('Kabupaten/Kota')
                    ->required()
                    ->maxLength(255),

                DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->required()
                    ->format('d-m-Y') // Format tampilan tanggal
                    ->native(false),

                Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),

                Select::make('status_hubungan_dalam_keluarga')
                    ->label('Status Hubungan Dalam Keluarga')
                    ->options([
                        'KEPALA KELUARGA' => 'Kepala Keluarga',
                        'ISTRI' => 'Istri',
                        'ANAK' => 'Anak',
                    ])
                    ->required(),

                Select::make('status_perkawinan')
                    ->label('Status Perkawinan')
                    ->options([
                        'BELUM KAWIN' => 'Belum Kawin',
                        'KAWIN' => 'Kawin',
                        'CERAI HIDUP' => 'Cerai Hidup',
                        'CERAI MATI' => 'Cerai Mati',
                    ])
                    ->required(),

                Select::make('agama')
                    ->label('Agama')
                    ->options([
                        'ISLAM' => 'Islam',
                        'KRISTEN' => 'Kristen',
                        'KATOLIK' => 'Katolik',
                        'HINDU' => 'Hindu',
                        'BUDDHA' => 'Buddha',
                        'KONGHUCU' => 'Konghucu',
                    ])
                    ->required(),

                TextInput::make('pendidikan')
                    ->label('Pendidikan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('pekerjaan')
                    ->label('Pekerjaan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('ayah')
                    ->label('Nama Ayah')
                    ->required()
                    ->maxLength(255),

                TextInput::make('ibu')
                    ->label('Nama Ibu')
                    ->required()
                    ->maxLength(255),

                Textarea::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(500),

                TextInput::make('rt')
                    ->label('RT')
                    ->required()
                    ->numeric()
                    ->maxLength(3),

                TextInput::make('rw')
                    ->label('RW')
                    ->required()
                    ->numeric()
                    ->maxLength(3),

                TextInput::make('kecamatan')
                    ->label('Kecamatan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('desa_kelurahan')
                    ->label('Desa/Kelurahan')
                    ->required()
                    ->maxLength(255),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_kk')->label('No. KK'),
                Tables\Columns\TextColumn::make('nik')->label('NIK'),
                Tables\Columns\TextColumn::make('nama_lengkap')->label('Nama Lengkap'),
                Tables\Columns\TextColumn::make('tanggal_lahir')->label('Tanggal Lahir')->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d-m-Y')),
                Tables\Columns\TextColumn::make('jenis_kelamin')->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('status_hubungan_dalam_keluarga')->label('Status Hubungan Dalam Keluarga'),
                Tables\Columns\TextColumn::make('status_perkawinan')->label('Status Perkawinan'),
                Tables\Columns\TextColumn::make('agama')->label('Agama'),
                Tables\Columns\TextColumn::make('pendidikan')->label('Pendidikan'),
                Tables\Columns\TextColumn::make('pekerjaan')->label('Pekerjaan'),
                Tables\Columns\TextColumn::make('ayah')->label('Nama Ayah'),
                Tables\Columns\TextColumn::make('ibu')->label('Nama Ibu'),
                Tables\Columns\TextColumn::make('alamat')->label('Alamat'),
                Tables\Columns\TextColumn::make('rt')->label('RT'),
                Tables\Columns\TextColumn::make('rw')->label('RW'),
                Tables\Columns\TextColumn::make('kecamatan')->label('Kecamatan'),
                Tables\Columns\TextColumn::make('desa_kelurahan')->label('Desa/Kelurahan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Action::make('import')
                    ->label('Import Data')
                    ->modal()
                    ->modalHeading('Import Data Penduduk')
                    ->form([
                        FileUpload::make('file')
                            ->label('Pilih File Excel')
                            ->disk('local')
                            ->directory('uploads/excel')
                            ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'])
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        Excel::import(new DataPendudukImport, $data['file']);

                        Notification::make()
                            ->title('Berhasil')
                            ->body('Data berhasil diimport!')
                            ->success()
                            ->send();
                    }),
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
            'index' => Pages\ListDataPenduduks::route('/'),
            'create' => Pages\CreateDataPenduduk::route('/create'),
            'edit' => Pages\EditDataPenduduk::route('/{record}/edit'),
        ];
    }
}
