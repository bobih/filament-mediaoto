<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\ListWa;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class WhatsapplistRelationManager extends RelationManager
{
    protected static string $relationship = 'walist';
    protected static ?string $title = 'WA Log';

    protected static ?string $model = ListWa::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('leadusers.name')
                    ->label('Prospek'),

                Tables\Columns\TextColumn::make('brands.brand')
                    ->label('Brand'),
                Tables\Columns\TextColumn::make('leadusers.model')
                    ->label('Model'),
                Tables\Columns\TextColumn::make('leadusers.variant')
                    ->label('Type')
                    ->formatStateUsing(function (string $state): string {
                        return html_entity_decode($state);
                    }),
                Tables\Columns\TextColumn::make('leadusers.city')
                    ->label('Lokasi'),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('tanggal'),
            ])
            ->defaultSort('tanggal', 'desc')
            ->defaultPaginationPageOption(5)
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make(),
                ]),
            ]);
    }
}
