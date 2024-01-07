<?php

namespace App\Filament\AvatarProviders;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Filament\AvatarProviders\Contracts\AvatarProvider;

class CustomAvatarsProvider implements AvatarProvider
{
    public function get(Model | Authenticatable $record): string
    {
        /*
        $name = str(Filament::getNameForDefaultAvatar($record))
            ->trim()
            ->explode(' ')
            ->map(fn (string $segment): string => filled($segment) ? mb_substr($segment, 0, 1) : '')
            ->join(' ');

        return 'https://source.boringavatars.com/beam/120/' . urlencode($name);
        */

        return 'https://www.mediaoto.id/images/' . $record->image;
    }
}
