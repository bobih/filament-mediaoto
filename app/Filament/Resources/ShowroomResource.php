<?php

namespace App\Filament\Resources;

use App\Models\Brand;
use App\Models\Province;
use Filament\Forms;
use App\Models\City;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Showroom;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;

use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ShowroomResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ShowroomResource\RelationManagers;

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
                Forms\Components\TextInput::make('showroom')
                ->label('Showroom')
                ->required(),

                Forms\Components\Select::make('brand')
                ->label('Brand')
                ->relationship('brands', 'brand')
                ->searchable()
                ->preload()
                ->required(),

                Forms\Components\Textarea::make('alamat')
                ->label('Alamat')
                ->required(),

                Forms\Components\Select::make('province')
                ->label('Provinsi')
                ->relationship('provinces', 'name')
                ->searchable()
                ->live()
                ->afterStateUpdated(fn(Set $set) => $set('city', null))
                ->preload()
                ->required(),

            Forms\Components\Select::make('city')
                ->label('Kota')
                ->options(fn(Get $get): Collection => City::query()
                    ->where('provinces_id', $get('province'))
                    ->pluck("name", 'id'))
                //->relationship('cities', 'name')
                ->searchable()
                ->required(),
            //->preload(),

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
                Tables\Columns\TextColumn::make('brands.brand')
                ->label('Brand'),
                Tables\Columns\TextColumn::make('cities.name')
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
            'index' => Pages\ListShowrooms::route('/'),
            'create' => Pages\CreateShowroom::route('/create'),
            'edit' => Pages\EditShowroom::route('/{record}/edit'),
        ];
    }
}
