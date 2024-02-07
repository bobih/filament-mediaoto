<?php
namespace App\Enums\Car;
use Filament\Support\Contracts\HasLabel;

enum Fuel: string implements HasLabel
{
    case Premium    = 'Premium';
    case Diesel     = 'Diesel';
    case Petrol     = 'Petrol';
    case Hybrid     = 'Hybrid';
    case Electric   = 'Electric';


    public function getLabel(): ?string
    {
        return match ($this) {
            self::Premium    => 'Premium',
            self::Electric   => 'Electric',
            self::Diesel     => 'Diesel',
            self::Petrol     => 'Petrol',
            self::Hybrid     => 'Hybrid',
        };
    }
    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[$case->name] = $case->value;
        }
        return $array;
    }
}
