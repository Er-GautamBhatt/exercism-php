<?php

class Lasagna
{
    // The lasagna should be in the oven for 40 minutes.
    public function expectedCookTime()
    {
        return 40;
    }

    // Calculates how many minutes the lasagna still needs to bake.
    public function remainingCookTime($elapsed_minutes)
    {
        return $this->expectedCookTime() - $elapsed_minutes;
    }

    // Each layer takes 2 minutes to prepare.
    public function totalPreparationTime($layers_to_prep)
    {
        return $layers_to_prep * 2;
    }

    // Total time spent so far: prep time + time already in the oven.
    public function totalElapsedTime($layers_to_prep, $elapsed_minutes)
    {
        return $this->totalPreparationTime($layers_to_prep) + $elapsed_minutes;
    }

    // Just a friendly notification that it's done!
    public function alarm()
    {
        return "Ding!";
    }
}
