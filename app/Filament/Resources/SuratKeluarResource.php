<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuratKeluarResource\Pages;
use App\Filament\Resources\SuratKeluarResource\RelationManagers;
use App\Models\SuratKeluar;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SuratKeluarResource extends Resource
{
    protected static ?string $model = SuratKeluar::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'e-Arsip';

    protected static ?string $navigationLabel = 'Surat Keluar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Select::make('category_id')
                        ->label('Kategori Surat')
                        ->relationship('category', 'name')
                        ->required(),
                    DatePicker::make('date_letter')
                        ->label('Tanggal Surat')
                        ->required()
                        ->native(false)
                        ->displayFormat('Y/m/d')
                        ->prefixIcon('heroicon-o-calendar'),
                    TextInput::make('to_letter')
                        ->label('Tujuan')
                        ->required(),
                    TextInput::make('no_letter')
                        ->label('Nomor Surat')
                        ->required(),
                    Textarea::make('subject')
                        ->columnSpan(2)
                        ->label('Perihal')
                        ->required(),
                    FileUpload::make('file')
                        ->columnSpan(2)
                        ->label('Upload File')
                        ->openable()
                        ->preserveFilenames(),
                ])
                    ->columns([
                        'sm' => 2
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('category.name')
                    ->sortable()
                    ->label('Kategori'),
                TextColumn::make('date_letter')
                    ->sortable()
                    ->label('Tanggal Surat'),
                TextColumn::make('to_letter')->sortable()->label('Tujuan')->searchable(),
                TextColumn::make('no_letter')->sortable()->label('Nomor Surat')->searchable(),
                TextColumn::make('subject')->sortable()->label('Perihal')->searchable(),
                TextColumn::make('file')->sortable()->label('File Upload'),
                TextColumn::make('created_at')->sortable(),
                TextColumn::make('updated_at')->sortable(),
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
            ->emptyStateHeading('Belum ada data surat keluar')
            ->emptyStateDescription('Input data surat keluar terlebih dahulu.')
            ->defaultSort('date_letter', 'asc');
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
            'index' => Pages\ListSuratKeluars::route('/'),
            'create' => Pages\CreateSuratKeluar::route('/create'),
            'edit' => Pages\EditSuratKeluar::route('/{record}/edit'),
        ];
    }
}
