<?php

namespace App\Filament\Resources\NewsPostResource\Pages;

use Filament\Actions;
use App\Models\NewsPost;
use Illuminate\Support\Str;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Carbon;
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
       $content =  $data['content'];
       $title   = $data['title'];
       $arrPic = [
        "<img alt='01-{$title}' title='01-{$title}' class='mt-4 h-auto w-full object-fit drop-shadow-xl rounded-lg' ",
        "<img alt='02-{$title}' title='02-{$title}' class='mt-4 h-auto w-full object-fit drop-shadow-xl rounded-lg' ",
        "<img alt='03-{$title}' title='03-{$title}' class='mt-4 h-auto w-full object-fit drop-shadow-xl rounded-lg' ",
    ];
    //return Str::replaceMatches('<img', $this->content,"<img title='piic01'");
        if(str_contains($content,'<img' )){
            $content = Str::replaceArray('<img', $arrPic, $content);
        }

        if(str_contains($content,'src="../' )){
            $content = str_replace('src="../', 'src="'. env('IMAGE_URL') . '/', $content);
        }

        //$data['content'] = $content;



        return $data;
    }

    protected function afterCreate(): void
    {

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

        Cache::forget('mobileCache');
        Cache::forget('homeDesktopCache');
        Cache::forget('newsResponse');
        Cache::forget('newsLatest');
        Cache::forget('newscategories');
    }
}
