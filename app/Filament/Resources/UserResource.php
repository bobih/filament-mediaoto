<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\City;
use App\Models\User;
use Filament\Tables;
use App\Models\Paket;
use App\Models\Prospek;
use Components\Section;
use Filament\Forms\Get;
use Filament\Forms\Set;
//use Livewire\Component;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;


//use App\Tables\Columns\ProgressColumn;



use Filament\Resources\Resource;
use Illuminate\Support\Collection;


use Filament\Forms\Components\Tabs;

use Illuminate\Support\Facades\Hash;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use App\Http\Controllers\FcmController;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\ImageEntry;
use Filament\Resources\Pages\ListRecords\Tab;
use App\Filament\Resources\UserResource\Pages;
use RyanChandler\FilamentProgressColumn\ProgressColumn;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?int $navigationSort = 1;

    //protected static ?string $title = 'User List';
    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $navigationLabel = 'User';

    protected static ?string $slug = 'user-List';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderBy('id', 'desc');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Heading')
                    ->tabs([
                        Tabs\Tab::make('User Info')
                            ->schema([
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama')
                                    ->required(),


                                /*
                                Forms\Components\TextInput::make('password')
                                ->label('password'),


                                Forms\Components\Select::make('roles')
                                ->relationship('roles', 'name')
                                ->multiple()
                                ->preload()
                                ->searchable(),
                                */

                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required(),

                                Forms\Components\Select::make('posision_id')
                                    ->label('Posisi')
                                    ->relationship('positions', 'name'),

                                Forms\Components\TextInput::make('phone')
                                    ->label('Phone'),
                                Forms\Components\Select::make('brand')
                                    ->label('Brand')
                                    ->relationship('brands', 'brand')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                /*
                                Forms\Components\Select::make('acctype')
                                    ->label('Paket')
                                    ->relationship('pakets', 'name')
                                    ->getOptionLabelFromRecordUsing(function ($record){
                                        return "{$record->name}";
                                    })
                                    ->preload()
                                    ->live()
                                    ->required()
                                    ->afterStateUpdated(function (Set $set, $state) {
                                        $paket = Paket::where('id', $state)->first();
                                        $set('quota', $paket->quota);
                                    }),

                                Forms\Components\Hidden::make('quota'),
                                    */
                                Forms\Components\Select::make('roles')
                                    ->relationship('roles', 'name')
                                    ->multiple()
                                    ->preload()
                                    ->searchable()
                                    ->visible(function (User $user) {
                                        $user = auth()->user()->id;
                                        if ($user == "36") {
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }),
                                Forms\Components\TextInput::make('password')
                                    ->password()
                                    ->maxLength(255)
                                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                                    ->visible(function (User $user) {
                                        $user = auth()->user()->id;
                                        if ($user == "36") {
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }),

                            ])->columns(2),
                        Tabs\Tab::make('Lokasi')
                            ->schema([
                                Forms\Components\Textarea::make('alamat')
                                    ->label('Alamat'),

                                Forms\Components\Select::make('showroom')
                                    ->label('Showroom')
                                    ->relationship('showrooms', 'showroom')
                                    ->searchable()
                                    ->preload()
                                    ->required(),



                                Forms\Components\Select::make('province_id')
                                    ->label('Provinsi')
                                    ->relationship('province', 'name')
                                    ->searchable()
                                    ->live()
                                    ->afterStateUpdated(fn(Set $set) => $set('city_id', null))
                                    ->preload(),

                                Forms\Components\Select::make('city_id')
                                    ->label('Kota')
                                    ->options(fn(Get $get): Collection => City::query()
                                        ->where('provinces_id', $get('province_id'))
                                        ->pluck("name", 'id'))
                                    //->relationship('cities', 'name')
                                    ->searchable()
                                //->preload(),


                            ])->columns(2),


                        Tabs\Tab::make('Images')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Image')
                                    ->enableOpen()
                                    ->enableDownload(),
                                /*

                                Forms\Components\FileUpload::make('ktp')
                                    ->label('KTP'),
                                Forms\Components\FileUpload::make('npwp')
                                    ->label('NPWP'),
                                */
                            ])->columns(2),
                    ])
                    ->columnSpanFull()
                    ->activeTab(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('id')->sortable()
                    ->label('ID')

                    ->grow(false),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Avatar')
                    ->circular()
                    ->defaultImageUrl(env('IMAGE_URL') . '/images/blank.png')
                    ->alignment(Alignment::Center)
                    ->grow(false),
                Tables\Columns\TextColumn::make('nama')->searchable()
                    ->label('Nama')
                    ->weight(FontWeight::Bold)
                    ->alignment(Alignment::Start),

                /*
                Tables\Columns\TextColumn::make('phone')->searchable()
                    ->label('Email')
                    ->icon('heroicon-m-phone'),
                */
                Tables\Columns\TextColumn::make('email')->searchable()
                    ->label('Email'),

                Tables\Columns\TextColumn::make('pakets.name')
                    ->label('Paket')
                    ->grow(false)
                    ->sortable(),

                // ProgressColumn::make('progress')
                // ->default(50),


                ProgressColumn::make('quota')
                    ->label('progress')
                    ->progress(function (User $record) {
                        $totalProspek = new Prospek();
                        $prospekinfo = $totalProspek::where('userid', '=', $record->id)->get();
                        $totalProspek = $prospekinfo->count();

                        //return $totalProspek;


                        if ($totalProspek > 0 && $record->quota > 0) {

                            return round(($totalProspek / $record->quota) * 100);

                        } else {
                            return 0;
                        }



                    })->grow(true),


            ])
            ->filters([
                //
            ])
            ->actions([

                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),



                Tables\Actions\ActionGroup::make([

                    Tables\Actions\Action::make('Notification')
                        ->icon('heroicon-o-bell-alert')

                        ->action(function (User $record) {
                            //$fcmtoken = 'dOAzRsgRS1G7My_jWZ7sqs:APA91bHsNlbsZ4QxzFDkEUJWTn714viqkON6C8jl1QEMuLI2VtenvMRwHfUaZNo0A4BYpX-feQisobv4NrlVqKoo9XC1BXxfRaQJ50ZF_2OvjfoDECx8uGyvton9K6reV3Tu4_LfWGQZ';// $record->fcmtoken;
                            $fcmtoken = $record->fcmtoken;
                            $title = '';
                            $payload = json_encode(array("page" => "home", "requestData" => "1"));
                            $message = '';

                            $pushController = new FcmController();
                            $push = $pushController->sendWelcomeNotification($fcmtoken, $title, $payload, $message);
                        }),
                ])->visible(function () : bool{
                    $user = auth()->user()->id;
                    if ($user == "36") {
                        return true;
                    } else {
                        return false;
                    }
                }),



            ])
            ->bulkActions([
                /*
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                */
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
                                    //Components\TextEntry::make("Check Info"),
                                    Components\TextEntry::make('nama')
                                        ->label('Nama'),
                                    Components\TextEntry::make('phone')
                                        ->label('Phone'),
                                    Components\TextEntry::make('email')
                                        ->label('Email'),
                                    Components\TextEntry::make('brands.brand')
                                        ->label('Brand'),
                                    Components\TextEntry::make('alamat')
                                        ->label('Alamat'),
                                    Components\TextEntry::make('showrooms.showroom')
                                        ->label('Showroom'),

                                ]), // Grid
                        ]), // Split

                ]),
            ]);

    }



    public static function getWidgets(): array
    {
        return [
            // UserResource\Widgets\ProspekInfoWidget::class,
        ];
    }

    public static function getRelations(): array
    {

        // Get record $this->record



        return [
            RelationManagers\ProspekRelationManager::class,
            RelationManagers\PushlistRelationManager::class,
            RelationManagers\CalllistRelationManager::class,
            RelationManagers\WhatsapplistRelationManager::class,
            RelationManagers\LostRelationManager::class,

        ];



    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}/view'),
        ];
    }
}
