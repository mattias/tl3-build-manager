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
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html?build=13156723471642531000010010cfhap8614;1;28;33";

        $expected = [
            'class' => BuildlinkParser::DUSK_MAGE,
            'relic' => BuildlinkParser::BLOOD_DRINKER,
            'tree1' => [1, 2, 3, 4, 5, 6, 7],
            'tree2' => [7, 6, 5, 4, 3, 2, 1],
            'relicskills' => [1, 0, 0, 0, 0, 1, 0, 0, 1, 0],
            'hotbar' => [12, 15, 17, 10, 25, 8, 6, 1, 4],
            'legendarium' => [1, 28, 33],
        ];

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_parse_sharpshooter_electrode_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-ss.html?build=45175643275436211000010001f7a48hd13;21;35;40";

        $expected = [
            'class' => BuildlinkParser::SHARPSHOOTER,
            'relic' => BuildlinkParser::ELECTRODE,
            'tree1' => [1, 2, 3, 4, 5, 6, 7],
            'tree2' => [7, 6, 5, 4, 3, 2, 1],
            'relicskills' => [1, 0, 0, 0, 0, 1, 0, 0, 0, 1],
            'hotbar' => [15, 7, 10, 4, 8, 17, 13, 1, 3],
            'legendarium' => [21, 35, 40],
        ];

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_parse_railmaster_coldheart_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-railmaster.html?build=3412364757654321100002001138796ad1c;11;20;30";

        // 1236475 7654321
        // 3456789
        $expected = [
            'class' => BuildlinkParser::RAILMASTER,
            'relic' => BuildlinkParser::COLDHEART,
            'tree1' => [1, 2, 3, 4, 5, 6, 7],
            'tree2' => [7, 6, 5, 4, 3, 2, 1],
            'relicskills' => [1, 0, 0, 0, 0, 2, 0, 0, 1, 1],
            'hotbar' => [3, 8, 7, 9, 6, 10, 13, 1, 12],
            'legendarium' => [11, 20, 30],
        ];

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_parse_forged_bane_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=211234567765413210000101014mga08713;28;16;45";

        $expected = [
            'class' => BuildlinkParser::FORGED,
            'relic' => BuildlinkParser::BANE,
            'tree1' => [1, 2, 3, 4, 5, 6, 7],
            'tree2' => [7, 6, 5, 4, 3, 2, 1],
            'relicskills' => [1, 0, 0, 0, 0, 1, 0, 1, 0, 1],
            'hotbar' => [4, 22, 16, 10, 0, 8, 7, 1, 3],
            'legendarium' => [28, 16, 45],
        ];

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }
}
