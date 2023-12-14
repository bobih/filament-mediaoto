<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PushListResource\Pages;
use App\Filament\Resources\PushListResource\RelationManagers;
use App\Models\PushList;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PushListResource extends Resource
{
    protected static ?string $model = PushList::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?string $title = 'Waiting List';

    protected static ?string $navigationLabel = 'Waiting List';

    protected static ?string $slug = 'waiting-List';

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
                Tables\Columns\TextColumn::make('tanggal')
                ->label('Tanggal'),
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
            'index' => Pages\ListPushLists::route('/'),
            'create' => Pages\CreatePushList::route('/create'),
            'edit' => Pages\EditPushList::route('/{record}/edit'),
        ];
    }
}
