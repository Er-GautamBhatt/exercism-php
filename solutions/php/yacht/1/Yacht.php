<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class Yacht
{
    public function score(array $rolls, string $category): int
    {
        $counts = array_count_values($rolls);
        $sum = array_sum($rolls);
        sort($rolls);

        switch ($category) {

            case 'ones':
                return ($counts[1] ?? 0) * 1;

            case 'twos':
                return ($counts[2] ?? 0) * 2;

            case 'threes':
                return ($counts[3] ?? 0) * 3;

            case 'fours':
                return ($counts[4] ?? 0) * 4;

            case 'fives':
                return ($counts[5] ?? 0) * 5;

            case 'sixes':
                return ($counts[6] ?? 0) * 6;

            case 'choice':
                return $sum;

            case 'yacht':
                return count($counts) === 1 ? 50 : 0;

            case 'four of a kind':
                foreach ($counts as $num => $count) {
                    if ($count >= 4) {
                        return $num * 4;
                    }
                }
                return 0;

            case 'full house':
                if (count($counts) === 2 && in_array(3, $counts) && in_array(2, $counts)) {
                    return $sum;
                }
                return 0;

            case 'little straight':
                return $rolls === [1,2,3,4,5] ? 30 : 0;

            case 'big straight':
                return $rolls === [2,3,4,5,6] ? 30 : 0;

            default:
                return 0;
        }
    }
}
