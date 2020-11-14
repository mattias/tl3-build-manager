<?php

namespace Tests\Feature\Helpers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Helpers\BuildlinkParser;
use App\Helpers\CharacterBuild;
use App\Helpers\CharacterSkillTab;
use App\Helpers\Hotbar;
use App\Helpers\Legendarium;
use App\Helpers\Legendariums;

class BuildlinkParserTest extends TestCase
{
    /** @test */
    public function can_parse_dusk_mage_blood_drinker_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html?build=13156723471642531000010010cfhap8614;1;28;33";

        $class = 'Dusk Mage';
        $relic = 'Blood Drinker';

        $tree1Points = [1, 2, 3, 4, 5, 6, 7];
        $tree1 = new CharacterSkillTab("Light", $tree1Points);

        $tree2Points = [7, 6, 5, 4, 3, 2, 1];
        $tree2 = new CharacterSkillTab("Dark", $tree2Points);

        $relicPoints = [1, 0, 0, 0, 0, 1, 0, 0, 1, 0];
        $relicTree = new CharacterSkillTab($relic, $relicPoints);

        $skilltabs = [
            $tree1,
            $tree2,
            $relicTree,
        ];

        $hotbarPositions = [12, 15, 17, 10, 25, 8, 6, 1, 4];
        $hotbar = new Hotbar($hotbarPositions, $skilltabs);

        Legendariums::init();
        $legendariums = [
            1 => Legendariums::getLegendariumById(1),
            2 => Legendariums::getLegendariumById(28),
            3 => Legendariums::getLegendariumById(33),
        ];

        $expected = new CharacterBuild(
            $class,
            $relic,
            $skilltabs,
            $hotbar,
            $legendariums
        );

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @testw */
    public function can_parse_sharpshooter_electrode_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-ss.html?build=45175643275436211000010001f7a48hd13;21;35;40";

        $class = 'Sharpshooter';
        $relic = 'Electrode';

        $tree1Points = [1, 2, 3, 4, 5, 6, 7];
        $tree1 = new CharacterSkillTab("Precision", $tree1Points);

        $tree2Points = [7, 6, 5, 4, 3, 2, 1];
        $tree2 = new CharacterSkillTab("Adventurer", $tree2Points);

        $relicPoints = [1, 0, 0, 0, 0, 1, 0, 0, 1, 0];
        $relicTree = new CharacterSkillTab($relic, $relicPoints);

        $skilltabs = [
            $tree1,
            $tree2,
            $relicTree,
        ];

        $hotbarPositions = [15, 7, 10, 4, 8, 17, 13, 1, 3];
        $hotbar = new Hotbar($hotbarPositions, $skilltabs);

        Legendariums::init();
        $legendariums = [
            1 => Legendariums::getLegendariumById(21),
            2 => Legendariums::getLegendariumById(35),
            3 => Legendariums::getLegendariumById(40),
        ];

        $expected = new CharacterBuild(
            $class,
            $relic,
            $skilltabs,
            $hotbar,
            $legendariums
        );

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @testw */
    public function can_parse_railmaster_coldheart_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-railmaster.html?build=3412364757654321100002001138796ad1c;11;20;30";

        $class = 'Railmaster';
        $relic = 'Coldheart';

        $tree1Points = [1, 2, 3, 4, 5, 6, 7];
        $tree1 = new CharacterSkillTab("Conductor", $tree1Points);

        $tree2Points = [7, 6, 5, 4, 3, 2, 1];
        $tree2 = new CharacterSkillTab("Slammer", $tree2Points);

        $relicPoints = [1, 0, 0, 0, 0, 1, 0, 0, 1, 0];
        $relicTree = new CharacterSkillTab($relic, $relicPoints);

        $skilltabs = [
            $tree1,
            $tree2,
            $relicTree,
        ];

        $hotbarPositions = [3, 8, 7, 9, 6, 10, 13, 1, 12];
        $hotbar = new Hotbar($hotbarPositions, $skilltabs);

        Legendariums::init();
        $legendariums = [
            1 => Legendariums::getLegendariumById(11),
            2 => Legendariums::getLegendariumById(20),
            3 => Legendariums::getLegendariumById(30),
        ];

        $expected = new CharacterBuild(
            $class,
            $relic,
            $skilltabs,
            $hotbar,
            $legendariums
        );

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @testw */
    public function can_parse_forged_bane_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=211234567765413210000101014mga08713;28;16;45";

        $class = 'Forged';
        $relic = 'Bane';

        $tree1Points = [1, 2, 3, 4, 5, 6, 7];
        $tree1 = new CharacterSkillTab("Barrage", $tree1Points);

        $tree2Points = [7, 6, 5, 4, 3, 2, 1];
        $tree2 = new CharacterSkillTab("Brawl", $tree2Points);

        $relicPoints = [1, 0, 0, 0, 0, 1, 0, 0, 1, 0];
        $relicTree = new CharacterSkillTab($relic, $relicPoints);

        $skilltabs = [
            $tree1,
            $tree2,
            $relicTree,
        ];

        $hotbarPositions = [4, 22, 16, 10, 0, 8, 7, 1, 3];
        $hotbar = new Hotbar($hotbarPositions, $skilltabs);

        Legendariums::init();
        $legendariums = [
            1 => Legendariums::getLegendariumById(28),
            2 => Legendariums::getLegendariumById(16),
            3 => Legendariums::getLegendariumById(45),
        ];

        $expected = new CharacterBuild(
            $class,
            $relic,
            $skilltabs,
            $hotbar,
            $legendariums
        );

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @testw */
    public function can_parse_forged_flaming_destroyer_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=221234567765413210000101014mga08713;28;16;45";

        $class = 'Forged';
        $relic = 'Flaming Destroyer';

        $tree1Points = [1, 2, 3, 4, 5, 6, 7];
        $tree1 = new CharacterSkillTab("Barrage", $tree1Points);

        $tree2Points = [7, 6, 5, 4, 3, 2, 1];
        $tree2 = new CharacterSkillTab("Brawl", $tree2Points);

        $relicPoints = [1, 0, 0, 0, 0, 1, 0, 0, 1, 0];
        $relicTree = new CharacterSkillTab($relic, $relicPoints);

        $skilltabs = [
            $tree1,
            $tree2,
            $relicTree,
        ];

        $hotbarPositions = [4, 22, 16, 10, 0, 8, 7, 1, 3];
        $hotbar = new Hotbar($hotbarPositions, $skilltabs);

        Legendariums::init();
        $legendariums = [
            1 => Legendariums::getLegendariumById(28),
            2 => Legendariums::getLegendariumById(16),
            3 => Legendariums::getLegendariumById(45),
        ];

        $expected = new CharacterBuild(
            $class,
            $relic,
            $skilltabs,
            $hotbar,
            $legendariums
        );

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertInstanceOf(CharacterBuild::class, $actual);
        $this->assertEquals($expected, $actual);
    }
}
