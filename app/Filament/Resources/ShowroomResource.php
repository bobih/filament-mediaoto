<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShowroomResource\Pages;
use App\Filament\Resources\ShowroomResource\RelationManagers;
use App\Models\Showroom;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShowroomResource extends Resource
{
    protected static ?string $model = Showroom::class;
    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'List Showroom';

    protected static ?string $slug = 'showroom-List';

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

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
                ->label('ID'),
                Tables\Columns\TextColumn::make('showroom')->searchable()
                ->label('Showroom'),
                //Tables\Columns\TextColumn::make('alamat')
                //->label('Alamat'),
                Tables\Columns\TextColumn::make('brand')
                ->label('Brand'),
                Tables\Columns\TextColumn::make('city')
                ->label('kota'),
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
            'index' => Pages\ListShowrooms::route('/'),
            'create' => Pages\CreateShowroom::route('/create'),
            'edit' => Pages\EditShowroom::route('/{record}/edit'),
        ];
    }
}
