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

class SimpleCipher
{
    public string $key;

    public function __construct(string $key = null)
    {
        if ($key === null) {
            $this->key = $this->generateKey();
        } else {
            if (!preg_match('/^[a-z]+$/', $key)) {
                throw new InvalidArgumentException("Key must contain lowercase letters only");
            }
            $this->key = $key;
        }
    }

    private function generateKey(): string
    {
        $key = '';
        for ($i = 0; $i < 100; $i++) {
            $key .= chr(random_int(0, 25) + ord('a'));
        }
        return $key;
    }

    public function encode(string $plainText): string
    {
        $result = '';
        $keyLen = strlen($this->key);

        for ($i = 0; $i < strlen($plainText); $i++) {
            $shift = ord($this->key[$i % $keyLen]) - ord('a');
            $char = ord($plainText[$i]) - ord('a');

            $encoded = ($char + $shift) % 26;
            $result .= chr($encoded + ord('a'));
        }

        return $result;
    }

    public function decode(string $cipherText): string
    {
        $result = '';
        $keyLen = strlen($this->key);

        for ($i = 0; $i < strlen($cipherText); $i++) {
            $shift = ord($this->key[$i % $keyLen]) - ord('a');
            $char = ord($cipherText[$i]) - ord('a');

            $decoded = ($char - $shift + 26) % 26;
            $result .= chr($decoded + ord('a'));
        }

        return $result;
    }
}
