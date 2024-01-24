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
use Filament\Tables\Columns\ColorColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
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
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              TextInput::make('title')->required()->maxLength(150)
              ->live(onBlur: true)
              ->afterStateUpdated(function (string $operation, $state, Set $set){
                if($operation === 'edit'){
                    return;
                }
                $set('slug', Str::slug($state));
              }),
              TextInput::make('slug')
                ->label('URL')
                ->required()
                ->unique(ignoreRecord:true)
                ->readOnly(),

              //TextInput::make('text_color')->nullable(),
              //TextInput::make('bg_color')->nullable(),
              //ColorPicker::make('text_color')
              //->label('Text Color'),
              ColorPicker::make('bg_color')
              ->label('Background Color'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('title')
                ->label('Category'),
                TextColumn::make('slug')
                ->label('URL'),
                //TextColumn::make('text_color'),
                //TextColumn::make('bg_color'),
                ColorColumn::make('text_color')
                ->label('Text'),
                ColorColumn::make('bg_color')
                ->label('Background'),

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
