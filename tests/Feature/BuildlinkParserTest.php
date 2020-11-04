<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Helpers\BuildlinkParser;

class BuildlinkParserTest extends TestCase
{
    /** @test */
    public function can_parse_dusk_mage_blood_drinker_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html?build=136a0000600100160101110000cklf9g014;2;4;7";

        $expected = [
            'buildnumber' => 1,
            'class' => BuildlinkParser::DUSK_MAGE,
            'relic' => BuildlinkParser::BLOOD_DRINKER,
            'tree1' => [6, 0, 0, 6, 10, 0, 0],
            'tree2' => [0, 1, 1, 0, 6, 0, 0],
            'relicskills' => [0, 1, 0, 1, 1, 1, 0, 0, 0, 0],
            'hotbar' => [12, 20, 21, 15, 9, 16, 0, 1, 4],
            'legendarium' => [2, 4, 7],
        ];

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_parse_sharpshooter_electrode_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-ss.html?build=150a006a606a0303540700000078ghkce14;31;41;57";

        $expected = [
            'buildnumber' => 1,
            'class' => BuildlinkParser::SHARPSHOOTER,
            'relic' => BuildlinkParser::ELECTRODE,
            'tree1' => [0, 6, 10, 6, 0, 0, 10],
            'tree2' => [0, 3, 6, 10, 0, 0, 3],
            'relicskills' => [5, 4, 0, 7, 0, 0, 0, 0, 0, 0],
            'hotbar' => [7, 8, 16, 17, 20, 12, 14, 1, 4],
            'legendarium' => [31, 41, 57],
        ];

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_parse_railmaster_coldheart_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-railmaster.html?build=14123647512345670100100001id6387a1g;0;0;0";

        $expected = [
            'buildnumber' => 1,
            'class' => BuildlinkParser::RAILMASTER,
            'relic' => BuildlinkParser::COLDHEART,
            'tree1' => [1, 2, 3, 4, 5, 6, 7],
            'tree2' => [1, 2, 3, 4, 5, 6, 7],
            'relicskills' => [0, 1, 0, 0, 1, 0, 0, 0, 0, 1],
            'hotbar' => [18, 13, 6, 3, 8, 7, 10, 1, 16],
            'legendarium' => [0, 0, 0],
        ];

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_parse_forged_bane_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=111234567123475610000200014e768cf13;1;2;22";

        $expected = [
            'buildnumber' => 1,
            'class' => BuildlinkParser::FORGED,
            'relic' => BuildlinkParser::BANE,
            'tree1' => [1, 2, 3, 4, 5, 6, 7],
            'tree2' => [1, 2, 3, 4, 5, 6, 7],
            'relicskills' => [1, 0, 0, 0, 0, 2, 0, 0, 0, 1],
            'hotbar' => [4, 14, 7, 6, 8, 12, 15, 1, 3],
            'legendarium' => [1, 2, 22],
        ];

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }
}
