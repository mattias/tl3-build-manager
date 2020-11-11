<?php

namespace Tests\Feature\Helpers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Helpers\BuildlinkParser;
use App\Helpers\CharacterBuild;
use App\Helpers\Hotbar;

class BuildlinkParserTest extends TestCase
{
    /** @test */
    public function can_parse_dusk_mage_blood_drinker_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html?build=13156723471642531000010010cfhap8614;1;28;33";

        $class = 'Dusk Mage';
        $relic = 'Blood Drinker';
        $skilltabs = [];
        $hotbar = new Hotbar;
        $legendariums = [];
        $expected = new CharacterBuild(
            $class,
            $relic,
            $skilltabs,
            $hotbar,
            $legendariums
        );

        /*$expected = [
            'class' => CharacterBuild::DUSK_MAGE,
            'relic' => CharacterBuild::BLOOD_DRINKER,
            'tree1' => [
                'name' => CharacterBuild::LIGHT,
                'skills' => [
                    [
                        'name' => CharacterBuild::HOLY_BOLT,
                        'points' => 1,
                    ],
                    [
                        'name' => CharacterBuild::RADIANT_BLAST,
                        'points' => 2,
                    ],
                    [
                        'name' => CharacterBuild::CONCENCRATION,
                        'points' => 3,
                    ],
                    [
                        'name' => CharacterBuild::LIGHT_SPEAR,
                        'points' => 4,
                    ],
                    [
                        'name' => CharacterBuild::HOLY_FURY,
                        'points' => 5,
                    ],
                    [
                        'name' => CharacterBuild::LUMONOUS_RUN,
                        'points' => 6,
                    ],
                    [
                        'name' => CharacterBuild::ABSOLVER,
                        'points' => 7,
                    ],
                ],
            ],
            'tree2' => [
                'name' => CharacterBuild::DARK,
                'skills' => [
                    [
                        'name' => CharacterBuild::UNHOLY_BOLT,
                        'points' => 7,
                    ],
                    [
                        'name' => CharacterBuild::DARK_SPEARS,
                        'points' => 6,
                    ],
                    [
                        'name' => CharacterBuild::SHADOW_STEP,
                        'points' => 5,
                    ],
                    [
                        'name' => CharacterBuild::SPIRIT_WELL,
                        'points' => 4,
                    ],
                    [
                        'name' => CharacterBuild::ENERGY_SPIKE,
                        'points' => 3,
                    ],
                    [
                        'name' => CharacterBuild::DAMNATION,
                        'points' => 2,
                    ],
                    [
                        'name' => CharacterBuild::ENTROPY,
                        'points' => 1,
                    ],
                ],
            ],
            'relicskills' => [
                [
                    'name' => CharacterBuild::SPINNINGBLADE,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::BLOODLETTER,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::BLADESFORCUTTING,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::BLOODSEEKERS,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::LIVINGBARRIER,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::RUPTURE,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::BLOODYCHALICE,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::DRAIN,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::DANCEOFDEATH,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::ENERGIZER,
                    'points' => 0,
                ],
            ],
            'hotbar' => [12, 15, 17, 10, 25, 8, 6, 1, 4],
            'legendarium' => [1, 28, 33],
        ];*/

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_parse_sharpshooter_electrode_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-ss.html?build=45175643275436211000010001f7a48hd13;21;35;40";

        $class = 'Sharpshooter';
        $relic = 'Electrode';
        $skilltabs = [];
        $hotbar = new Hotbar;
        $legendariums = [];
        $expected = new CharacterBuild(
            $class,
            $relic,
            $skilltabs,
            $hotbar,
            $legendariums
        );

