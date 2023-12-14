<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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

                Forms\Components\TextInput::make('alamat')
                ->label('Alamat'),
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

                Forms\Components\Select::make('showroom')
                ->label('Showroom')
                ->relationship('showrooms', 'showroom')
                ->searchable()
                ->preload(),


                Forms\Components\FileUpload::make('image')
                ->label('Image'),

                Forms\Components\FileUpload::make('ktp')
                ->label('KTP'),
                Forms\Components\FileUpload::make('npwp')
                ->label('NPWP'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('pakets.name')
                ->label('Paket'),
                Tables\Columns\TextColumn::make('brands.brand')
                ->label('Brand'),
                Tables\Columns\TextColumn::make('positions.name')
                ->label('Posisi'),
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
                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                /*
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                */
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}/view'),
        ];
    }
}
