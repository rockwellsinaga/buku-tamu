<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NonmemberResource\Pages;
use App\Filament\Resources\NonmemberResource\Widgets\StatsOverview;
use App\Models\Visitor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NonmemberResource extends Resource
{
    protected static ?string $model = Visitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Non Anggota';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('job_id')
                    ->label('Pekerjaan')
                    ->relationship('job', 'Pekerjaan')
                    ->required(),
                Forms\Components\Select::make('pendidikan_id')
                    ->label('Pendidikan')
                    ->relationship('education', 'Nama')
                    ->required(),
                Forms\Components\Select::make('gender_id')
                    ->label('Jenis Kelamin')
                    ->relationship('gender', 'Name')
                    ->required(),
                Forms\Components\Select::make('event_id')
                    ->label('Event')
                    ->relationship('event', 'Nama')
                    ->required(),
                Forms\Components\Textarea::make('Alamat')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('event.Nama')->label('Event')->sortable(),
                Tables\Columns\TextColumn::make('gender.Name')->label('Jenis Kelamin')->sortable(),
                Tables\Columns\TextColumn::make('job.Pekerjaan')->label('Pekerjaan')->sortable(),
                Tables\Columns\TextColumn::make('education.Nama')->label('Pendidikan')->sortable(),
                Tables\Columns\TextColumn::make('Alamat')->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Waktu Kunjungan')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListNonmembers::route('/'),
            'create' => Pages\CreateNonmember::route('/create'),
            'edit' => Pages\EditNonmember::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
