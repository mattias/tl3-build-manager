<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Helpers\BuildlinkParser;

class SkillParserTest extends TestCase
{
    /** @test */
    public function can_parse_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html?build=136a0000600100160101110000cklf9g014;2;4;7";
        /** Note: Remember positions, those are the hotbar spots, from 10 and upward it starts with the alphabet (dechex() / hexdec())
         * pos1: buildnumber
         * pos2: relic picked
         * pos3: tree1 skill1
         * pos4: tree1 skill5
         * pos5: tree1 skill6
         * pos6: tree1 skill7
         * pos7: tree1 skill2
         * pos8: tree1 skill3
         * pos9: tree1 skill4
         * pos10: tree2 skill1
         * pos11: tree2 skill7
         * pos12: tree2 skill2
         * pos13: tree2 skill4
         * pos14: tree2 skill6
         * pos15: tree2 skill3
         * pos16: tree2 skill5
         * pos17: relic skill1
         * pos18: relic skill2
         * pos19: relic skill3
         * pos20: relic skill4
         * pos21: relic skill5
         * pos22: relic skill6
         * pos23: relic skill7
         * pos24: relic skill8
         * pos25: relic skill9
         * pos26: relic skill10
         * pos27: hotbar pos1
         * pos28: hotbar pos2
         * pos29: hotbar pos3
         * pos30: hotbar pos4
         * pos31: hotbar pos5
         * pos32: hotbar pos6
         * pos33: hotbar pos7
         * pos34: hotbar pos8
         * pos35: hotbar pos9
         * pos36: separator ;
         * pos37: legendarium id1
         * pos38: separator ;
         * pos39: legendarium id2
         * pos40: separator ;
         * pos41: legendarium id3
         */

        $expected = [
            'buildnumber' => 1,
            'class' => BuildlinkParser::DUSK_MAGE,
            'relic' => BuildlinkParser::BLOOD_DRINKER,
            'tree1' => [6, 0, 0, 6, 10, 0, 0],
            'tree2' => [0, 1, 1, 0, 6, 0, 0],
            'relicskills' => [0, 1, 0, 1, 1, 1, 0, 0, 0, 0],
            'hotbar' => [dechex(12), dechex(20), dechex(21), dechex(15), 9, dechex(16), 0, 1, 4],
            'legendarium' => [2, 4, 7],
        ];

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }
}
