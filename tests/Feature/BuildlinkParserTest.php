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
            'tree1' => [
                'name' => BuildlinkParser::LIGHT,
                'skills' => [
                    [
                        'name' => BuildlinkParser::HOLY_BOLT,
                        'points' => 1,
                    ],
                    [
                        'name' => BuildlinkParser::RADIANT_BLAST,
                        'points' => 2,
                    ],
                    [
                        'name' => BuildlinkParser::CONCENCRATION,
                        'points' => 3,
                    ],
                    [
                        'name' => BuildlinkParser::LIGHT_SPEAR,
                        'points' => 4,
                    ],
                    [
                        'name' => BuildlinkParser::HOLY_FURY,
                        'points' => 5,
                    ],
                    [
                        'name' => BuildlinkParser::LUMONOUS_RUN,
                        'points' => 6,
                    ],
                    [
                        'name' => BuildlinkParser::ABSOLVER,
                        'points' => 7,
                    ],
                ],
            ],
            'tree2' => [
                'name' => BuildlinkParser::DARK,
                'skills' => [
                    [
                        'name' => BuildlinkParser::UNHOLY_BOLT,
                        'points' => 7,
                    ],
                    [
                        'name' => BuildlinkParser::DARK_SPEARS,
                        'points' => 6,
                    ],
                    [
                        'name' => BuildlinkParser::SHADOW_STEP,
                        'points' => 5,
                    ],
                    [
                        'name' => BuildlinkParser::SPIRIT_WELL,
                        'points' => 4,
                    ],
                    [
                        'name' => BuildlinkParser::ENERGY_SPIKE,
                        'points' => 3,
                    ],
                    [
                        'name' => BuildlinkParser::DAMNATION,
                        'points' => 2,
                    ],
                    [
                        'name' => BuildlinkParser::ENTROPY,
                        'points' => 1,
                    ],
                ],
            ],
            'relicskills' => [
                [
                    'name' => BuildlinkParser::SPINNINGBLADE,
                    'points' => 1,
                ],
                [
                    'name' => BuildlinkParser::BLOODLETTER,
                    'points' => 0,
                ],
                [
                    'name' => BuildlinkParser::BLADESFORCUTTING,
                    'points' => 0,
                ],
                [
                    'name' => BuildlinkParser::BLOODSEEKERS,
                    'points' => 0,
                ],
                [
                    'name' => BuildlinkParser::LIVINGBARRIER,
                    'points' => 0,
                ],
                [
                    'name' => BuildlinkParser::RUPTURE,
                    'points' => 1,
                ],
                [
                    'name' => BuildlinkParser::BLOODYCHALICE,
                    'points' => 0,
                ],
                [
                    'name' => BuildlinkParser::DRAIN,
                    'points' => 0,
                ],
                [
                    'name' => BuildlinkParser::DANCEOFDEATH,
                    'points' => 1,
                ],
                [
                    'name' => BuildlinkParser::ENERGIZER,
                    'points' => 0,
                ],
            ],
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
            'tree1' => [
                'name' => 'precision',
                'skills' => [
                    [
                        'name' => 'tight_grouping',
                        'points' => 1,
                    ],
                    [
                        'name' => 'onslaught',
                        'points' => 2,
                    ],
                    [
                        'name' => 'targeted_strikes',
                        'points' => 3,
                    ],
                    [
                        'name' => 'reload',
                        'points' => 4,
                    ],
                    [
                        'name' => 'explosive_arrow',
                        'points' => 5,
                    ],
                    [
                        'name' => 'heart_seeker',
                        'points' => 6,
                    ],
                    [
                        'name' => 'scatter_shot',
                        'points' => 7,
                    ],
                ],
            ],
            'tree2' => [
                'name' => 'adventurer',
                'skills' => [
                    [
                        'name' => 'scouts_bones',
                        'points' => 7,
                    ],
                    [
                        'name' => 'goblin_legion',
                        'points' => 6,
                    ],
                    [
                        'name' => 'ghost_visage',
                        'points' => 5,
                    ],
                    [
                        'name' => 'rizzis_fate',
                        'points' => 4,
                    ],
                    [
                        'name' => 'sacrifice_to_goose',
                        'points' => 3,
                    ],
                    [
                        'name' => 'curse_of_pi_pi',
                        'points' => 2,
                    ],
                    [
                        'name' => 'shasta',
                        'points' => 1,
                    ],
                ],
            ],
            'relicskills' => [
                [
                    'name' => 'localizedstorm',
                    'points' => 1,
                ],
                [
                    'name' => 'shockingdisplay',
                    'points' => 0,
                ],
                [
                    'name' => 'shockingforce',
                    'points' => 0,
                ],
                [
                    'name' => 'chaoticstrikes',
                    'points' => 0,
                ],
                [
                    'name' => 'lightningbarrier',
                    'points' => 0,
                ],
                [
                    'name' => 'tinglingsensation',
                    'points' => 1,
                ],
                [
                    'name' => 'lightningstrike',
                    'points' => 0,
                ],
                [
                    'name' => 'conjureelectrode',
                    'points' => 0,
                ],
                [
                    'name' => 'thousandvoltburst',
                    'points' => 0,
                ],
                [
                    'name' => 'energizer',
                    'points' => 1,
                ],
            ],
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

        $expected = [
            'class' => BuildlinkParser::RAILMASTER,
            'relic' => BuildlinkParser::COLDHEART,
            'tree1' => [
                'name' => 'conductor',
                'skills' => [
                    [
                        'name' => 'build_train',
                        'points' => 1,
                    ],
                    [
                        'name' => 'mortar_car',
                        'points' => 2,
                    ],
                    [
                        'name' => 'shield_car',
                        'points' => 3,
                    ],
                    [
                        'name' => 'shotgonne_car',
                        'points' => 4,
                    ],
                    [
                        'name' => 'ghost_train',
                        'points' => 5,
                    ],
                    [
                        'name' => 'shocking_rounds',
                        'points' => 6,
                    ],
                    [
                        'name' => 'flamethrower_car',
                        'points' => 7,
                    ],
                ],
            ],
            'tree2' => [
                'name' => 'lineage',
                'skills' => [
                    [
                        'name' => 'pound',
                        'points' => 7,
                    ],
                    [
                        'name' => 'blasting_charge',
                        'points' => 6,
                    ],
                    [
                        'name' => 'hammer_spin',
                        'points' => 5,
                    ],
                    [
                        'name' => 'flying_picks',
                        'points' => 4,
                    ],
                    [
                        'name' => 'lantern_flash',
                        'points' => 3,
                    ],
                    [
                        'name' => 'torque_swing',
                        'points' => 2,
                    ],
                    [
                        'name' => 'spike_drive',
                        'points' => 1,
                    ],
                ],
            ],
            'relicskills' => [
                [
                    'name' => 'jaggedice',
                    'points' => 1,
                ],
                [
                    'name' => 'iceshield',
                    'points' => 0,
                ],
                [
                    'name' => 'frostblast',
                    'points' => 0,
                ],
                [
                    'name' => 'frostskin',
                    'points' => 0,
                ],
                [
                    'name' => 'icegolem',
                    'points' => 0,
                ],
                [
                    'name' => 'largebores',
                    'points' => 2,
                ],
                [
                    'name' => 'breakingpoint',
                    'points' => 0,
                ],
                [
                    'name' => 'snowstorm',
                    'points' => 0,
                ],
                [
                    'name' => 'coldfront',
                    'points' => 1,
                ],
                [
                    'name' => 'energizer',
                    'points' => 1,
                ],
            ],
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
            'tree1' => [
                'name' => 'barrage',
                'skills' => [
                    [
                        'name' => 'rapid_fire',
                        'points' => 1,
                    ],
                    [
                        'name' => 'coal_launch',
                        'points' => 2,
                    ],
                    [
                        'name' => 'shotgonne_blast',
                        'points' => 3,
                    ],
                    [
                        'name' => 'poison_dart',
                        'points' => 4,
                    ],
                    [
                        'name' => 'sonic_pulse_arm',
                        'points' => 5,
                    ],
                    [
                        'name' => 'slug_shot',
                        'points' => 6,
                    ],
                    [
                        'name' => 'furnance_blast',
                        'points' => 7,
                    ],
                ],
            ],
            'tree2' => [
                'name' => 'brawl',
                'skills' => [
                    [
                        'name' => 'rapid_strike',
                        'points' => 7,
                    ],
                    [
                        'name' => 'vortex_bomb', // missing icon!
                        'points' => 6,
                    ],
                    [
                        'name' => 'ramming_robot',
                        'points' => 5,
                    ],
                    [
                        'name' => 'servo_driven_uppercut',
                        'points' => 4,
                    ],
                    [
                        'name' => 'fracking_strike',
                        'points' => 3,
                    ],
                    [
                        'name' => 'power_projection',
                        'points' => 2,
                    ],
                    [
                        'name' => 'cyclone_mode',
                        'points' => 1,
                    ],
                ],
            ],
            'relicskills' => [
                [
                    'name' => 'eightleggeddallies',
                    'points' => 1,
                ],
                [
                    'name' => 'spectralspider',
                    'points' => 0,
                ],
                [
                    'name' => 'poisonnova',
                    'points' => 0,
                ],
                [
                    'name' => 'spreadofdeath',
                    'points' => 0,
                ],
                [
                    'name' => 'staffedup',
                    'points' => 0,
                ],
                [
                    'name' => 'venomousmaw',
                    'points' => 1,
                ],
                [
                    'name' => 'miasma',
                    'points' => 0,
                ],
                [
                    'name' => 'puppetmaster',
                    'points' => 1,
                ],
                [
                    'name' => 'arachnidassault',
                    'points' => 0,
                ],
                [
                    'name' => 'energizer',
                    'points' => 1,
                ],
            ],
            'hotbar' => [4, 22, 16, 10, 0, 8, 7, 1, 3],
            'legendarium' => [28, 16, 45],
        ];

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_parse_forged_flaming_destroyer_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=221234567765413210000101014mga08713;28;16;45";

        $expected = [
            'class' => BuildlinkParser::FORGED,
            'relic' => BuildlinkParser::FLAMING_DESTROYER,
            'tree1' => [
                'name' => 'barrage',
                'skills' => [
                    [
                        'name' => 'rapid_fire',
                        'points' => 1,
                    ],
                    [
                        'name' => 'coal_launch',
                        'points' => 2,
                    ],
                    [
                        'name' => 'shotgonne_blast',
                        'points' => 3,
                    ],
                    [
                        'name' => 'poison_dart',
                        'points' => 4,
                    ],
                    [
                        'name' => 'sonic_pulse_arm',
                        'points' => 5,
                    ],
                    [
                        'name' => 'slug_shot',
                        'points' => 6,
                    ],
                    [
                        'name' => 'furnance_blast',
                        'points' => 7,
                    ],
                ],
            ],
            'tree2' => [
                'name' => 'brawl',
                'skills' => [
                    [
                        'name' => 'rapid_strike',
                        'points' => 7,
                    ],
                    [
                        'name' => 'vortex_bomb', // missing icon!
                        'points' => 6,
                    ],
                    [
                        'name' => 'ramming_robot',
                        'points' => 5,
                    ],
                    [
                        'name' => 'servo_driven_uppercut',
                        'points' => 4,
                    ],
                    [
                        'name' => 'fracking_strike',
                        'points' => 3,
                    ],
                    [
                        'name' => 'power_projection',
                        'points' => 2,
                    ],
                    [
                        'name' => 'cyclone_mode',
                        'points' => 1,
                    ],
                ],
            ],
            'relicskills' => [
                [
                    'name' => 'swordsmash',
                    'points' => 1,
                ],
                [
                    'name' => 'ignitionsource',
                    'points' => 0,
                ],
                [
                    'name' => 'magmaburst',
                    'points' => 0,
                ],
                [
                    'name' => 'blazingpillar',
                    'points' => 0,
                ],
                [
                    'name' => 'giantswings',
                    'points' => 0,
                ],
                [
                    'name' => 'cloakofflames',
                    'points' => 1,
                ],
                [
                    'name' => 'nimbleflames',
                    'points' => 0,
                ],
                [
                    'name' => 'firestorm',
                    'points' => 1,
                ],
                [
                    'name' => 'summoningsmash',
                    'points' => 0,
                ],
                [
                    'name' => 'energizer',
                    'points' => 1,
                ],
            ],
            'hotbar' => [4, 22, 16, 10, 0, 8, 7, 1, 3],
            'legendarium' => [28, 16, 45],
        ];

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }
}
