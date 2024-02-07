<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Brand;
use Filament\Forms\Components\Textarea;

use Filament\Forms\Get;
use Filament\Forms\Set;

use Filament\Forms\Form;
use App\Models\CarVariant;
use Filament\Tables\Table;
use App\Enums\Car\BodyType;
use App\Enums\Car\Transmission;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarVariantResource\Pages;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\CarVariantResource\RelationManagers;
use App\Models\Carmodel;

class CarVariantResource extends Resource
{
    protected static ?string $model = CarVariant::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {


                return $form
            ->schema([

                Forms\Components\Select::make('brand_id')
                ->label('Brand')
                ->options(Brand::all()->pluck('brand', 'id'))
                ->searchable()
                ->afterStateUpdated(fn(Set $set) => $set('model_id', null))
                ->required()
                ->preload(),

                Forms\Components\Select::make('model_id')
                ->label('Model')
                ->relationship('model', 'name')
                ->options(fn(Get $get): Collection => Carmodel::query()
                    ->where('brand_id', $get('brand'))
                    ->pluck('name', 'id'))
                ->searchable()
                ->preload(),

                Forms\Components\TextInput::make('name')
                ->label('Variant')
                ->required(),





                Forms\Components\Select::make('body_type')
                ->searchable()
                ->preload()
                ->options(BodyType::class),

                Forms\Components\Select::make('transmission')
                ->searchable()
                ->preload()
                ->options(Transmission::class),

                TextArea::make('description')
                        ->label('Description')
                        ->rows(4)
                        ->minLength(50)
                        ->maxLength(250),

                Forms\Components\TextInput::make('url')
                ->label('Url'),

                SpatieMediaLibraryFileUpload::make('image')
                ->responsiveImages()
                ->conversion('thumb'),

                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->label('ID'),
                Tables\Columns\TextColumn::make('model.name')
                ->label('Model'),
                Tables\Columns\TextColumn::make('name')->searchable()
                ->label('Variant'),

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
            'index' => Pages\ListCarVariants::route('/'),
            'create' => Pages\CreateCarVariant::route('/create'),
            'edit' => Pages\EditCarVariant::route('/{record}/edit'),
        ];
    }
}
