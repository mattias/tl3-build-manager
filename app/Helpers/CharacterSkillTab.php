<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Storage;

class CharacterSkillTab
{
    protected $displayName;
    protected $skills = [];

    public function __construct(string $displayName, array $levels)
    {
        $this->displayName = $displayName;
        $skills = json_decode(Storage::disk('local')->get('skills.json'), true);

        foreach ($skills['skillTabs'] as $skillTab) {
            if ($displayName === $skillTab['displayName']) {
                $sort = constant('\App\Helpers\CharacterBuild::' . str_replace(' ', '_', strtoupper($displayName)) . '_SORT');
                foreach($skillTab['skills'] as $skill) {
                    $key = array_search($skill['displayName'], $sort);
                    $this->skills[$key] = new CharacterSkill(
                        $skill['displayName'],
                        $skill['requiredLevelInSkillTab'],
                        $skill['skillTabRow'],
                        $skill['skillTabColumn'],
                        $skill['skillType'],
                        $skill['perLevelBonusTexts'],
                        $skill['perLevelDescriptions'],
                        $skill['tierBonusDescriptions'],
                        $levels[$key]
                    );
                }
                ksort($this->skills);
                break;
            }
        }

        if(empty($this->skills)) {
            throw new Exception("No skilltab found with the name of " . $displayName);
        }
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function getSkills()
    {
        return $this->skills;
    }
}