        /*$expected = [
            'class' => CharacterBuild::SHARPSHOOTER,
            'relic' => CharacterBuild::ELECTRODE,
            'tree1' => [
                'name' => 'precision',
                'skills' => [
                    [
                        'name' => CharacterBuild::TIGHT_GROUPING,
                        'points' => 1,
                    ],
                    [
                        'name' => CharacterBuild::ONSLAUGHT,
                        'points' => 2,
                    ],
                    [
                        'name' => CharacterBuild::TARGETED_STRIKES,
                        'points' => 3,
                    ],
                    [
                        'name' => CharacterBuild::RELOAD,
                        'points' => 4,
                    ],
                    [
                        'name' => CharacterBuild::EXPLOSIVE_ARROW,
                        'points' => 5,
                    ],
                    [
                        'name' => CharacterBuild::HEART_SEEKER,
                        'points' => 6,
                    ],
                    [
                        'name' => CharacterBuild::SCATTER_SHOT,
                        'points' => 7,
                    ],
                ],
            ],
            'tree2' => [
                'name' => 'adventurer',
                'skills' => [
                    [
                        'name' => CharacterBuild::SCOUTS_BONES,
                        'points' => 7,
                    ],
                    [
                        'name' => CharacterBuild::GOBLIN_LEGION,
                        'points' => 6,
                    ],
                    [
                        'name' => CharacterBuild::GHOST_VISAGE,
                        'points' => 5,
                    ],
                    [
                        'name' => CharacterBuild::RIZZIS_FATE,
                        'points' => 4,
                    ],
                    [
                        'name' => CharacterBuild::SACRIFICE_TO_GOOSE,
                        'points' => 3,
                    ],
                    [
                        'name' => CharacterBuild::CURSE_OF_PI_PI,
                        'points' => 2,
                    ],
                    [
                        'name' => CharacterBuild::SHASTA,
                        'points' => 1,
                    ],
                ],
            ],
            'relicskills' => [
                [
                    'name' => CharacterBuild::LOCALIZEDSTORM,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::SHOCKINGDISPLAY,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::SHOCKINGFORCE,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::CHAOTICSTRIKES,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::LIGHTNINGBARRIER,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::TINGLINGSENSATION,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::LIGHTNINGSTRIKE,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::CONJUREELECTRODE,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::THOUSANDVOLTBURST,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::ENERGIZER,
                    'points' => 1,
                ],
            ],
            'hotbar' => [15, 7, 10, 4, 8, 17, 13, 1, 3],
            'legendarium' => [21, 35, 40],
        ];*/

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_parse_railmaster_coldheart_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-railmaster.html?build=3412364757654321100002001138796ad1c;11;20;30";

        $class = 'Railmaster';
        $relic = 'Coldheart';
        $skilltabs = [];
        $hotbar = new Hotbar;
        $legendariums = [];
        $expected = new CharacterBuild(
            $class,
            $relic,
            $skilltabs,
            $hotbar,
            $legendariums
        );

