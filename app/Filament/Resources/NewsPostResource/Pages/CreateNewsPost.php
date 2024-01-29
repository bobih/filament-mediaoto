<?php

namespace App\Filament\Resources\NewsPostResource\Pages;

use Filament\Actions;
use App\Models\NewsPost;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Carbon;
use Spatie\Sitemap\SitemapGenerator;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\NewsPostResource;

class CreateNewsPost extends CreateRecord
{
    protected static string $resource = NewsPostResource::class;

    protected function getRedirectUrl(): string
    {
        return route(name: 'filament.dash.resources.news-posts.index');
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
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        NewsPost::get()->each(function (NewsPost $post) use ($postsitmap) {
            $postsitmap->add(
                Url::create("/news/{$post->slug}")
                    ->setPriority(0.9)
                    ->setLastModificationDate(Carbon::create($post->updated_at))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });
        $postsitmap->writeToFile(public_path('../../public_html/sitemap.xml'));
    }
}
