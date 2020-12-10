<?php

namespace App\Helpers;

use App\Helpers\CharacterBuild;

class SkillIconFetcher
{
    protected $isRelic = [
        CharacterBuild::BANE,
        CharacterBuild::FLAMING_DESTROYER,
        CharacterBuild::BLOOD_DRINKER,
        CharacterBuild::COLDHEART,
        CharacterBuild::ELECTRODE,
    ];

    public function get(string $class, string $tree, string $skill)
    {
        $icon_url = '/images/skills/';

        if(empty($tree)) {
            return $icon_url . 'sword_basic_attack.png';
        } else if (in_array($tree, $this->isRelic)) {
            $icon_url .= 'relic_';
        } else {
            $icon_url .= $this->cleanString($class) . '_';
        }

        $icon_url .= $this->cleanString($tree) . '_' . $this->cleanString($skill) . '.png';

        return $icon_url;
    }

    private function cleanString(string $str): string
    {
        return preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($str));
    }
}
