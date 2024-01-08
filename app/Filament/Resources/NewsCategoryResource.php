<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\NewsCategory;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NewsCategoryResource\Pages;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use App\Filament\Resources\NewsCategoryResource\RelationManagers;

class NewsCategoryResource extends Resource
{
    protected static ?string $model = NewsCategory::class;

    protected static ?string $navigationGroup = 'News';
    protected static ?string $modelLabel = 'Category';

    protected static ?string $navigationLabel = 'Category';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              TextInput::make('title')->required()->maxLength(150)
              ->live(debounce: 600)
              ->afterStateUpdated(function (string $operation, $state, Set $set){
                if($operation === 'edit'){
                    return;
                }
                $set('slug', Str::slug($state));
              }),
              TextInput::make('slug')->required()->unique(ignoreRecord:true),
              TextInput::make('text_color')->nullable(),
              TextInput::make('bg_color')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('title'),
                TextColumn::make('slug'),
                TextColumn::make('text_color'),
                TextColumn::make('bg_color'),
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
            'index' => Pages\ListNewsCategories::route('/'),
            'create' => Pages\CreateNewsCategory::route('/create'),
            'edit' => Pages\EditNewsCategory::route('/{record}/edit'),
        ];
    }
}
