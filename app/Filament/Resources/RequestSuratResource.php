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
use Filament\Notifications\Notification;

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
                Forms\Components\Section::make()
                    ->schema([
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
                        Forms\Components\TextInput::make('nomor_telepon')
                            ->label('Nomor Telepon')
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
                            ->required()
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
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
                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->label('Nomor Telepon'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Permintaan')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->locale('id')->translatedFormat('l, d F Y')),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->locale('id')->translatedFormat('l, d F Y  H:i')),
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

                // Aksi untuk mengubah status ke diproses dan kirim notifikasi
                Tables\Actions\Action::make('prosesSurat')
                    ->label('Proses Surat')
                    ->icon('heroicon-o-arrow-path')
                    ->color('primary')
                    ->requiresConfirmation()
                    ->modalHeading('Proses Surat Ini')
                    ->modalDescription('Apakah Anda yakin ingin memproses surat ini dan mengirim notifikasi ke pemohon?')
                    ->modalSubmitActionLabel('Ya, Proses')
                    ->action(function (RequestSurat $record) {
                        $record->status = 'diproses';
                        $record->save();

                        self::kirimNotifikasiWA(
                            $record,
                            "Yth. {$record->nama},\n\n" .
                                "{$record->jenis_surat} sedang dalam proses.\n" .
                                "Kami akan menginformasikan kembali ketika surat sudah selesai.\n\n" .
                                "Terima kasih atas kesabaran Anda."
                        );

                        Notification::make()
                            ->title('Surat sedang diproses')
                            ->body('Status diubah menjadi "Diproses" dan notifikasi WA dikirim')
                            ->success()
                            ->send();
                    })
                    ->visible(fn($record) => $record->status === 'diminta'),

                // Aksi untuk mengirim notifikasi WA saat surat selesai
                Tables\Actions\Action::make('kirimNotifikasiSelesai')
                    ->label('Selesai')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Konfirmasi Penyelesaian Surat')
                    ->modalDescription('Apakah surat ini sudah selesai diproses dan ingin mengirim notifikasi WA?')
                    ->modalSubmitActionLabel('Ya, Selesai')
                    ->action(function (RequestSurat $record) {
                        $record->status = 'selesai';
                        $record->save();

                        self::kirimNotifikasiWA(
                            $record,
                            "Yth. {$record->nama},\n\n" .
                                "{$record->jenis_surat} telah selesai diproses.\n" .
                                "Anda dapat mengambilnya di kantor kami selama jam kerja.\n\n" .
                                "Terima kasih."
                        );

                        Notification::make()
                            ->title('Surat selesai diproses')
                            ->body('Status diubah menjadi "Selesai" dan notifikasi WA dikirim')
                            ->success()
                            ->send();
                    })
                    ->visible(fn($record) => $record->status === 'diproses'),

                // Aksi untuk mengirim notifikasi WA saat surat diantar
                Tables\Actions\Action::make('kirimNotifikasiDiantar')
                    ->label('Antar')
                    ->icon('heroicon-o-truck')
                    ->color('info')
                    ->requiresConfirmation()
                    ->modalHeading('Konfirmasi Pengantaran Surat')
                    ->modalDescription('Apakah surat ini akan diantar dan ingin mengirim notifikasi WA?')
                    ->modalSubmitActionLabel('Ya, Antar')
                    ->action(function (RequestSurat $record) {
                        $record->status = 'diantar';
                        $record->save();

                        self::kirimNotifikasiWA(
                            $record,
                            "Yth. {$record->nama},\n\n" .
                                "{$record->jenis_surat} sedang dalam proses pengantaran.\n" .
                                "Harap bersiap untuk menerimanya.\n\n" .
                                "Terima kasih."
                        );

                        Notification::make()
                            ->title('Surat sedang diantar')
                            ->body('Status diubah menjadi "Diantar" dan notifikasi WA dikirim')
                            ->success()
                            ->send();
                    })
                    ->visible(fn($record) => $record->status === 'selesai'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    // Fungsi untuk mengirim notifikasi WA dengan pesan dinamis
    protected static function kirimNotifikasiWA(RequestSurat $requestSurat, string $pesan)
    {
        $nomorTelepon = $requestSurat->nomor_telepon;

        // Format nomor telepon
        $nomorTelepon = preg_replace('/^\+/', '', $nomorTelepon);
        $nomorTelepon = preg_replace('/^0/', '62', $nomorTelepon);

        // Encode pesan untuk URL
        $pesanEncoded = urlencode($pesan);

        // Buat link WA
        $waLink = "https://wa.me/{$nomorTelepon}?text={$pesanEncoded}";

        // Buka link WA di tab baru
        return redirect()->away($waLink);
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
