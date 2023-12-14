<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProspekResource\Pages;
use App\Filament\Resources\ProspekResource\RelationManagers;
use App\Models\Prospek;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProspekResource extends Resource
{
    protected static ?string $model = Prospek::class;

    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                Tables\Columns\TextColumn::make('users.nama')->searchable()
                ->label('Sales'),
                Tables\Columns\TextColumn::make('leadusers.name')
                ->label('Prospek'),
                Tables\Columns\TextColumn::make('view')
                ->label('View'),
                Tables\Columns\TextColumn::make('favorite')
                ->label('Favorite'),
                Tables\Columns\TextColumn::make('lost')
                ->label('Lost'),
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
            'index' => Pages\ListProspeks::route('/'),
            'create' => Pages\CreateProspek::route('/create'),
            'edit' => Pages\EditProspek::route('/{record}/edit'),
        ];
    }
}
