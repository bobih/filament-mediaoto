<?php
namespace App\Enums\Car;
use Filament\Support\Contracts\HasLabel;

enum Transmission: string implements HasLabel
{
    case Manual     = 'Manual';
    case Automatic  = 'Automatic';
    case Cvt        = 'CVT';
    case Semiauto   = 'Semi-Automatic';
    case Dual       = 'Dual Clutch';


    public function getLabel(): ?string
    {
        return $this->name;
        /*
        return match ($this) {
            self::Manual    => 'Manual',
            self::Automatic => 'Automatic',
            self::Cvt       => 'CVT',
            self::Semiauto  => 'Semi-Auto',
            self::Dual      => 'Dual Clutch',
        };
        */
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
