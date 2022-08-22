<?php

namespace App\Enums;

use App\Enums\Enum;

final class RoyaltyType extends Enum
{
    public const WITHOUT = 1;
    public const FIXED   = 2;
    public const RANGE   = 3;
    public const PERCENT = 4;
}
