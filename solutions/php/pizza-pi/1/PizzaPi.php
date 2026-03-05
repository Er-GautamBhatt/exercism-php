<?php

class PizzaPi
{
    public function calculateDoughRequirement(int $pizzas, int $persons): int
    {
        $grams = $pizzas * (($persons * 20) + 200);
        return (int) round($grams);
    }

    public function calculateSauceRequirement(int $pizzas, int $canVolume): int
    {
        $saucePerPizza = 125;
        $cans = ($pizzas * $saucePerPizza) / $canVolume;

        return (int) ceil($cans);
    }

    public function calculateCheeseCubeCoverage(
        int $cheese_dimension,
        float $thickness,
        int $diameter
    ): int {
        $pizzas = ($cheese_dimension ** 3) / ($thickness * pi() * $diameter);

        return (int) floor($pizzas);
    }

    public function calculateLeftOverSlices(int $pizzas, int $friends): int
    {
        $totalSlices = $pizzas * 8;

        return $totalSlices % $friends;
    }
}