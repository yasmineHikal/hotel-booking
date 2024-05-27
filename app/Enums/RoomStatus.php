<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RoomStatus extends Enum
{
    const Available = 1;
    const Pending = 2;
    const Booked = 3;



    public function getColour($colour):string
    {
        return match ($colour) {
            self::Available => 'info',
            self::Pending => 'warning',
            self::Booked => 'danger',
        };
    }

    public static function mapValueToName(): array
    {
        return [
            self::Available => 'Available',
            self::Pending => 'Pending',
            self::Booked => 'Booked',
        ];
    }

    public static function mapNameToValue(): array
    {
        return [
            'Available' => self::Available,
            'Pending' => self::Pending,
            'Booked' => self::Booked
        ];
    }

}
