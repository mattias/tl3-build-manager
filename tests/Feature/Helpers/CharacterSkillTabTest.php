<?php

namespace Tests\Feature\Helpers;

use App\Helpers\CharacterBuild;
use App\Helpers\CharacterSkill;
use App\Helpers\CharacterSkillTab;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CharacterSkillTabTest extends TestCase
{
    /** @test */
    public function it_has_light_tab()
    {
        $displayName = 'Light';
        $levels = [1, 2, 3, 4, 5, 6, 7];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::HOLY_BOLT, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::RADIANT_BLAST, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::CONSECRATION, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::LIGHT_SPEAR, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::HOLY_FURY, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(6, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::LUMINOUS_RUN, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(7, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::ABSOLVER, $characterSkillTab->getSkills()[6]->getDisplayName());
    }

    /** @test */
    public function it_has_dark_tab()
    {
        $displayName = 'Dark';
        $levels = [7, 6, 5, 4, 5, 6, 7];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(7, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::UNHOLY_BOLT, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(6, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::DARK_SPEARS, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::SHADOW_STEP, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::SPIRIT_WELL, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::ENERGY_SPIKE, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(6, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::DAMNATION, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(7, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::ENTROPY, $characterSkillTab->getSkills()[6]->getDisplayName());
    }

    /** @test */
    public function it_has_precision_tab()
    {
        $displayName = 'Precision';
        $levels = [1, 2, 3, 4, 5, 6, 7];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::TIGHT_GROUPING, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::ONSLAUGHT, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::TARGETED_STRIKES, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::RELOAD, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::EXPLOSIVE_ARROW, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(6, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::HEART_SEEKER, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(7, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::SCATTERSHOT, $characterSkillTab->getSkills()[6]->getDisplayName());
    }

    /** @test */
    public function it_has_adventurer_tab()
    {
        $displayName = 'Adventurer';
        $levels = [1, 2, 3, 4, 5, 6, 7];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::SCOUT_S_BONES, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::GOBLIN_LEGION, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::GHOST_VISAGE, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::RIZZI__S_FATE, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::SACRIFICE_TO_GOOSE, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(6, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::CURSE_OF_PI__PI, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(7, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::LOYAL_SHASTA, $characterSkillTab->getSkills()[6]->getDisplayName());
    }

    /** @test */
    public function it_has_conductor_tab()
    {
        $displayName = 'Conductor';
        $levels = [1, 2, 3, 4, 5, 6, 7];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::BUILD_TRAIN, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::MORTAR_CAR, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::SHIELD_CAR, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::SHOTGONNE_CAR, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::GHOST_TRAIN, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(6, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::SHOCKING_ROUNDS, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(7, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::FLAMETHROWER_CAR, $characterSkillTab->getSkills()[6]->getDisplayName());
    }

    /** @test */
    public function it_has_slammer_tab()
    {
        $displayName = 'Slammer';
        $levels = [1, 2, 3, 4, 5, 6, 7];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::POUND, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::BLASTING_CHARGE, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::HAMMER_SPIN, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::FLYING_PICKS, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::LANTERN_FLASH, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(6, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::TORQUE_SWING, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(7, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::SPIKE_DRIVE, $characterSkillTab->getSkills()[6]->getDisplayName());
    }

    /** @test */
    public function it_has_barrage_tab()
    {
        $displayName = 'Barrage';
        $levels = [1, 2, 3, 4, 5, 6, 7];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::RAPID_FIRE, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::VENT__COAL_LAUNCH, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::SHOTGONNE_BLAST, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::POISON_DART, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::SONIC_PULSE, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(6, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::SLUG_SHOT, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(7, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::VENT__FURNACE_BLAST, $characterSkillTab->getSkills()[6]->getDisplayName());
    }

    /** @test */
    public function it_has_brawl_tab()
    {
        $displayName = 'Brawl';
        $levels = [1, 2, 3, 4, 5, 6, 7];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::RAPID_STRIKE, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::VENT__VORTEX_BOMB, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::RAMMING_ROBOT, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::SERVO_DRIVEN_UPPERCUT, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::VENT__FRACKING_STRIKE, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(6, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::POWER_PROJECTION, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(7, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::CYCLONE_MODE, $characterSkillTab->getSkills()[6]->getDisplayName());
    }

    /** @test */
    public function it_has_bane_tab()
    {
        $displayName = 'Bane';
        $levels = [1, 2, 3, 4, 5, 1, 2, 3, 4, 5];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::EIGHT_LEGGEDDALLIES, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::SPECTRAL_SPIDER, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::POISON_NOVA, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::SPREAD_OF_DEATH, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::STAFFING_UP, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(1, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::VENOMOUS_MAW, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::MIASMA, $characterSkillTab->getSkills()[6]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[7]->getLevel());
        $this->assertEquals(CharacterBuild::PUPPET_MASTER, $characterSkillTab->getSkills()[7]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[8]->getLevel());
        $this->assertEquals(CharacterBuild::ARACHNID_ASSAULT, $characterSkillTab->getSkills()[8]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[9]->getLevel());
        $this->assertEquals(CharacterBuild::ENERGIZER, $characterSkillTab->getSkills()[9]->getDisplayName());
    }

    /** @test */
    public function it_has_flaming_destroyer_tab()
    {
        $displayName = 'Flaming Destroyer';
        $levels = [1, 2, 3, 4, 5, 1, 2, 3, 4, 5];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::SWORD_SMASH, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::IGNITION_SOURCE, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::MAGMA_BURST, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::BLAZING_PILLAR, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::GIANT_SWINGS, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(1, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::CLOAK_OF_FLAMES, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::NIMBLE_FLAMES, $characterSkillTab->getSkills()[6]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[7]->getLevel());
        $this->assertEquals(CharacterBuild::FIRESTORM, $characterSkillTab->getSkills()[7]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[8]->getLevel());
        $this->assertEquals(CharacterBuild::SUMMONING_SMASH, $characterSkillTab->getSkills()[8]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[9]->getLevel());
        $this->assertEquals(CharacterBuild::ENERGIZER, $characterSkillTab->getSkills()[9]->getDisplayName());
    }

    /** @test */
    public function it_has_blood_drinker_tab()
    {
        $displayName = 'Blood Drinker';
        $levels = [1, 2, 3, 4, 5, 1, 2, 3, 4, 5];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::SPINNING_BLADE, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::BLOODLETTER, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::BLADES_FOR_CUTTING, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::BLOOD_SEEKERS, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::LIVING_BARRIER, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(1, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::RUPTURE, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::BLOODY_CHALICE, $characterSkillTab->getSkills()[6]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[7]->getLevel());
        $this->assertEquals(CharacterBuild::DRAIN, $characterSkillTab->getSkills()[7]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[8]->getLevel());
        $this->assertEquals(CharacterBuild::DANCE_OF_DEATH, $characterSkillTab->getSkills()[8]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[9]->getLevel());
        $this->assertEquals(CharacterBuild::ENERGIZER, $characterSkillTab->getSkills()[9]->getDisplayName());
    }

    /** @test */
    public function it_has_coldheart_tab()
    {
        $displayName = 'Coldheart';
        $levels = [1, 2, 3, 4, 5, 1, 2, 3, 4, 5];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::JAGGED_ICE, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::ICE_SHIELD, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::FROST_BLAST, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::FROST_SKIN, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::ICE_GOLEM, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(1, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::LARGE_BORES, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::BREAKING_POINT, $characterSkillTab->getSkills()[6]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[7]->getLevel());
        $this->assertEquals(CharacterBuild::SNOWSTORM, $characterSkillTab->getSkills()[7]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[8]->getLevel());
        $this->assertEquals(CharacterBuild::COLD_FRONT, $characterSkillTab->getSkills()[8]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[9]->getLevel());
        $this->assertEquals(CharacterBuild::ENERGIZER, $characterSkillTab->getSkills()[9]->getDisplayName());
    }

    /** @test */
    public function it_has_electrode_tab()
    {
        $displayName = 'Electrode';
        $levels = [1, 2, 3, 4, 5, 1, 2, 3, 4, 5];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals(CharacterBuild::LOCALIZED_STORM, $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals(CharacterBuild::SHOCKING_DISPLAY, $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals(CharacterBuild::SHOCKING_FORCE, $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals(CharacterBuild::CHAOTIC_STRIKES, $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals(CharacterBuild::LIGHTNING_BARRIER, $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(1, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals(CharacterBuild::TINGLING_SENSATION, $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals(CharacterBuild::LIGHTNING_STRIKE, $characterSkillTab->getSkills()[6]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[7]->getLevel());
        $this->assertEquals(CharacterBuild::CONJURE_ELECTRODE, $characterSkillTab->getSkills()[7]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[8]->getLevel());
        $this->assertEquals(CharacterBuild::THOUSAND_VOLT_BURST, $characterSkillTab->getSkills()[8]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[9]->getLevel());
        $this->assertEquals(CharacterBuild::ENERGIZER, $characterSkillTab->getSkills()[9]->getDisplayName());
    }

    /** @test */
    public function it_throws_error_if_display_name_doesnt_exist()
    {
        $this->expectException(Exception::class);

        $displayName = 'Missing';
        $levels = [];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);
    }
}
