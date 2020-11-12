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
        $levelIndex = 0;
        foreach ($skills['skillTabs'] as $skillTab) {
            if ($displayName === $skillTab['displayName']) {
                foreach($skillTab['skills'] as $skill) {
                    $this->skills[] = new CharacterSkill(
                        $skill['displayName'],
                        $skill['requiredLevelInSkillTab'],
                        $skill['skillTabRow'],
                        $skill['skillTabColumn'],
                        $skill['skillType'],
                        $skill['perLevelBonusTexts'],
                        $skill['perLevelDescriptions'],
                        $skill['tierBonusDescriptions'],
                        $levels[$levelIndex++]
                    );
                }
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
