<?php

declare(strict_types=1);

class Tournament
{
    private array $teams = [];

    public function tally(string $input): string
    {
        if (trim($input) === '') {
            return $this->formatTable([]);
        }

        $lines = explode("\n", trim($input));

        foreach ($lines as $line) {
            [$team1, $team2, $result] = explode(';', trim($line));

            $this->initTeam($team1);
            $this->initTeam($team2);

            $this->teams[$team1]['MP']++;
            $this->teams[$team2]['MP']++;

            switch ($result) {
                case 'win':
                    $this->teams[$team1]['W']++;
                    $this->teams[$team2]['L']++;
                    $this->teams[$team1]['P'] += 3;
                    break;

                case 'loss':
                    $this->teams[$team2]['W']++;
                    $this->teams[$team1]['L']++;
                    $this->teams[$team2]['P'] += 3;
                    break;

                case 'draw':
                    $this->teams[$team1]['D']++;
                    $this->teams[$team2]['D']++;
                    $this->teams[$team1]['P'] += 1;
                    $this->teams[$team2]['P'] += 1;
                    break;
            }
        }

        $teams = $this->teams;

        uasort($teams, function ($a, $b) {
            if ($a['P'] === $b['P']) {
                return strcmp($a['name'], $b['name']);
            }
            return $b['P'] <=> $a['P'];
        });

        return $this->formatTable($teams);
    }

    private function initTeam(string $name): void
    {
        if (!isset($this->teams[$name])) {
            $this->teams[$name] = [
                'name' => $name,
                'MP' => 0,
                'W' => 0,
                'D' => 0,
                'L' => 0,
                'P' => 0
            ];
        }
    }

    private function formatTable(array $teams): string
    {
        $output = "Team                           | MP |  W |  D |  L |  P";

        foreach ($teams as $team) {
            $output .= sprintf(
                "\n%-30s | %2d | %2d | %2d | %2d | %2d",
                $team['name'],
                $team['MP'],
                $team['W'],
                $team['D'],
                $team['L'],
                $team['P']
            );
        }

        return $output;
    }
}