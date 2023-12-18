<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListCallResource\Pages;
use App\Filament\Resources\ListCallResource\RelationManagers;
use App\Models\ListCall;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListCallResource extends Resource
{
    protected static ?string $model = ListCall::class;

    protected static ?string $navigationGroup = 'Settings';


    protected static ?string $navigationLabel = 'List Call';
    protected static ?string $slug = 'call-list';

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

                Tables\Columns\TextColumn::make('tanggal')
                ->label('tanggal'),
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
            'index' => Pages\ListListCalls::route('/'),
            'create' => Pages\CreateListCall::route('/create'),
            'edit' => Pages\EditListCall::route('/{record}/edit'),
        ];
    }
}
