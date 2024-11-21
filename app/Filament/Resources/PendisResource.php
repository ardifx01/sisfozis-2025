<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PendisResource\Pages;
use App\Filament\Resources\PendisResource\RelationManagers;
use App\Models\Pendis;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;
use Symfony\Contracts\Service\Attribute\Required;

class PendisResource extends Resource
{
    protected static ?string $model = Pendis::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationGroup = 'ZIStribution';

    protected static ?string $navigationLabel = 'Data Pendistribusian';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Wizard::make([
                    Wizard\Step::make('Permohonan')
                        ->schema([
                            TextInput::make('no_ref')
                                ->label('No Agenda')
                                ->required(),
                            DatePicker::make('application_date')
                                ->label('Tanggal Permohonan')
                                ->required()
                                ->native(false)
                                ->displayFormat('Y/m/d')
                                ->prefixIcon('heroicon-o-calendar'),
                            Radio::make('applicant_type')
                                ->label('Jenis Pemohon')
                                ->options([
                                    'perorangan' => 'Perorangan',
                                    'lembaga' => 'Lembaga'
                                ]),
                            TextInput::make('applicant_name')
                                ->label('Nama Pemohon')
                                ->required(),
                        ]),
                    Wizard\Step::make('Penerima Manfaat')
                        ->schema([
                            Repeater::make('beneficiary')
                                ->label('Penerima Manfaat')
                                ->schema([
                                    TextInput::make('nama')->required(),
                                    TextInput::make('nik')->required()->length(16),
                                    DatePicker::make('tanggal_lahir')
                                        ->required()
                                        ->native(false)
                                        ->displayFormat('Y/m/d')
                                        ->prefixIcon('heroicon-o-calendar'),
                                    Textarea::make('alamat'),
                                    TextInput::make('desa'),
                                ])
                                ->defaultItems(1)
                                ->addActionLabel('Tambah penerima manfaat'),
                            Select::make('district')
                                ->label('Kecamatan')
                                ->options([
                                    'Cianjur' => 'Cianjur',
                                    'Cugenang' => 'Cugenang',
                                    'Pacet' => 'Pacet',
                                    'Sukaresmi' => 'Sukaresmi',
                                    'Karangtengah' => 'Karangtengah',
                                    'Warungkondang' => 'Warungkondang',
                                    'Gekbrong' => 'Gekbrong',
                                    'Cibeber' => 'Cibeber',
                                    'Cilaku' => 'Cilaku',
                                    'Mande' => 'Mande',
                                    'Ciranjang' => 'Ciranjang',
                                    'Bojongpicung' => 'Bojongpicung',
                                    'Haurwangi' => 'Haurwangi',
                                    'Campaka' => 'Campaka',
                                    'Campakamulya' => 'Campakamulya',
                                    'Tanggeung' => 'Tanggeung',
                                    'Cibinong' => 'Cibinong',
                                    'Cikadu' => 'Cikadu',
                                    'Kadupandak' => 'Kadupandak',
                                    'Pagelaran' => 'Pagelaran',
                                    'Sindangbarang' => 'Sindangbarang',
                                    'Cidaun' => 'Cidaun',
                                    'Naringgul' => 'Naringgul',
                                    'Agrabinta' => 'Agrabinta',
                                    'Leles' => 'Leles',
                                    'Takokak' => 'Takokak',
                                    'Sukanagara' => 'Sukanagara',
                                    'Cijati' => 'Cijati',
                                    'Cikalongkulon' => 'Cikalongkulon',
                                    'Pasirkuda' => 'Pasirkuda',
                                    'Cipanas' => 'Cipanas',
                                    'Sukaluyu' => 'Sukaluyu',
                                ])
                                ->required()

                        ]),
                    Wizard\Step::make('Detail Pendistribusian')
                        ->schema([
                            Select::make('fund_type')
                                ->label('Sumber Dana')
                                ->options([
                                    'Zakat' => 'Zakat',
                                    'Infak Tidak Terikat' => 'Infak Tidak Terikat',
                                    'nfak Terikat' => 'Infak Terikat',
                                    'DSKL' => 'DSKL',
                                ])
                                ->required(),
                            Select::make('program')
                                ->label('Program')
                                ->options([
                                    'Kemanusiaan' => 'Kemanusiaan',
                                    'Pendidikan' => 'Pendidikan',
                                    'Kesehatan' => 'Kesehatan',
                                    'Ekonomi' => 'Ekonomi',
                                    'Dakwah Advokasi' => 'Dakwah Advokasi',
                                ])
                                ->required(),
                            Select::make('asnaf')
                                ->label('Asnaf')
                                ->options([
                                    'Fakir' => 'Fakir',
                                    'Miskin' => 'Miskin',
                                    'Gharimin' => 'Gharimin',
                                    'Fisabilillah' => 'Fisabilillah',
                                    'Mualaf' => 'Mualaf',
                                    'Riqob' => 'Riqob',
                                    'Ibnusabil' => 'Ibnusabil',
                                    '-' => '-',
                                ])
                                ->required(),
                            Textarea::make('subject')
                                ->label('Perihal'),
                            TextInput::make('financial_aid')
                                ->label('Besar Bantuan')
                                ->required(),
                            DatePicker::make('distribution_date')
                                ->required()
                                ->native(false)
                                ->displayFormat('Y/m/d')
                                ->prefixIcon('heroicon-o-calendar'),
                            TextInput::make('receiver')
                                ->label('Nama Penerima Bantuan')
                                ->required(),
                            Textarea::make('desc')
                                ->label('Keterangan'),
                            Radio::make('rec')
                                ->label('Ada Rekomendasi?')
                                ->options([
                                    'Ya' => 'Ya',
                                    'Tidak' => 'Tidak'
                                ]),
                            TextInput::make('total_benef')
                                ->label('Jumlah Penerima Manfaat'),
                            FileUpload::make('doc_upload')
                                ->label('Upload Berkas')
                                ->openable()
                                ->preserveFilenames(),
                            FileUpload::make('photos')
                                ->label('Upload Dokumentasi')
                                ->openable()
                                ->preserveFilenames()
                        ]),
                ])
                    ->extraAttributes(['class' => 'filament-wizard-form'])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('no_ref')
                    ->sortable()
                    ->label('No Registrasi'),
                TextColumn::make('application_date')
                    ->sortable()
                    ->label('Tanggal Permohonan'),
                TextColumn::make('applicant_type')
                    ->sortable()
                    ->label('Jenis Pemohon'),
                TextColumn::make('applicant_name')
                    ->sortable()
                    ->label('Nama Pemohon'),
                TextColumn::make('beneficiary')
                    ->label('Penerima Manfaat')
                    ->getStateUsing(function ($record) {
                        // Ambil data langsung dari record (pastikan ada di database)
                        $beneficiary = $record->beneficiary;

                        // Jika string JSON, decode menjadi array
                        if (is_string($beneficiary)) {
                            $beneficiary = json_decode($beneficiary, true);
                        }

                        // Pastikan data adalah array dan olah datanya
                        if (is_array($beneficiary)) {
                            $names = array_column($beneficiary, 'nama');
                            return implode(', ', $names);
                        }

                        return '-';
                    }),
                /* ViewColumn::make('beneficiary->nama')
                    ->label('Penerima Manfaat')
                    ->view('tables.columns.pm-column'), */
                TextColumn::make('district')
                    ->sortable()
                    ->label('Kecamatan'),
                TextColumn::make('fund_type')
                    ->sortable()
                    ->label('Sumber Dana'),
                TextColumn::make('program')
                    ->sortable()
                    ->label('Program'),
                TextColumn::make('asnaf')
                    ->sortable()
                    ->label('Asnaf'),
                TextColumn::make('subject')
                    ->sortable()
                    ->label('Perihal'),
                TextColumn::make('financial_aid')
                    ->sortable()
                    ->label('Besaran Bantuan'),
                TextColumn::make('distribution_date')
                    ->sortable()
                    ->label('Tanggal Penyaluran'),
                TextColumn::make('receiver')
                    ->sortable()
                    ->label('Penerima Bantuan'),
                TextColumn::make('desc')
                    ->sortable()
                    ->label('Keterangan'),
                TextColumn::make('rec')
                    ->sortable()
                    ->label('Rekomendasi'),
                TextColumn::make('total_benef')
                    ->sortable()
                    ->label('Jumlah PM'),
                TextColumn::make('doc_upload')
                    ->sortable()
                    ->label('Upload Berkas'),
                TextColumn::make('photos')
                    ->sortable()
                    ->label('Dokumentasi'),
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
            ->emptyStateHeading('Belum ada data pendistribusian masuk')
            ->emptyStateDescription('Input data pendistribusian terlebih dahulu.');
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
            'index' => Pages\ListPendis::route('/'),
            'create' => Pages\CreatePendis::route('/create'),
            'edit' => Pages\EditPendis::route('/{record}/edit'),
        ];
    }
}
