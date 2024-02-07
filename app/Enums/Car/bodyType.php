<?php
namespace App\Enums\Car;
use Filament\Support\Contracts\HasLabel;

enum BodyType: string implements HasLabel
{
    case Hatchback = 'Hatchback';
    case Convertible = 'Convertible';
    case Coupe = 'Coupe';
    case SUV = 'SUV';
    case Sedan = 'Sedan';
    case Crossover = 'Crossover';
    case Pickup = 'Pickup Truck';
    case Micro  = 'Micro Car';
    case Saloon = 'Saloon';
    case Wagon  = 'Station Wagon';
    case Van    = 'Van';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Hatchback => 'Hatchback',
            self::Convertible => 'Convertible',
            self::Coupe => 'Coupe',
            self::SUV => 'SUV',
            self::Sedan => 'Sedan',
            self::Crossover => 'Crossover',
            self::Pickup => 'Pickup Truck',
            self::Micro  => 'Micro Car',
            self::Saloon => 'Saloon',
            self::Wagon  => 'Station Wagon',
            self::Van    => 'Van',        };
    }

    public static function toArray(): ?array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[$case->name] = $case->value;
        }
        return $array;
    }
}
