<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadsResource\Pages;
use App\Filament\Resources\LeadsResource\RelationManagers;
use App\Models\Leads;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeadsResource extends Resource
{
    protected static ?string $model = Leads::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->searchable()
                ->label('ID'),
                Tables\Columns\TextColumn::make('name')
                ->label('Name')

                ->formatStateUsing(function (string $state){
                    return ucwords(htmlentities($state));
                }),
                Tables\Columns\TextColumn::make('phone')
                ->label('Phone'),
                Tables\Columns\TextColumn::make('brands.brand')
                ->label('Brand')
                ->searchable(),
                Tables\Columns\TextColumn::make('lokasi')
                ->label('Lokasi'),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLeads::route('/create'),
            'edit' => Pages\EditLeads::route('/{record}/edit'),
        ];
    }
}
