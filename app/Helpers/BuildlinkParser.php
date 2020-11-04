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
        $parsed['buildnumber'] = $this->getBuildnumber();
        $parsed['class'] = $this->getClass();
        $parsed['relic'] = $this->getRelic();
        $parsed['tree1'] = $this->getTree1();
        $parsed['tree2'] = $this->getTree2();
        $parsed['relicskills'] = $this->getRelicskills();
        $parsed['hotbar'] = $this->getHotbar();
        $parsed['legendarium'] = $this->getLegendarium();

        return $parsed;
    }

    private function getBuildnumber(): int
    {
        return (int) $this->getDataFromPos(
            $this->getPosition(1)
        );
    }

    private function getClass(): string
    {
        $start = strpos($this->buildlink, '-');
        $start++; // to get rid of the dash
        $end = strpos($this->buildlink, '.', $start);
        return substr($this->buildlink, $start, $end - $start);
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
        ][$this->zeroBased($num)];
    }

    private function getTree1(): array
    {
        $tree = [];
        $positions = [3, 7, 8, 9, 4, 5, 6];

        foreach ($positions as $pos) {
            $tree[] = $this->chardec($this->getDataFromPos($this->getPosition($pos)));
        }

        return $tree;
    }

    private function getTree2(): array
    {
        $tree = [];
        $positions = [10, 12, 15, 13, 16, 14, 11];

        foreach ($positions as $pos) {
            $tree[] = $this->chardec($this->getDataFromPos($this->getPosition($pos)));
        }

        return $tree;
    }

    private function getRelicskills(): array
    {
        $tree = [];
        $positions = [17, 18, 19, 20, 21, 22, 23, 24, 25, 26];

        foreach ($positions as $pos) {
            $tree[] = $this->chardec($this->getDataFromPos($this->getPosition($pos)));
        }

        return $tree;
    }

    private function getHotbar(): array
    {
        $tree = [];
        $positions = [27, 28, 29, 30, 31, 32, 33, 34, 35];

        foreach ($positions as $pos) {
            $tree[] = $this->chardec($this->getDataFromPos($this->getPosition($pos)));
        }

        return $tree;
    }

    private function getLegendarium(): array
    {
        $legendarium = explode(';', substr($this->buildlink, $this->getPosition(37)['start']));

        return $legendarium;
    }

    private function getDataFromPos(array $pos)
    {
        return substr($this->buildlink, $pos['start'], $pos['end']);
    }

    private function getPosition(int $pos): array
    {
        $pos = $this->zeroBased($pos);

        return [
            'start' => $this->buildStart + $pos,
            'end' => ($this->buildStart + 1 + $pos) - ($this->buildStart + $pos),
        ];
    }

    // Maybe a better name?
    private function zeroBased(int $num): int
    {
        return ($num <= 0)
            ? 0
            : --$num;
    }

    // I thought it was hex first, but it was just regular characters
    private function chardec(string $char): int
    {
        return is_numeric($char)
            ? (int) $char
            : ord(strtolower($char)) - 87;
    }
}