        /*$expected = [
            'class' => CharacterBuild::RAILMASTER,
            'relic' => CharacterBuild::COLDHEART,
            'tree1' => [
                'name' => CharacterBuild::CONDUCTOR,
                'skills' => [
                    [
                        'name' => CharacterBuild::BUILD_TRAIN,
                        'points' => 1,
                    ],
                    [
                        'name' => CharacterBuild::MORTAR_CAR,
                        'points' => 2,
                    ],
                    [
                        'name' => CharacterBuild::SHIELD_CAR,
                        'points' => 3,
                    ],
                    [
                        'name' => CharacterBuild::SHOTGONNE_CAR,
                        'points' => 4,
                    ],
                    [
                        'name' => CharacterBuild::GHOST_TRAIN,
                        'points' => 5,
                    ],
                    [
                        'name' => CharacterBuild::SHOCKING_ROUNDS,
                        'points' => 6,
                    ],
                    [
                        'name' => CharacterBuild::FLAMETHROWER_CAR,
                        'points' => 7,
                    ],
                ],
            ],
            'tree2' => [
                'name' => CharacterBuild::LINEAGE,
                'skills' => [
                    [
                        'name' => CharacterBuild::POUND,
                        'points' => 7,
                    ],
                    [
                        'name' => CharacterBuild::BLASTING_CHARGE,
                        'points' => 6,
                    ],
                    [
                        'name' => CharacterBuild::HAMMER_SPIN,
                        'points' => 5,
                    ],
                    [
                        'name' => CharacterBuild::FLYING_PICKS,
                        'points' => 4,
                    ],
                    [
                        'name' => CharacterBuild::LANTERN_FLASH,
                        'points' => 3,
                    ],
                    [
                        'name' => CharacterBuild::TORQUE_SWING,
                        'points' => 2,
                    ],
                    [
                        'name' => CharacterBuild::SPIKE_DRIVE,
                        'points' => 1,
                    ],
                ],
            ],
            CharacterBuild::RELICSKILLS => [
                [
                    'name' => CharacterBuild::JAGGEDICE,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::ICESHIELD,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::FROSTBLAST,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::FROSTSKIN,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::ICEGOLEM,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::LARGEBORES,
                    'points' => 2,
                ],
                [
                    'name' => CharacterBuild::BREAKINGPOINT,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::SNOWSTORM,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::COLDFRONT,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::ENERGIZER,
                    'points' => 1,
                ],
            ],
            'hotbar' => [3, 8, 7, 9, 6, 10, 13, 1, 12],
            'legendarium' => [11, 20, 30],
        ];*/

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_parse_forged_bane_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=211234567765413210000101014mga08713;28;16;45";

        $class = 'Forged';
        $relic = 'Bane';
        $skilltabs = [];
        $hotbar = new Hotbar;
        $legendariums = [];
        $expected = new CharacterBuild(
            $class,
            $relic,
            $skilltabs,
            $hotbar,
            $legendariums
        );

