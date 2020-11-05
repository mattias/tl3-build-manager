<?php

namespace App\Helpers;

class BuildlinkParser
{
    // Classes
    const DUSK_MAGE = 'duskmage';
    const FORGED = 'forged';
    const RAILMASTER = 'railmaster';
    const SHARPSHOOTER = 'sharpshooter';

    // Relics
    const BANE = 'bane';
    const FLAMING_DESTROYER = 'flamingdestroyer';
    const BLOOD_DRINKER = 'blooddrinker';
    const COLDHEART = 'coldheart';
    const ELECTRODE = 'electrode';

    // Class positions
    const CLASS_TREE1_POSITIONS = [
        self::DUSK_MAGE => [3, 7, 8, 9, 4, 5, 6],
        self::FORGED => [3, 4, 5, 6, 7, 8, 9],
        self::RAILMASTER => [3, 4, 5, 7, 9, 6, 8],
        self::SHARPSHOOTER => [3, 9, 8, 7, 5, 6, 4],
    ];

    const CLASS_TREE2_POSITIONS = [
        self::DUSK_MAGE => [10, 12, 15, 13, 16, 14, 11],
        self::FORGED => [10, 11, 12, 13, 15, 16, 14],
        self::RAILMASTER => [10, 11, 12, 13, 14, 15, 16],
        self::SHARPSHOOTER => [10, 14, 11, 12, 13, 15, 16],
    ];

    protected $buildlink;
    protected $buildStart;
    protected $class;

    public function parse(string $buildlink): array
    {
        $this->buildlink = $buildlink;
        $this->buildStart = strpos($buildlink, '?');
        $this->buildStart += 7; // Moves to the beginning of the data

        $parsed = [];
        $parsed['class'] = $this->class = $this->getClass();
        $parsed['relic'] = $this->getRelic();
        $parsed['tree1'] = $this->getTree1();
        $parsed['tree2'] = $this->getTree2();
        $parsed['relicskills'] = $this->getRelicskills();
        $parsed['hotbar'] = $this->getHotbar();
        $parsed['legendarium'] = $this->getLegendarium();

        return $parsed;
    }

    private function getClass(): string
    {
        return $this->getClassFromNumber(
            (int) $this->getDataFromPos(
                $this->getPosition(1)
            )
        );
    }

    private function getClassFromNumber(int $num): string
    {
        return [
            self::DUSK_MAGE,
            self::FORGED,
            self::RAILMASTER,
            self::SHARPSHOOTER,
        ][$this->zeroBased($num)];
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
            self::BANE,
            self::FLAMING_DESTROYER,
            self::BLOOD_DRINKER,
            self::COLDHEART,
            self::ELECTRODE,
        ][$this->zeroBased($num)];
    }

    private function getTree1(): array
    {
        $tree = [];
        $positions = self::CLASS_TREE1_POSITIONS[$this->class];

        foreach ($positions as $pos) {
            $tree[] = $this->chardec($this->getDataFromPos($this->getPosition($pos)));
        }

        return $tree;
    }

    private function getTree2(): array
    {
        $tree = [];
        $positions = self::CLASS_TREE2_POSITIONS[$this->class];

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
