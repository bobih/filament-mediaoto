<?php

namespace App\Filament\Resources\CarModelResource\RelationManagers;
use Filament\Forms;
use Filament\Tables;
use App\Models\Brand;
use App\Enums\Car\Fuel;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Carmodel;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Enums\Car\BodyType;
use App\Enums\Car\Transmission;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Illuminate\Database\Eloquent\Builder;
use Yepsua\Filament\Forms\Components\Rating;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Yepsua\Filament\Tables\Components\RatingColumn;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class CarvariantRelationManager extends RelationManager
{
    protected static string $relationship = 'variant';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('brand_id')
                ->default(function(){

                    return $this->getOwnerRecord()->brand_id;
                }),

                Forms\Components\Hidden::make('model_id')
                ->default(function(){

                    return $this->getOwnerRecord()->id;
                }),

                Tabs::make('Heading')
                    ->tabs([
                        Tabs\Tab::make('Car Info')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Model')
                                            ->required(),
                                            Forms\Components\TextInput::make('otr')
                                            ->label("OTR Price")
                                            ->required(),




                                    ]),
                                      Rating::make('rating'),
                                      Grid::make(2)
                                    ->schema([
                                       Forms\Components\Textarea::make('review')
                                            ->label("Review"),




                                    ]),


                            ])->columns(1),

                        Tabs\Tab::make('Body')
                            ->schema([

                                Forms\Components\TextInput::make('body_type')
                                ->label('Type')
                                ->default(function(){

                                    return $this->getOwnerRecord()->body_type;
                                })
                                ->datalist(function(){
                                    return BodyType::toArray();
                                }),

                                Forms\Components\TextInput::make('fuel')
                                ->label('Fuel')
                                ->default(function(){

                                    return $this->getOwnerRecord()->fuel;
                                })
                                ->datalist(function(){
                                    return Fuel::toArray();
                                }),

                                Forms\Components\TextInput::make('seat')
                                ->default(function(){

                                    return $this->getOwnerRecord()->seat;
                                })
                                ->label('Seat'),

                            ])->columns(2),

                            Tabs\Tab::make('Engine')
                            ->schema([
                                Forms\Components\TextInput::make('engine_type')
                                ->default(function(){

                                    return $this->getOwnerRecord()->engine_type;
                                })
                                ->label('Type'),

                                Forms\Components\TextInput::make('transmission')
                                ->label('Transmission')
                                ->default(function(){

                                    return $this->getOwnerRecord()->transission;
                                })
                                ->datalist(function(){
                                    return Transmission::toArray();
                                }),

                                Forms\Components\TextInput::make('engine_volume')
                                ->label("Volume (cc)")
                                ->default(function(){

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

                                Forms\Components\TextArea::make('description')
                                    ->label('Description')
                                    ->rows(4)
                                    ->minLength(50)
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
                Tables\Columns\TextColumn::make('name')->searchable()
                ->label('Variant'),
                Tables\Columns\TextColumn::make('otr')
                ->label('Price'),
                RatingColumn::make('rating'),
            ])
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
