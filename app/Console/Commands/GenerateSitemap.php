<?php

namespace App\Console\Commands;

use App\Models\NewsPost;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
   // protected $signature = 'app:generate-sitemap';
   protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $postsitmap = Sitemap::create();
        $postsitmap->add(
            Url::create("/")
                ->setPriority(0.9)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );
        $postsitmap->add(
            Url::create("/news")
                ->setPriority(0.9)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        NewsPost::get()->each(function (NewsPost $post) use ($postsitmap) {
            $postsitmap->add(
                Url::create("/news/{$post->slug}")
                    ->setPriority(0.9)
                    ->setLastModificationDate(Carbon::create($post->updated_at))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });
        //$postsitmap->writeToFile(public_path('sitemap.xml'));

        $postsitmap->writeToFile(storage_path('../../public_html/sitemap.xml'));
    }
}
