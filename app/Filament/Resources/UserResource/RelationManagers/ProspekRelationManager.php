<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Invoice;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ProspekRelationManager extends RelationManager
{
    protected static string $relationship = 'prospek';
    protected function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderBy('tanggal', 'asc');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('userid')
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



                Tables\Columns\TextColumn::make('created_at')
                ->label('Tanggal'),






            ])
            ->defaultSort('created_at','desc')
            ->defaultPaginationPageOption(5)

            ->filters([
                //
            ])
            ->headerActions([
               // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
              //  Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                   // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
