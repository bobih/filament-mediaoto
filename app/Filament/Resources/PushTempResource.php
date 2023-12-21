<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PushTempResource\Pages;
use App\Filament\Resources\PushTempResource\RelationManagers;
use App\Models\PushTemp;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PushTempResource extends Resource
{
    protected static ?string $model = PushTemp::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $title = 'Waiting List';

    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $pluralLabel = 'Waiting List';

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

                Tables\Columns\TextColumn::make('users.nama')
                ->label('Sales'),
                Tables\Columns\TextColumn::make('leadusers.name')
                ->label('Prospek'),
                Tables\Columns\TextColumn::make('leadusers.model')
                ->label('Model'),
                Tables\Columns\TextColumn::make('leadusers.variant')
                ->label('Type'),
                Tables\Columns\TextColumn::make('tanggal')
                ->label('Tanggal'),
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
                   // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPushTemps::route('/'),
            'create' => Pages\CreatePushTemp::route('/create'),
            'edit' => Pages\EditPushTemp::route('/{record}/edit'),
        ];
    }
}
