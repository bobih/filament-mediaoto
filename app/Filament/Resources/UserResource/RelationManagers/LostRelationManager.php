<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\Prospek;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;


class LostRelationManager extends RelationManager
{
    protected static string $relationship = 'prospek';

    protected static ?string $title = 'Lost';






    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
        ->modifyQueryUsing(fn (Builder $query) => $query->where('lost','>',0))
        ->recordTitleAttribute('userid')
        ->columns([
            Tables\Columns\TextColumn::make('leadusers.name')
            ->label('Prospek'),
            Tables\Columns\TextColumn::make('leadusers.model')
            ->label('Model'),
            Tables\Columns\TextColumn::make('leadusers.variant')
            ->label('Type')
            ->formatStateUsing(function (string $state): string {
                return html_entity_decode($state);
            }),

            Tables\Columns\TextColumn::make('lost')
            ->label('Lost')
            ->getStateUsing(function ( $record){
                $return = '';
                switch($record->lost){
                    case 1:
                        $return = "Prospek Duplikat";
                    break;
                    case 2:
                        $return = "Bukan Potensial Buyer";
                    break;
                    case 3:
                        $return = "Nomor tidak terdaftar";
                    break;
                    case 4:
                        $return = "Sudah SPK";
                    break;
                    case 5:
                        $return = "Luar Kota";
                    break;
                    case 6:
                        $return = "Lainnya";
                    break;
                    default:
                    $return = 'Unknown';
                }

                return $return;
            }
        ),

        ])
        ->defaultSort('created_at','desc')
        ->defaultPaginationPageOption(5)

            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                   // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
