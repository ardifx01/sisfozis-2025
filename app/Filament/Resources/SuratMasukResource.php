<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratMasukResource\Pages;
use App\Filament\Resources\SuratMasukResource\RelationManagers;
use App\Models\SuratMasuk;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset as ComponentsFieldset;
use Filament\Infolists\Components\Section as ComponentsSection;
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

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'e-Arsip';

    protected static ?string $navigationLabel = 'Surat Masuk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make([
                    Fieldset::make('Agenda Surat')
                        ->schema([
                            TextInput::make('no_agenda')
                                ->label('No Agenda')
                                ->required(),
                            Select::make('category_id')
                                ->label('Jenis Surat')
                                ->relationship('category', 'name')
                                ->required(),
                            DatePicker::make('date_agenda')
                                ->label('Tanggal Agenda')
                                ->required()
                                ->native(false)
                                ->displayFormat('Y/m/d')
                                ->prefixIcon('heroicon-o-calendar'),
                            DatePicker::make('date_letter')
                                ->label('Tanggal Surat')
                                ->required()
                                ->native(false)
                                ->displayFormat('Y/m/d')
                                ->prefixIcon('heroicon-o-calendar'),
                        ]),
                    Fieldset::make('Detail Surat')
                        ->schema([
                            TextInput::make('sender')
                                ->label('Asal Surat')
                                ->required(),
                            TextInput::make('no_letter')
                                ->label('No Surat'),
                            TextInput::make('contact')
                                ->label('No Kontak'),
                            TextInput::make('address')
                                ->label('Alamat'),
                            Textarea::make('subject')
                                ->columnSpan(2)
                                ->label('Perihal'),
                            FileUpload::make('file')
                                ->label('Upload File')
                                ->openable()
                                ->preserveFilenames()
                                ->columnSpan(2)
                        ]),

                    Fieldset::make('Disposisi Surat')
                        ->schema([
                            Select::make('dept_disposition')
                                ->label('Disposisi Bagian')
                                ->options([
                                    'pengumpulan' => 'Pengumpulan',
                                    'pendistribusian' => 'Pendistribusian',
                                    'pendayagunaan' => 'Pendayagunaan',
                                    'Keuangan' => 'Perencanaan,Keuangan dan Pelaporan',
                                    'sdm' => 'Sumber Daya Manusia (SDM)',
                                    'umum' => 'Umum dan HUMAS'
                                ]),
                            Textarea::make('desc_disposition')
                                ->label('Keterangan Disposisi')
                        ])
                ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id'),
                TextColumn::make('category.name')
                    ->sortable()
                    ->label('Jenis Surat'),
                TextColumn::make('no_agenda')
                    ->sortable()
                    ->searchable()
                    ->label('No Agenda'),
                TextColumn::make('date_agenda')
                    ->sortable()
                    ->label('Tanggal Agenda'),
                TextColumn::make('date_letter')
                    ->sortable()
                    ->label('Tanggal Surat'),
                TextColumn::make('sender')
                    ->sortable()
                    ->searchable()
                    ->label('Asal Surat'),
                TextColumn::make('no_letter')
                    ->sortable()
                    ->searchable()
                    ->label('Nomor Surat'),
                TextColumn::make('subject')
                    ->sortable()
                    ->searchable()
                    ->label('Perihal'),
                TextColumn::make('contact')
                    ->sortable()
                    ->label('Kontak'),
                TextColumn::make('address')
                    ->sortable()
                    ->searchable()
                    ->label('Alamat'),
                TextColumn::make('dept_disposition')
                    ->sortable()
                    ->label('Disposisi Bagian'),
                TextColumn::make('desc_disposition')
                    ->sortable()
                    ->label('Keterangan Disposisi'),
                TextColumn::make('file')
                    ->sortable()
                    ->label('File Upload'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum ada data surat masuk')
            ->emptyStateDescription('Input data surat masuk terlebih dahulu.')
            ->defaultSort('no_agenda', 'desc');
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
