<?php

namespace App\Filament\Resources\InvoiceResource\RelationManagers;

use App\Models\Leads;
use Closure;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Get;
use Livewire\Component;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\RelationManagers\RelationManager;

class PushtempRelationManager extends RelationManager
{
    protected static string $relationship = 'pushtemp';

    protected static ?string $label = 'Waiting List';
    protected static ?string $pluralLabel = 'Waiting List';

    protected $listeners = ['refreshExampleRelationManager' => '$refresh'];

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
            ->recordTitleAttribute('userid')
            ->columns([
                Tables\Columns\TextColumn::make('leadusers.name')
                ->label('Prospek'),
                Tables\Columns\TextColumn::make('brands.brand')
                ->label('Brand'),

                Tables\Columns\TextColumn::make('leadusers.model')
                ->label('Model'),
                Tables\Columns\TextColumn::make('leadusers.variant')
                ->label('Type')
                ->formatStateUsing(function (string $state): string {
                    return html_entity_decode($state);
                }),
                Tables\Columns\TextColumn::make('create')
                ->label('Data Date'),

            ])
            ->defaultSort('create','desc')
            ->defaultPaginationPageOption(5)
            ->filters([
                //
            ])
            ->headerActions([
                /*
                Tables\Actions\CreateAction::make()
                    ->after(function (Component $livewire) {
                        $livewire->dispatch('refreshProducts');
                    }),
                */
            ])
            ->actions([
                /*
                Tables\Actions\EditAction::make()
                    ->after(function (Component $livewire) {
                        $livewire->dispatch('refreshProducts');
                    }),
                Tables\Actions\DeleteAction::make()
                    ->after(function (Component $livewire) {
                        $livewire->dispatch('refreshProducts');
                    }),
                */
            ])
            ->bulkActions([
                /*
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->after(function (Component $livewire) {
                            $livewire->dispatch('refreshProducts');
                        }),
                ]),
                */
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->after(function (Component $livewire) {
                        $livewire->dispatch('refreshProducts');
                    }),
            ]);;
    }
}
