<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;

use Filament\Forms\Form;
use Pages\EditCarVariant;

use App\Models\CarVariant;
use Filament\Tables\Table;

use Pages\ListCarVariants;
use Pages\CreateCarVariant;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Yepsua\Filament\Forms\Components\Rating;
use Yepsua\Filament\Tables\Components\RatingColumn;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\CarVariantResource\Pages;

class CarVariantResource extends Resource
{
    protected static ?string $model = CarVariant::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {


        return $form
            ->schema([
                Forms\Components\Hidden::make('brand_id')
                    ->default(function () {

                        return $this->getOwnerRecord()->brand_id;
                    }),

                Forms\Components\Hidden::make('model_id')
                    ->default(function () {

                        return $this->getOwnerRecord()->id;
                    }),

                Tabs::make('Heading')
                    ->tabs([
                        Tabs\Tab::make('Car Info')
                        ->icon('mdi-carinfo')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Model')
                                            ->required(),
                                        Forms\Components\TextInput::make('otr')
                                            ->label('OTR')
                                            ->required(),

                                        Rating::make('rating')
                                        ->default(function () {

                                            return $this->getOwnerRecord()->rating;
                                        })
                                        ->required(),


                                    ]),

                                    Grid::make(2)
                                    ->schema([
                                        Forms\Components\Textarea::make('review')
                                        ->label('Review'),
                                    ]),

                            ])->columns(2),

                        Tabs\Tab::make('Body')
                        ->icon('mdi-carcog')
                            ->schema([

                                Forms\Components\Select::make('bodytype_id')
                                    ->label('Type')
                                    ->default(function () {

                                        return $this->getOwnerRecord()->bodytype_id;
                                    })
                                    ->relationship('bodytype', 'name')
                                    ->searchable()
                                    ->preload(),

                                Forms\Components\Select::make('fuel_id')
                                    ->label('Fuel')
                                    ->default(function () {

                                        return $this->getOwnerRecord()->fuel_id;
                                    })
                                    ->relationship('fuel', 'name')
                                    ->searchable()
                                    ->preload(),

                                Forms\Components\TextInput::make('seat')
                                    ->label('Seat')
                                    ->default(function () {

                                        return $this->getOwnerRecord()->seat;
                                    })
                                    ->required(),

                                Forms\Components\TextInput::make('door')
                                    ->label('Door')
                                    ->default(function () {

                                        return $this->getOwnerRecord()->door;
                                    })
                                    ->required(),

                            ])->columns(2),

                        Tabs\Tab::make('Engine')
                        ->icon('mdi-engine')
                            ->schema([
                                Forms\Components\TextInput::make('engine_type')
                                    ->label('Type')
                                    ->default(function () {

                                        return $this->getOwnerRecord()->engine_type;
                                    }),

                                Forms\Components\Select::make('transmission_id')
                                    ->label('Transmission')
                                    ->default(function () {

                                        return $this->getOwnerRecord()->transmission_id;
                                    })
                                    ->relationship('transmission', 'name')
                                    ->searchable()
                                    ->preload(),

                                Forms\Components\TextInput::make('engine_volume')
                                    ->label("Volume (cc)")
                                    ->default(function () {

                                        return $this->getOwnerRecord()->engine_volume;
                                    }),
                            ])->columns(2),

                        Tabs\Tab::make('Description')
                            ->schema([
                                Grid::make(1)
                                    ->schema([
                                        SpatieMediaLibraryFileUpload::make('image')
                                            ->responsiveImages()
                                            ->conversion('thumb'),

                                            Forms\Components\Textarea::make('description')
                                            ->label('Description')
                                            ->rows(4)
                                            ->maxLength(250),
                                    ])->columns(1),

                            ]),

                    ])
                    ->columnSpanFull()
                    ->activeTab(1),

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
