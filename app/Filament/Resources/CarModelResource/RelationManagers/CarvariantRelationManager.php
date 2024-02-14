<?php

namespace App\Filament\Resources\CarModelResource\RelationManagers;


use Filament\Forms;
use Filament\Tables;

use Filament\Forms\Form;
use Filament\Tables\Table;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;

use Yepsua\Filament\Forms\Components\Rating;
use Yepsua\Filament\Tables\Components\RatingColumn;
use Filament\Resources\RelationManagers\RelationManager;
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStar;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use IbrahimBougaoua\FilamentRatingStar\Columns\RatingStarColumn;

class CarVariantRelationManager extends RelationManager
{
    protected static string $relationship = 'variant';

    protected static ?string $recordTitleAttribute = 'name';

    public ?string $tableSortColumn = 'otr';

    public ?string $tableSortDirection = 'asc';

    public function form(Form $form): Form
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
                                            ->numeric()
                                            ->required(),


                                        /*
                                        Rating::make('rating')
                                        ->default(function () {

                                            return $this->getOwnerRecord()->rating;
                                        })
                                        ->required(),
                                        */

                                    ]),


                                    RatingStar::make('rating')
                                    ->label('Rating')
                                    ->default(function () {

                                        return $this->getOwnerRecord()->rating;
                                    })
                                    ->required(),

                                    /*

                                    Forms\Components\TextInput::make('rating')
                                            ->label('Rating (0-5)')
                                            ->default(function () {

                                                return $this->getOwnerRecord()->rating;
                                            })
                                            ->required(),
                                    */

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
                                    ->required()
                                    ->preload(),

                                Forms\Components\Select::make('fuel_id')
                                    ->label('Fuel')
                                    ->default(function () {

                                        return $this->getOwnerRecord()->fuel_id;
                                    })
                                    ->relationship('fuel', 'name')
                                    ->searchable()
                                    ->required()
                                    ->preload(),

                                Forms\Components\TextInput::make('seat')
                                    ->label('Seat')
                                    ->numeric()
                                    ->default(function () {

                                        return $this->getOwnerRecord()->seat;
                                    })
                                    ->required(),

                                Forms\Components\TextInput::make('door')
                                    ->label('Door')
                                    ->numeric()
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
                                    ->required()
                                    ->preload(),

                                Forms\Components\TextInput::make('engine_volume')
                                    ->label("Volume (cc)")
                                    ->numeric()
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Variant'),
                Tables\Columns\TextColumn::make('otr')
                    ->label('Price')
                    ->sortable()
                    ->formatStateUsing(function ($record){
                        return number_format($record->otr,0,".",".");
                    }),

                    RatingStarColumn::make('rating'),
            ])->defaultSort('otr', 'asc')
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

}
