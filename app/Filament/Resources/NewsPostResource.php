<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\NewsPost;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\SpatieTagsColumn;
use Filament\Forms\Components\SpatieTagsInput;
use App\Filament\Resources\NewsPostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\NewsPostResource\RelationManagers;

class NewsPostResource extends Resource
{
    protected static ?string $model = NewsPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'News';
    protected static ?string $modelLabel = 'Post';
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Post';
    protected static ?string $title = 'Post';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Main')->schema([
                    TextInput::make('title')->required()->maxLength(200)
                        ->afterStateUpdated(function (string $operation, $state, Set $set) {
                            if ($operation === 'edit') {
                                return;
                            }
                            $set('slug', Str::slug($state));
                        }),
                    TextInput::make('slug')->required()->unique(ignoreRecord: true),

                    Select::make('categories')
                    ->multiple()
                    ->relationship('categories', 'title'),

                    //SpatieTagsInput::make('tags')
                    //    ->type('categories'),

                        RichEditor::make('content')->required()->fileAttachmentsDirectory('posts/images')
                    ->columnSpanFull(),
                ])->columns(1),
                Section::make('Meta')->schema([
                    //FileUpload::make('image')->directory('posts/thumbnails')->columnSpanFull(),

                    DateTimePicker::make('published_at')->nullable(),
                    Checkbox::make('featured'),
                    Forms\Components\Hidden::make('userid')
                    ->default(function (mixed $state) {
                        return auth()->user()->id;
                    }),

                ])->columns(1)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->label('ID'),



                Tables\Columns\ImageColumn::make('image')
                ->label('image'),

                //SpatieTagsColumn::make('tags'),

                //Tables\Columns\TextColumn::make('source')
                //->label('Source'),

                Tables\Columns\TextColumn::make('title')
                ->label('Title')
                ->limit(30),

                Tables\Columns\TextColumn::make('')
                ->label('Words')
                ->default(function(NewsPost $record){
                    return strlen(strip_tags($record->content));
                }),
                Tables\Columns\TextColumn::make('published_at')
                ->label('Tanggal'),

            ])
            ->filters([
               // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    //Tables\Actions\ForceDeleteBulkAction::make(),
                    //Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListNewsPosts::route('/'),
            'create' => Pages\CreateNewsPost::route('/create'),
            'edit' => Pages\EditNewsPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
