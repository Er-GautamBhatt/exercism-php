<?php

declare(strict_types=1);

class Proverb
{
    public function recite(array $pieces): array
    {
        $result = [];
        $count = count($pieces);

        if ($count === 0) {
            return [];
        }

        for ($i = 0; $i < $count - 1; $i++) {
            $result[] = "For want of a {$pieces[$i]} the {$pieces[$i + 1]} was lost.";
        }

        $result[] = "And all for the want of a {$pieces[0]}.";

        return $result;
    }
}