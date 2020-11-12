<?php

namespace App\Helpers;

use App\Helpers\CharacterBuild;

class BuildlinkParser
{
    // Class positions
    const CLASS_TREE1_POSITIONS = [
        CharacterBuild::DUSK_MAGE => [3, 7, 8, 9, 4, 5, 6],
        CharacterBuild::FORGED => [3, 4, 5, 6, 7, 8, 9],
        CharacterBuild::RAILMASTER => [3, 4, 5, 7, 9, 6, 8],
        CharacterBuild::SHARPSHOOTER => [3, 9, 8, 7, 5, 6, 4],
    ];

    const CLASS_TREE2_POSITIONS = [
        CharacterBuild::DUSK_MAGE => [10, 12, 15, 13, 16, 14, 11],
        CharacterBuild::FORGED => [10, 11, 12, 13, 15, 16, 14],
        CharacterBuild::RAILMASTER => [10, 11, 12, 13, 14, 15, 16],
        CharacterBuild::SHARPSHOOTER => [10, 14, 11, 12, 13, 15, 16],
    ];

    const CLASS_TO_TREES = [
        CharacterBuild::DUSK_MAGE => [CharacterBuild::LIGHT, CharacterBuild::DARK],
        CharacterBuild::FORGED => [CharacterBuild::BARRAGE, CharacterBuild::BRAWL],
        CharacterBuild::RAILMASTER => [CharacterBuild::CONDUCTOR, CharacterBuild::LINEAGE],
        CharacterBuild::SHARPSHOOTER => [CharacterBuild::PRECISION, CharacterBuild::ADVENTURER],
    ];

    protected $buildlink;
    protected $buildStart;
    protected $class;
    protected $characterBuild;

    public function parse(string $buildlink): CharacterBuild
    {
        $this->buildlink = $buildlink;
        $this->buildStart = strpos($buildlink, '?');
        $this->buildStart += 7; // Moves to the beginning of the data
        $this->characterBuild = new CharacterBuild;

        $this->parseClass();
        $this->parseRelic();
        $this->parseTree1();
        $this->parseTree2();
        $this->parseRelicTree();
        $this->parseHotbar();
        $this->parseLegendariums();

        return $this->characterBuild;
    }

    private function parseClass(): void
    {
        $this->characterBuild->setClass($this->getClass());
    }

    private function parseRelic(): void
    {
        $this->characterBuild->setRelic($this->getRelic());
    }

    private function parseTree1(): void
    {
        $tree1Levels = $this->getTree1();
        $tree1 = new CharacterSkillTab(self::CLASS_TO_TREES[$this->class][0], $tree1Levels);
        $this->characterBuild->addSkillTab($tree1);
    }

    private function parseTree2(): void
    {
        $tree2Levels = $this->getTree2();
        $tree2 = new CharacterSkillTab(self::CLASS_TO_TREES[$this->class][1], $tree2Levels);
        $this->characterBuild->addSkillTab($tree2);
    }

    private function parseRelicTree(): void
    {
        $relicLevels = $this->getRelicskills();
        $relic = new CharacterSkillTab($this->relic, $relicLevels);
        $this->characterBuild->addSkillTab($relic);
    }

    private function parseHotbar(): void
    {
        $hotbarold = $this->getHotbar();
        $hotbar = new Hotbar;
        $this->characterBuild->setHotbar($hotbar);
    }

    private function parseLegendariums(): void
    {
        $legendariumsold = $this->getLegendariums();
        $legendarium1 = new Legendarium;
        $this->characterBuild->addLegendarium($legendarium1, 1);
        $legendarium2 = new Legendarium;
        $this->characterBuild->addLegendarium($legendarium2, 2);
        $legendarium3 = new Legendarium;
        $this->characterBuild->addLegendarium($legendarium3, 3);
    }

    private function getClass(): string
    {
        return $this->class = $this->getClassFromNumber(
            (int) $this->getDataFromPos(
                $this->getPosition(1)
            )
        );
    }

    private function getClassFromNumber(int $num): string
    {
        return [
            CharacterBuild::DUSK_MAGE,
            CharacterBuild::FORGED,
            CharacterBuild::RAILMASTER,
            CharacterBuild::SHARPSHOOTER,
        ][$this->zeroBased($num)];
    }

    private function getRelic(): string
    {
        return $this->relic = $this->getRelicFromNumber(
            (int) $this->getDataFromPos(
                $this->getPosition(2)
            )
        );
    }

    private function getRelicFromNumber(int $num): string
    {
        return [
            CharacterBuild::BANE,
            CharacterBuild::FLAMING_DESTROYER,
            CharacterBuild::BLOOD_DRINKER,
            CharacterBuild::COLDHEART,
            CharacterBuild::ELECTRODE,
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

    private function getLegendariums(): array
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
