<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Livewire\Component;
use App\Models\Carmodel;
use Filament\Forms\Form;
use App\Models\CarVariant;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
//use App\Enums\Car\BodyType;
//use App\Enums\Car\Fuel;
//use App\Enums\Car\Transmission;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Infolists\Components;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;

use Yepsua\Filament\Forms\Components\Rating;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use App\Filament\Resources\CarModelResource\Pages;
use Yepsua\Filament\Tables\Components\RatingColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\CarModelResource\RelationManagers;

class CarModelResource extends Resource
{
    protected static ?string $model = CarModel::class;

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Info';

    protected static ?string $navigationLabel = 'Car';
    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'fontisto-car';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Tabs::make('Heading')
                    ->tabs([
                        Tabs\Tab::make('Car Info')
                        ->icon('mdi-carinfo')
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        Forms\Components\Select::make('brand_id')
                                            ->label('Brand')
                                            ->relationship('brand', 'brand')
                                            ->searchable()
                                            ->required()
                                            ->preload(),

                                        Forms\Components\TextInput::make('name')
                                            ->label('Model')
                                            ->required(),


                                    ]),


                                    Forms\Components\TextInput::make('rating')
                                    ->label('Rating (0-5)')
                                    ->required(),
                                   // Rating::make('rating')
                                   // ->required(),

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
                                ->relationship('bodytype', 'name')
                                ->searchable()
                                ->preload(),

                                Forms\Components\Select::make('fuel_id')
                                ->label('Fuel')
                                ->relationship('fuel', 'name')
                                ->searchable()
                                ->required()
                                ->preload(),

                                Forms\Components\TextInput::make('seat')
                                ->label('Seat')
                                ->required(),
                                Forms\Components\TextInput::make('door')
                                    ->label('Door')
                                    ->required(),

                            ])->columns(2),

                            Tabs\Tab::make('Engine')
                            ->icon('mdi-engine')
                            ->schema([
                                Forms\Components\TextInput::make('engine_type')
                                ->label('Type'),

                                Forms\Components\Select::make('transmission_id')
                                ->label('Transmission')
                                ->relationship('transmission', 'name')
                                ->required()
                                ->searchable()
                                ->preload(),

                                Forms\Components\TextInput::make('engine_volume')
                                ->label("Volume (cc)"),

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
                Tables\Columns\TextColumn::make('brand.brand')
                    ->label('Brand'),
                Tables\Columns\TextColumn::make('name')->searchable()
                    ->label('Model'),
                Tables\Columns\TextColumn::make('brand.brand'),
                //RatingColumn::make('rating'),

                Tables\Columns\TextColumn::make('rating'),

                Tables\Columns\TextColumn::make('id')
                ->label('Variant')
                ->getStateUsing( function ($record): ?string{
                    $total = CarVariant::where('model_id',$record->id)->get();
                    if($total->count() > 0){
                    return $total->count();
                    } else {
                        return '-';
                    }
                }),
                Tables\Columns\TextColumn::make('otr')
                ->label('Price Range')
                ->getStateUsing( function ($record): ?string{
                    $total = CarVariant::where('model_id',$record->id)->get();
                    if($total->count() > 0){
                        foreach($total as $list){
                        $otr[]= $list->otr;
                        }
                        $minOtr = number_format(min($otr),0,".",".");
                        $maxOtr = number_format(max($otr),0,".",".");
                        return $minOtr . " - " . $maxOtr;
                } else {
                    return '-';
                }
                })->wrap(),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                //  Tables\Actions\ViewAction::make(),
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                //  Tables\Actions\BulkActionGroup::make([
                //    Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                Components\ImageEntry::make('image')
                    ->hiddenLabel()
                    ->circular()
                    ->checkFileExistence(false)
                    ->alignCenter(true)
                    ->visible(function ($state): bool {
                        if ($state == '' || is_array($state)) {
                            return false;
                        } else {
                            return true;
                        }
                    })
                    ->grow(false),

                Components\Section::make()
                    ->schema([
                        Components\Split::make([
                            Components\Grid::make(2)
                                ->schema([
                                    Components\TextEntry::make('name')
                                        ->label('Model'),
                                    Components\TextEntry::make('brand.brand')
                                        ->label('Brand'),
                                    Components\TextEntry::make('body_type')
                                        ->label('Body Type'),
                                    Components\TextEntry::make('transmission')
                                        ->label('Transmission'),

                                ]), // Grid
                        ]), // Split

                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [

            RelationManagers\CarVariantRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarModels::route('/'),
            'create' => Pages\CreateCarModel::route('/create'),
            'edit' => Pages\EditCarModel::route('/{record}/edit'),
            //'view' => Pages\ViewCarModel::route('/{record}/view'),

        ];
    }
}
