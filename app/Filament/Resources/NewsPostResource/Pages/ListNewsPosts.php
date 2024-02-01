<?php

namespace App\Filament\Resources\NewsPostResource\Pages;

use Filament\Actions;
use App\Models\NewsPost;
use Spatie\Sitemap\Sitemap;
use Filament\Actions\Action;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Carbon;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Cache;
use Filament\Resources\Components\Tab;
use pxlrbt\FilamentExcel\Columns\Column;
use App\Console\Commands\GenerateSitemap;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NewsPostResource;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;

class ListNewsPosts extends ListRecords
{
    protected static string $resource = NewsPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

            ExportAction::make()->exports([
                ExcelExport::make()->withColumns([
                    Column::make('id')->heading('ID'),
                    Column::make('created_at')->heading('Date'),
                    Column::make('categories')->formatStateUsing(function ($record) {
                        $list = '';
                        foreach($record->categories as $category){
                            $list .= $category->title . ", ";
                        }
                        return substr($list,0,-2);
                     })->heading('Category'),
                    Column::make('tags')->formatStateUsing(function ($record) {
                        $list = '';
                        foreach($record->tags as $tag){
                            $list .= $tag->name . ", ";
                        }
                      return substr($list,0,-2);
                     })->heading('Tags'),
                    Column::make('author.nama')->heading('Author'),
                    Column::make('title')->heading('Title'),
                    Column::make('slug')->heading('URL')
                    ->formatStateUsing(function ($state) {
                       return env("APP_URL",'https://www.mediaoto.id').'/news/'. $state;
                    }),
                ])->withFilename('Site_News_' . date("Y-m-d")),
            ])
                ->color('info'),
                Action::make('generate')
                ->label('Update Sitemap')
                ->visible(function(){
                    return (Auth()->user()->id == 36)? true : false ;
                })
                ->action(function(){

                    $postsitmap = Sitemap::create();
                    $postsitmap->add(
                        Url::create("/")
                            ->setPriority(0.9)
                            ->setLastModificationDate(Carbon::create('2024-01-25T01:43:17+00:00'))
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    );
                    $postsitmap->add(
                        Url::create("/news")
                            ->setLastModificationDate(Carbon::create('2024-01-25T01:43:17+00:00'))
                            ->setPriority(0.9)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    );

                    NewsPost::sitemap()->get()->each(function (NewsPost $post) use ($postsitmap) {
                        $postsitmap->add(
                            Url::create("/news/{$post->slug}")
                                ->setPriority(0.9)
                                ->setLastModificationDate(Carbon::create($post->updated_at))
                                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        );
                    });
                    //$postsitmap->writeToFile(public_path('sitemap.xml'));

                    $postsitmap->writeToFile(storage_path('../../public_html/sitemap.xml'));

                    Cache::forget('mobileCache');
                    Cache::forget('homeDesktopCache');
                    Cache::forget('newsResponse');
                    Cache::forget('newsLatest');
                    Cache::forget('newscategories');


                    return true;
                }),
        ];
    }


    public function getTabs(): array
    {

        return [
            "thisWeek" => Tab::make('This Week')
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('published_at', '>=', Carbon::now()->startOfWeek());
                }),
            "all" => Tab::make('All'),
        ];
    }
}
