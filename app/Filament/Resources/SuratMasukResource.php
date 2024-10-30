<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratMasukResource\Pages;
use App\Filament\Resources\SuratMasukResource\RelationManagers;
use App\Models\SuratMasuk;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class SuratMasukResource extends Resource
{
    protected static ?string $model = SuratMasuk::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Administrasi Surat';

    protected static ?string $navigationLabel = 'Surat Masuk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Section::make('Input Surat Masuk')
                    ->schema([
                        Select::make('category_id')
                            ->label('Jenis Surat')
                            ->relationship('category', 'name')
                            ->required(),
                        TextInput::make('no_agenda')
                            ->label('No Agenda')
                            ->required(),
                        DatePicker::make('date_agenda')
                            ->label('Tanggal Agenda')
                            ->required(),
                        DatePicker::make('date_letter')
                            ->label('Tanggal Surat')
                            ->required(),
                        TextInput::make('from')
                            ->label('Asal Surat')
                            ->required(),
                        TextInput::make('no_letter')
                            ->label('No Surat'),
                        TextInput::make('subject')
                            ->label('Perihal'),
                        TextInput::make('contact')
                            ->label('No Kontak'),
                        TextInput::make('address')
                            ->label('Alamat'),
                        FileUpload::make('file')
                            ->label('Upload File')
                            ->openable()
                            ->preserveFilenames()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id'),
                TextColumn::make('category.name')
                    ->label('Jenis Surat'),
                TextColumn::make('no_agenda')
                    ->label('No Agenda'),
                TextColumn::make('date_agenda')
                    ->label('Tanggal Agenda')
                    ->searchable(),
                TextColumn::make('date_letter')
                    ->label('Tanggal Surat'),
                TextColumn::make('from')
                    ->label('Asal Surat'),
                TextColumn::make('no_letter')
                    ->label('Nomor Surat'),
                TextColumn::make('subject')
                    ->label('Perihal'),
                TextColumn::make('contact')
                    ->label('Kontak'),
                TextColumn::make('address')
                    ->label('Alamat'),
                TextColumn::make('file')
                    ->label('File Upload'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListSuratMasuks::route('/'),
            'create' => Pages\CreateSuratMasuk::route('/create'),
            'edit' => Pages\EditSuratMasuk::route('/{record}/edit'),
        ];
    }
}
