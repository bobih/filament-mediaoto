<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\ListCall;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ListCallResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ListCallResource\RelationManagers;

class ListCallResource extends Resource
{
    protected static ?string $model = ListCall::class;

    protected static ?string $navigationGroup = 'Settings';


    protected static ?string $navigationLabel = 'List Call';
    protected static ?string $slug = 'call-list';
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    /*
    public static function getEloquentQuery(): Builder
    {
        $model = new ListCall();
        $listCall = $model::select(DB::raw('leads.*'), DB::raw('prospek.*'))
        ->leftJoin('prospek','prospek.id','list_call.leadsid')
        ->join('leads','leads.id' ,'prospek.leadsid');
        return $listCall;
    }
    */

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
                Tables\Columns\TextColumn::make('name')
                ->label('Prospek'),
                Tables\Columns\TextColumn::make('model')
                ->label('Prospek'),
                Tables\Columns\TextColumn::make('variant')
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
