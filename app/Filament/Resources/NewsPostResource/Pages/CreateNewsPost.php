<?php

namespace App\Filament\Resources\NewsPostResource\Pages;

use Filament\Actions;
use PHPHtmlParser\Dom;
use Spatie\Image\Image;
use App\Models\NewsPost;
use Illuminate\Support\Str;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Carbon;
use Spatie\Image\Manipulations;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Cache;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\NewsPostResource;


class CreateNewsPost extends CreateRecord
{
    protected static string $resource = NewsPostResource::class;

    protected function getRedirectUrl(): string
    {
        return route(name: 'filament.dash.resources.news-posts.index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $content = $this->convertImage($data['content']);
        $data['content'] = $content;
        return $data;
    }

    protected function afterCreate(): void
    {
        if (env('APP_ENV','local') == 'prodction') {
            // Generate Sitemap
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

            NewsPost::get()->each(function (NewsPost $post) use ($postsitmap) {
                $postsitmap->add(
                    Url::create("/news/{$post->slug}")
                        ->setPriority(0.9)
                        ->setLastModificationDate(Carbon::create($post->updated_at))
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                );
            });
            $postsitmap->writeToFile(storage_path('../../public_html/sitemap.xml'));

            // Sent HTTP Request to bing
            $urldata = array();
            foreach ($postsitmap->getTags() as $data) {
                $urldata[] = "https://www.mediaoto.id" . $data->url;
            }

            $data = array(
                "siteUrl" => "https://www.mediaoto.id",
                "urlList" => $urldata,
            );

            $uri = "https://ssl.bing.com/webmaster/api.svc/json/SubmitUrlbatch?apikey?​&apikey=785ea63711724a6385084bf587218e3e";
            $response = Http::withBody(json_encode($data), 'application/json')->post($uri);
            // Clear Cache
        }

        Cache::forget('mobileCache');
        Cache::forget('homeDesktopCache');
        Cache::forget('newsResponse');
        Cache::forget('newsLatest');
        Cache::forget('newscategories');
    }


    public function convertImage($content){
        $dom = new Dom;
        $dom->loadStr($content);
        $listImages = $dom->find('img');

        foreach ($listImages as $list){
          $filePath = resource_path() . '/../../public_html/'.$list->getAttribute('src');// . $filename;
          $folderpath = resource_path() . '/../../public_html/images/posts/';

          $uploadimage = File::get($filePath);


        if(File::exists($filePath)) {
            //dd("OK");
           $type = File::mimeType($filePath);
           $name = File::name($filePath);
           $extention = File::extension($filePath);
           //dd($name);
           if(!File::exists($folderpath.$name.".webp")){
                $image = Image::load($filePath);
                $image->watermark(public_path('watermark4.png'))
                        ->watermarkOpacity(20)
                        ->watermarkPosition(Manipulations::POSITION_TOP_LEFT)      // Watermark at the top
                        ->watermarkHeight(40, Manipulations::UNIT_PERCENT)    // 50 percent height
                        ->watermarkWidth(40, Manipulations::UNIT_PERCENT)
                        ->watermarkPadding(15)
                        ->sharpen(10)
                        ->format(Manipulations::FORMAT_WEBP)
                        ->width(600)
                        ->save($folderpath . $name . '.webp');

            }

                $list->setAttribute('src', '/images/posts/'.$name . '.webp');
                $list->setAttribute('class', 'my-4 h-auto w-full object-fit drop-shadow-xl rounded-lg');

            } else {
                $list->setAttribute('class', 'my-4 h-auto w-full object-fit drop-shadow-xl rounded-lg');

            }
        }

        $content = $dom;
        return $content;
    }
}
