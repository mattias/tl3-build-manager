<?php

namespace App\Helpers;

use phpDocumentor\Reflection\Types\Mixed_;

class BuildlinkParser
{
    // Classes
    const DUSK_MAGE = 'dm';

    // Relics
    const BLOOD_DRINKER = 'bd';

    protected $buildlink;
    protected $buildStart;

    public function parse(string $buildlink): array
    {
        $this->buildlink = $buildlink;
        $this->buildStart = strpos($buildlink, '?');
        $this->buildStart += 7; // Moves to the beginning of the data

        $parsed = [];

        // Build
        $parsed['buildnumber'] = $this->getBuildnumber();

        // Class
        if ($start = strpos($buildlink, '-')) {
            $start++; // to get rid of the dash
            $end = strpos($buildlink, '.', $start);
            $parsed['class'] = substr($buildlink, $start, $end - $start);
        }

        // Relic
        $parsed['relic'] = $this->getRelic();

        // Tree1

        // Tree2

        // Relicskills

        // Hotbar

        // Legendarium

        return $parsed;
    }

    private function getBuildnumber(): int
    {
        return (int) $this->getDataFromPos(
            $this->getPosition(1)
        );
    }

    private function getRelic(): string
    {
        return $this->getRelicFromNumber(
            (int) $this->getDataFromPos(
                $this->getPosition(2)
            )
        );
    }

    private function getRelicFromNumber(int $num): string
    {
        return [
            'b',
            'fd',
            'bd',
            'ch',
            'el',
        ][--$num];
    }

    private function getDataFromPos(array $pos)
    {
        return substr($this->buildlink, $pos['start'], $pos['end']);
    }

    private function getPosition(int $pos): array
    {
        $pos--; // Make it zero based, but keep the argument start with 1
        return [
            'start' => $this->buildStart + $pos,
            'end' => ($this->buildStart + 1 + $pos) - ($this->buildStart + $pos),
        ];
    }
}
