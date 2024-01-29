<?php

namespace App\Filament\Resources\NewsPostResource\Pages;

use Filament\Actions;
use App\Models\NewsPost;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Carbon;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\NewsPostResource;

class EditNewsPost extends EditRecord
{
    protected static string $resource = NewsPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        // Runs after the form fields are saved to the database.
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

        NewsPost::sitemap()->get()->each(function (NewsPost $post) use ($postsitmap) {
            $postsitmap->add(
                Url::create("/news/{$post->slug}")
                    ->setPriority(0.9)
                    ->setLastModificationDate(Carbon::create($post->updated_at))
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });
        $postsitmap->writeToFile(storage_path('../../public_html/sitemap.xml'));

    }


}
