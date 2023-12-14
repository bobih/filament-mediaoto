<?php

namespace App\Filament\Resources;

use App\Models\User;
use App\Models\Prospek;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;


use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use App\Http\Controllers\FcmController;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\UserResource\Pages;
use RyanChandler\FilamentProgressColumn\ProgressColumn;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $title = 'User List';

    protected static ?string $navigationLabel = 'User List';

    protected static ?string $slug = 'user-List';

    protected static ?string $navigationIcon = 'heroicon-o-users';

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
                                    ->preload(),
                                Forms\Components\Select::make('acctype')
                                    ->label('Paket')
                                    ->relationship('pakets', 'name')
                                    ->preload()
                                    ->required(),


                            ])->columns(2),
                        Tabs\Tab::make('Lokasi')
                            ->schema([
                                Forms\Components\Textarea::make('alamat')
                                    ->label('Alamat'),

                                Forms\Components\Select::make('showroom')
                                    ->label('Showroom')
                                    ->relationship('showrooms', 'showroom')
                                    ->searchable()
                                    ->preload(),



                                Forms\Components\Select::make('province_id')
                                    ->label('Provinsi')
                                    ->relationship('province', 'name')
                                    ->searchable()
                                    ->preload(),

                                Forms\Components\Select::make('city_id')
                                    ->label('Kota')
                                    ->relationship('cities', 'name')
                                    ->searchable()
                                    ->preload(),


                            ])->columns(2),


                        Tabs\Tab::make('Images')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Image'),

                                Forms\Components\FileUpload::make('ktp')
                                    ->label('KTP'),
                                Forms\Components\FileUpload::make('npwp')
                                    ->label('NPWP'),
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
                //Tables\Columns\TextColumn::make('id'),
                ProgressColumn::make('progress')
                    ->progress(function ($record) {
                        $totalProspek = new Prospek();
                        $prospekinfo = $totalProspek::where('userid', '=', $record->id);
                        if ($prospekinfo->count() > 0) {
                            return round(($prospekinfo->count() / $record->quota) * 100);

                        } else {
                            return 0;

                        }


                    }),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('pakets.name')
                    ->label('Paket'),




                /*
                Tables\Columns\TextColumn::make('cities.name')
                ->label('Kota'),
                Tables\Columns\TextColumn::make('province.name')
                ->label('Provinsi'),
                Tables\Columns\TextColumn::make('showrooms.showroom')
                ->label('Showroom'),
                */
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),


                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('Notification')
                        ->icon('heroicon-o-bell-alert')
                        ->action(function (User $record) {
                            //$fcmtoken = 'dOAzRsgRS1G7My_jWZ7sqs:APA91bHsNlbsZ4QxzFDkEUJWTn714viqkON6C8jl1QEMuLI2VtenvMRwHfUaZNo0A4BYpX-feQisobv4NrlVqKoo9XC1BXxfRaQJ50ZF_2OvjfoDECx8uGyvton9K6reV3Tu4_LfWGQZ';// $record->fcmtoken;
                            $fcmtoken = $record->fcmtoken;
                            $title = '';
                            $payload = '';
                            $message = '';

                            $pushController = new FcmController();
                            $push = $pushController->sendWelcomeNotification($fcmtoken, $title, $payload, $message);
                        }),
                ]),



            ])
            ->bulkActions([
                /*
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                */
            ]);
    }

    public static function getWidgets(): array
    {
        return [
            UserResource\Widgets\ProspekInfoWidget::class,
        ];
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ProspekRelationManager::class,
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