        /*$expected = [
            'class' => CharacterBuild::FORGED,
            'relic' => CharacterBuild::BANE,
            'tree1' => [
                'name' => CharacterBuild::BARRAGE,
                'skills' => [
                    [
                        'name' => CharacterBuild::RAPID_FIRE,
                        'points' => 1,
                    ],
                    [
                        'name' => CharacterBuild::COAL_LAUNCH,
                        'points' => 2,
                    ],
                    [
                        'name' => CharacterBuild::SHOTGONNE_BLAST,
                        'points' => 3,
                    ],
                    [
                        'name' => CharacterBuild::POISON_DART,
                        'points' => 4,
                    ],
                    [
                        'name' => CharacterBuild::SONIC_PULSE_ARM,
                        'points' => 5,
                    ],
                    [
                        'name' => CharacterBuild::SLUG_SHOT,
                        'points' => 6,
                    ],
                    [
                        'name' => CharacterBuild::FURNANCE_BLAST,
                        'points' => 7,
                    ],
                ],
            ],
            'tree2' => [
                'name' => CharacterBuild::BRAWL,
                'skills' => [
                    [
                        'name' => CharacterBuild::RAPID_STRIKE,
                        'points' => 7,
                    ],
                    [
                        'name' => CharacterBuild::VORTEX_BOMB,
                        'points' => 6,
                    ],
                    [
                        'name' => CharacterBuild::RAMMING_ROBOT,
                        'points' => 5,
                    ],
                    [
                        'name' => CharacterBuild::SERVO_DRIVEN_UPPERCUT,
                        'points' => 4,
                    ],
                    [
                        'name' => CharacterBuild::FRACKING_STRIKE,
                        'points' => 3,
                    ],
                    [
                        'name' => CharacterBuild::POWER_PROJECTION,
                        'points' => 2,
                    ],
                    [
                        'name' => CharacterBuild::CYCLONE_MODE,
                        'points' => 1,
                    ],
                ],
            ],
            'relicskills' => [
                [
                    'name' => CharacterBuild::EIGHTLEGGEDDALLIES,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::SPECTRALSPIDER,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::POISONNOVA,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::SPREADOFDEATH,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::STAFFEDUP,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::VENOMOUSMAW,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::MIASMA,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::PUPPETMASTER,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::ARACHNIDASSAULT,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::ENERGIZER,
                    'points' => 1,
                ],
            ],
            'hotbar' => [4, 22, 16, 10, 0, 8, 7, 1, 3],
            'legendarium' => [28, 16, 45],
        ];*/

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function can_parse_forged_flaming_destroyer_buildlink_into_readable_data()
    {
        $buildlinkParser = new BuildlinkParser;
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=221234567765413210000101014mga08713;28;16;45";

        $class = 'Forged';
        $relic = 'Flaming Destroyer';
        $skilltabs = [];
        $hotbar = new Hotbar;
        $legendariums = [];
        $expected = new CharacterBuild(
            $class,
            $relic,
            $skilltabs,
            $hotbar,
            $legendariums
        );

        /*$expected = [
            'class' => CharacterBuild::FORGED,
            'relic' => CharacterBuild::FLAMING_DESTROYER,
            'tree1' => [
                'name' => CharacterBuild::BARRAGE,
                'skills' => [
                    [
                        'name' => CharacterBuild::RAPID_FIRE,
                        'points' => 1,
                    ],
                    [
                        'name' => CharacterBuild::COAL_LAUNCH,
                        'points' => 2,
                    ],
                    [
                        'name' => CharacterBuild::SHOTGONNE_BLAST,
                        'points' => 3,
                    ],
                    [
                        'name' => CharacterBuild::POISON_DART,
                        'points' => 4,
                    ],
                    [
                        'name' => CharacterBuild::SONIC_PULSE_ARM,
                        'points' => 5,
                    ],
                    [
                        'name' => CharacterBuild::SLUG_SHOT,
                        'points' => 6,
                    ],
                    [
                        'name' => CharacterBuild::FURNANCE_BLAST,
                        'points' => 7,
                    ],
                ],
            ],
            'tree2' => [
                'name' => CharacterBuild::BRAWL,
                'skills' => [
                    [
                        'name' => CharacterBuild::RAPID_STRIKE,
                        'points' => 7,
                    ],
                    [
                        'name' => CharacterBuild::VORTEX_BOMB,
                        'points' => 6,
                    ],
                    [
                        'name' => CharacterBuild::RAMMING_ROBOT,
                        'points' => 5,
                    ],
                    [
                        'name' => CharacterBuild::SERVO_DRIVEN_UPPERCUT,
                        'points' => 4,
                    ],
                    [
                        'name' => CharacterBuild::FRACKING_STRIKE,
                        'points' => 3,
                    ],
                    [
                        'name' => CharacterBuild::POWER_PROJECTION,
                        'points' => 2,
                    ],
                    [
                        'name' => CharacterBuild::CYCLONE_MODE,
                        'points' => 1,
                    ],
                ],
            ],
            'relicskills' => [
                [
                    'name' => CharacterBuild::SWORDSMASH,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::IGNITIONSOURCE,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::MAGMABURST,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::BLAZINGPILLAR,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::GIANTSWINGS,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::CLOAKOFFLAMES,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::NIMBLEFLAMES,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::FIRESTORM,
                    'points' => 1,
                ],
                [
                    'name' => CharacterBuild::SUMMONINGSMASH,
                    'points' => 0,
                ],
                [
                    'name' => CharacterBuild::ENERGIZER,
                    'points' => 1,
                ],
            ],
            'hotbar' => [4, 22, 16, 10, 0, 8, 7, 1, 3],
            'legendarium' => [28, 16, 45],
        ];*/

        $actual = $buildlinkParser->parse($buildlink);

        $this->assertInstanceOf(CharacterBuild::class, $actual);
        $this->assertEquals($expected, $actual);
    }
}
