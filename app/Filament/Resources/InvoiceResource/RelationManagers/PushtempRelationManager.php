<?php

namespace App\Filament\Resources\InvoiceResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PushtempRelationManager extends RelationManager
{
    protected static string $relationship = 'pushtemp';

    protected static ?string $label = 'Waiting List';
    protected static ?string $pluralLabel = 'Waiting List';



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
            ->recordTitleAttribute('userid')
            ->columns([
                Tables\Columns\TextColumn::make('leadusers.name')
                ->label('Prospek'),
                Tables\Columns\TextColumn::make('leadusers.model')
                ->label('Model'),
                Tables\Columns\TextColumn::make('leadusers.variant')
                ->label('Type'),
                //Tables\Columns\TextColumn::make('tanggal')
                //->label('Tanggal'),
            ])
            ->defaultPaginationPageOption(5)
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                 //   Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
