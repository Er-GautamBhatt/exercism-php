<?php

class LuckyNumbers
{
    public function sumUp(array $arr1, array $arr2): int
    {
        $num1 = (int) implode('', $arr1);
        $num2 = (int) implode('', $arr2);

        return $num1 + $num2;
    }

    public function isPalindrome(int $number): bool
    {
        $str = (string) $number;
        return $str === strrev($str);
    }

    public function validate(string $input): string
    {
        if ($input === '') {
        return 'Required field';
    }

    if ((int)$input <= 0) {
        return 'Must be a whole number larger than 0';
    }

    return '';
    }
}