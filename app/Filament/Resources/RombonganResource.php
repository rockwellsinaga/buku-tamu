<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RombonganResource\Pages;
use App\Filament\Resources\RombonganResource\Widgets\StatsOverview;
use App\Models\GroupVisit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RombonganResource extends Resource
{
    protected static ?string $model = GroupVisit::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Rombongan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('NamaKetua')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('NomerTelponKetua')
                    ->maxLength(20),
                Forms\Components\TextInput::make('AsalInstansi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('AlamatInstansi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('event_id')
                    ->label('Event')
                    ->relationship('event', 'Nama')
                    ->required(),
                Forms\Components\TextInput::make('JumlahPersonil')
                    ->label('Jumlah Personil')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('JumlahPNS')
                    ->label('Jumlah PNS')->numeric(),
                Forms\Components\TextInput::make('JumlahPSwasta')
                    ->label('Jumlah Pegawai Swasta')->numeric(),
                Forms\Components\TextInput::make('JumlahPeneliti')
                    ->label('Jumlah Peneliti')->numeric(),
                Forms\Components\TextInput::make('JumlahGuru')
                    ->label('Jumlah Guru')->numeric(),
                Forms\Components\TextInput::make('JumlahDosen')
                    ->label('Jumlah Dosen')->numeric(),
                Forms\Components\TextInput::make('JumlahPensiunan')
                    ->label('Jumlah Pensiunan')->numeric(),
                Forms\Components\TextInput::make('JumlahTNI')
                    ->label('Jumlah TNI')->numeric(),
                Forms\Components\TextInput::make('JumlahWiraswasta')
                    ->label('Jumlah Wiraswasta')->numeric(),
                Forms\Components\TextInput::make('JumlahPelajar')
                    ->label('Jumlah Pelajar')->numeric(),
                Forms\Components\TextInput::make('JumlahMahasiswa')
                    ->label('Jumlah Mahasiswa')->numeric(),
                Forms\Components\TextInput::make('JumlahLainnya')
                    ->label('Jumlah Lainnya')->numeric(),
                Forms\Components\TextInput::make('JumlahSD')
                    ->label('Jumlah SD')->numeric(),
                Forms\Components\TextInput::make('JumlahSMP')
                    ->label('Jumlah SMP')->numeric(),
                Forms\Components\TextInput::make('JumlahSMA')
                    ->label('Jumlah SMA')->numeric(),
                Forms\Components\TextInput::make('JumlahD1')
                    ->label('Jumlah D1')->numeric(),
                Forms\Components\TextInput::make('JumlahD2')
                    ->label('Jumlah D2')->numeric(),
                Forms\Components\TextInput::make('JumlahD3')
                    ->label('Jumlah D3')->numeric(),
                Forms\Components\TextInput::make('JumlahS1')
                    ->label('Jumlah S1')->numeric(),
                Forms\Components\TextInput::make('JumlahS2')
                    ->label('Jumlah S2')->numeric(),
                Forms\Components\TextInput::make('JumlahS3')
                    ->label('Jumlah S3')->numeric(),
                Forms\Components\TextInput::make('JumlahLaki')
                    ->label('Jumlah Laki-Laki')->numeric(),
                Forms\Components\TextInput::make('JumlahPerempuan')
                    ->label('Jumlah Perempuan')->numeric(),
                Forms\Components\TextInput::make('TeleponInstansi')
                    ->maxLength(20),
                Forms\Components\TextInput::make('EmailInstansi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('Information')
                    ->maxLength(255),
                Forms\Components\TextInput::make('NoPengunjung')
                    ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('NamaKetua'),
                Tables\Columns\TextColumn::make('event.Nama')->label('Event')->sortable(),
                Tables\Columns\TextColumn::make('NomerTelponKetua')
                    ->label('Nomor Telepon Ketua'),
                Tables\Columns\TextColumn::make('AsalInstansi')
                    ->label('Asal Instansi'),
                Tables\Columns\TextColumn::make('AlamatInstansi'),
                Tables\Columns\TextColumn::make('JumlahPersonil')
                    ->label('Jumlah Personil'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Kunjungan')
                    ->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRombongans::route('/'),
            'create' => Pages\CreateRombongan::route('/create'),
            'edit' => Pages\EditRombongan::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
