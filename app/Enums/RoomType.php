<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
final class RoomType extends Enum
{
    const Single = 1;
    const Double = 2;
    const Suite = 3;


    public function getColour($colour):string
    {
        return match ($colour) {
            self::Single => 'info',
            self::Double => 'warning',
            self::Suite => 'danger',
        };
    }

    public static function mapValueToName(): array
    {
        return [
            self::Single => 'Single',
            self::Double => 'Double',
            self::Suite => 'Suite',
        ];
    }

    public static function mapNameToValue(): array
    {
        return [
            'Single' => self::Single,
            'Double' => self::Double,
            'Suite' => self::Suite
        ];
    }
}
