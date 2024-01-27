<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\NewsPost;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\NewsCategory;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Components\Section;

use Filament\Forms\Components\Checkbox;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\SpatieTagsColumn;
use Filament\Forms\Components\SpatieTagsInput;
use App\Filament\Resources\NewsPostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
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


    protected static function goTo(string $link, string $title, ?string $tooltip)
    {
        return new HtmlString(Blade::render('filament::components.link', [
            'color' => 'primary',
            'tooltip' => $tooltip,
            'href' => env("APP_URL").'/news/'. $link,
            'target' => '_blank',
            'slot' => $link,
            'icon' => 'heroicon-o-arrow-top-right-on-square',
        ]));
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Main')->schema([
                    TextArea::make('title')
                        ->required()
                        ->rows(3)
                        ->maxLength(250)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (string $operation, $state, Set $set) {
                            $set('slug', Str::slug($state));
                        }),
                    TextArea::make('slug')
                        ->label('URL')
                        ->rows(3)
                        ->unique(ignoreRecord: true)
                        ->readOnly(),

                    Select::make('categories')
                        ->multiple()
                        ->relationship('categories', 'title')
                        ->required()
                        ->preload(),

                    SpatieTagsInput::make('tags')
                    ->splitKeys(['Tab', ' ']),

                    Select::make('userid')
                    ->label('Author')
                    ->default(function(){
                        return 128;
                    })
                    ->native(false)
                    ->options(User::whereIn('id',[128,129,130])->pluck('nama', 'id')),

                    DateTimePicker::make('published_at')->nullable(),
                    Checkbox::make('featured'),

                    Forms\Components\Hidden::make('source')
                        ->dehydrated(fn ($state) => filled($state))
                        ->default(function (mixed $state) {
                            return 'Mediaoto';
                        }),

                    //    ->type('categories'),


                ])->columns(2),

                Section::make('Meta')->schema([

                    /*
                    FileUpload::make('image')
                        ->directory('posts/thumbnails')
                        ->dehydrated(fn ($state) => filled($state))
                        ->columnSpanFull(),
                    */

                    SpatieMediaLibraryFileUpload::make('image')
                    ->responsiveImages()
                    ->conversion('thumb'),

                    TextArea::make('description')
                        ->label('Short description')
                        ->rows(4)
                        ->minLength(50)
                        ->maxLength(250)
                        ->required(),

                    RichEditor::make('content')
                        ->required()
                        ->minLength(2)
                        ->fileAttachmentsDirectory('posts/images')
                        ->columnSpanFull(),

                ])->columns(1)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->searchable()
            ->searchDebounce('750ms')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),



                Tables\Columns\ImageColumn::make('image')
                    ->label('image')
                    ->defaultImageUrl(function($record){
                        return url($record->getThumbnailImage());
                    }),

                  //  SpatieMediaLibraryImageColumn::make('image'),

                //SpatieTagsColumn::make('tags'),

                //Tables\Columns\TextColumn::make('source')
                //->label('Source'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->wrap(),


                Tables\Columns\TextColumn::make('slug')
                    ->label('Url')
                    ->copyable()
                    ->copyMessage('URL address copied')
                    ->copyMessageDuration(1500)
                    ->wrap()
                    ->formatStateUsing(
                        fn (string $state) => self::goTo($state,$state, 'See External Resource'),
                    ),




                /*
                Tables\Columns\TextColumn::make('')
                    ->label('Words')
                    ->default(function (NewsPost $record) {
                        return strlen(strip_tags($record->content));
                    }),
                */
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal'),

            ])
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('Category')
              ->options(function(){
                    $categories = NewsCategory::all();
                    foreach($categories as $category){
                        $arrData[$category->title] = $category->title;
                    }
                return $arrData;
                })
              ->query(function (Builder $query, array $data): Builder {
                   return $query->when($data['value'], function (Builder $query, $data): Builder {
                     return $query->withCategory($data);
                    });
                }),
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
        /*
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
            */


        return parent::getEloquentQuery()->orderBy('id', 'desc');
    }
}
