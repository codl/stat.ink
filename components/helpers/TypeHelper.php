<?php

/**
 * @copyright Copyright (C) 2015-2023 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

namespace app\components\helpers;

use Stringable;

use function filter_var;
use function is_float;
use function is_int;
use function is_scalar;

use const FILTER_VALIDATE_FLOAT;
use const FILTER_VALIDATE_INT;

final class TypeHelper
{
    public static function stringOrNull(mixed $value): ?string
    {
        return is_scalar($value) || $value instanceof Stringable ? (string)$value : null;
    }

    public static function intOrNull(mixed $value): ?int
    {
        if (is_int($value) || $value === null) {
            return $value;
        }

        $value = filter_var(self::stringOrNull($value), FILTER_VALIDATE_INT);
        return is_int($value) ? $value : null;
    }

    public static function floatOrNull(mixed $value): ?float
    {
        if (is_float($value) || $value === null) {
            return $value;
        }

        $value = filter_var(self::stringOrNull($value), FILTER_VALIDATE_FLOAT);
        return is_float($value) ? $value : null;
    }
}
