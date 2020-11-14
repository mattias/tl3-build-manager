<?php

namespace App\Helpers;

use Exception;
use SebastianBergmann\Diff\Chunk;

class CharacterBuild
{
    // Classes
    const DUSK_MAGE = 'Dusk Mage';
    const FORGED = 'Forged';
    const RAILMASTER = 'Railmaster';
    const SHARPSHOOTER = 'Sharpshooter';

    // DM Light skills
    const LIGHT = 'Light';
    const HOLY_BOLT = 'Holy Bolt';
    const RADIANT_BLAST = 'Radiant Blast';
    const CONSECRATION = 'Consecration';
    const LIGHT_SPEAR = 'Light Spear';
    const HOLY_FURY = 'Holy Fury';
    const LUMINOUS_RUN = 'Luminous Run';
    const ABSOLVER = 'Absolver';
    const LIGHT_SORT = [
        self::HOLY_BOLT, self::RADIANT_BLAST, self::CONSECRATION, self::LIGHT_SPEAR, self::HOLY_FURY, self::LUMINOUS_RUN, self::ABSOLVER
    ];

    // DM Dark skills
    const DARK = 'Dark';
    const UNHOLY_BOLT = 'Unholy Bolt';
    const DARK_SPEARS = 'Dark Spears';
    const SHADOW_STEP = 'Shadow Step';
    const SPIRIT_WELL = 'Spirit Well';
    const ENERGY_SPIKE = 'Energy Spike';
    const DAMNATION = 'Damnation';
    const ENTROPY = 'Entropy';
    const DARK_SORT = [
        self::UNHOLY_BOLT, self::DARK_SPEARS, self::SHADOW_STEP, self::SPIRIT_WELL, self::ENERGY_SPIKE, self::DAMNATION, self::ENTROPY
    ];

    // SS Precision skills
    const PRECISION = 'Precision';
    const TIGHT_GROUPING = 'Tight Grouping';
    const ONSLAUGHT = 'Onslaught';
    const TARGETED_STRIKES = 'Targeted Strikes';
    const RELOAD = 'Reload';
    const EXPLOSIVE_ARROW = 'Explosive Arrow';
    const HEART_SEEKER = 'Heart Seeker';
    const SCATTERSHOT = 'Scattershot';
    const PRECISION_SORT = [
        self::TIGHT_GROUPING, self::ONSLAUGHT, self::TARGETED_STRIKES, self::RELOAD, self::EXPLOSIVE_ARROW, self::HEART_SEEKER, self::SCATTERSHOT
    ];

    // SS Adventurer skills
    const ADVENTURER = 'Adventurer';
    const SCOUT_S_BONES = 'Scout\'s Bones';
    const GOBLIN_LEGION = 'Goblin Legion';
    const GHOST_VISAGE = 'Ghost Visage';
    const RIZZI__S_FATE = 'Rizzi\\\'s Fate';
    const SACRIFICE_TO_GOOSE = 'Sacrifice to Goose';
    const CURSE_OF_PI__PI = 'Curse of Pi\\\'pi';
    const LOYAL_SHASTA = 'Loyal Shasta';
    const ADVENTURER_SORT = [
        self::SCOUT_S_BONES, self::GOBLIN_LEGION, self::GHOST_VISAGE, self::RIZZI__S_FATE, self::SACRIFICE_TO_GOOSE, self::CURSE_OF_PI__PI, self::LOYAL_SHASTA
    ];

    // Railmaster Conductor skills
    const CONDUCTOR = 'Conductor';
    const BUILD_TRAIN = 'Build Train';
    const MORTAR_CAR = 'Mortar Car';
    const SHIELD_CAR = 'Shield Car';
    const SHOTGONNE_CAR = 'Shotgonne Car';
    const GHOST_TRAIN = 'Ghost Train';
    const SHOCKING_ROUNDS = 'Shocking Rounds';
    const FLAMETHROWER_CAR = 'Flamethrower Car';
    const CONDUCTOR_SORT = [
        self::BUILD_TRAIN, self::MORTAR_CAR, self::SHIELD_CAR, self::SHOTGONNE_CAR, self::GHOST_TRAIN, self::SHOCKING_ROUNDS, self::FLAMETHROWER_CAR
    ];

    // Railmaster Slammer skills
    const SLAMMER = 'Slammer';
    const POUND = 'Pound';
    const BLASTING_CHARGE = 'Blasting Charge';
    const HAMMER_SPIN = 'Hammer Spin';
    const FLYING_PICKS = 'Flying Picks';
    const LANTERN_FLASH = 'Lantern Flash';
    const TORQUE_SWING = 'Torque Swing';
    const SPIKE_DRIVE = 'Spike Drive';
    const SLAMMER_SORT = [
        self::POUND, self::BLASTING_CHARGE, self::HAMMER_SPIN, self::FLYING_PICKS, self::LANTERN_FLASH, self::TORQUE_SWING, self::SPIKE_DRIVE
    ];

    // Forged Barrage skills
    const BARRAGE = 'Barrage';
    const RAPID_FIRE = 'Rapid Fire';
    const VENT__COAL_LAUNCH = 'Vent: Coal Launch';
    const SHOTGONNE_BLAST = 'Shotgonne Blast';
    const POISON_DART = 'Poison Dart';
    const SONIC_PULSE = 'Sonic Pulse';
    const SLUG_SHOT = 'Slug Shot';
    const VENT__FURNACE_BLAST = 'Vent: Furnace Blast';
    const BARRAGE_SORT = [
        self::RAPID_FIRE, self::VENT__COAL_LAUNCH, self::SHOTGONNE_BLAST, self::POISON_DART, self::SONIC_PULSE, self::SLUG_SHOT, self::VENT__FURNACE_BLAST
    ];

    // Forged Brawl skills
    const BRAWL = 'Brawl';
    const RAPID_STRIKE = 'Rapid Strike';
    const VENT__VORTEX_BOMB = 'Vent: Vortex Bomb';
    const RAMMING_ROBOT = 'Ramming Robot';
    const SERVO_DRIVEN_UPPERCUT = 'Servo-Driven Uppercut';
    const VENT__FRACKING_STRIKE = 'Vent: Fracking Strike';
    const POWER_PROJECTION = 'Power Projection';
    const CYCLONE_MODE = 'Cyclone Mode';
    const BRAWL_SORT = [
        self::RAPID_STRIKE, self::VENT__VORTEX_BOMB, self::RAMMING_ROBOT, self::SERVO_DRIVEN_UPPERCUT, self::VENT__FRACKING_STRIKE, self::POWER_PROJECTION, self::CYCLONE_MODE
    ];

    // Relics
    const BANE = 'Bane';
    const FLAMING_DESTROYER = 'Flaming Destroyer';
    const BLOOD_DRINKER = 'Blood Drinker';
    const COLDHEART = 'Coldheart';
    const ELECTRODE = 'Electrode';

    // Common skill
    const ENERGIZER = 'Energizer';

    // Bane skills
    const EIGHT_LEGGEDDALLIES = 'Eight-legged Allies';
    const SPECTRAL_SPIDER = 'Spectral Spider';
    const POISON_NOVA = 'Poison Nova';
    const SPREAD_OF_DEATH = 'Spread of Death';
    const STAFFING_UP = 'Staffing Up';
    const VENOMOUS_MAW = 'Venomous Maw';
    const MIASMA = 'Miasma';
    const PUPPET_MASTER = 'Puppet Master';
    const ARACHNID_ASSAULT = 'Arachnid Assault';
    const BANE_SORT = [
        self::EIGHT_LEGGEDDALLIES, self::SPECTRAL_SPIDER, self::POISON_NOVA, self::SPREAD_OF_DEATH,
        self::STAFFING_UP, self::VENOMOUS_MAW, self::MIASMA, self::PUPPET_MASTER, self::ARACHNID_ASSAULT,
        self::ENERGIZER
    ];

    // Flaming Destroyer skills
    const SWORD_SMASH = 'Sword Smash';
    const IGNITION_SOURCE = 'Ignition Source';
    const MAGMA_BURST = 'Magma Burst';
    const BLAZING_PILLAR = 'Blazing Pillar';
    const GIANT_SWINGS = 'Giant Swings';
    const CLOAK_OF_FLAMES = 'Cloak of Flames';
    const NIMBLE_FLAMES = 'Nimble Flames';
    const FIRESTORM = 'Firestorm';
    const SUMMONING_SMASH = 'Summoning Smash';
    const FLAMING_DESTROYER_SORT = [
        self::SWORD_SMASH, self::IGNITION_SOURCE, self::MAGMA_BURST, self::BLAZING_PILLAR, self::GIANT_SWINGS, self::CLOAK_OF_FLAMES,
        self::NIMBLE_FLAMES, self::FIRESTORM, self::SUMMONING_SMASH, self::ENERGIZER
    ];

    // Blood Drinker skills
    const SPINNING_BLADE = 'Spinning Blade';
    const BLOODLETTER = 'Bloodletter';
    const BLADES_FOR_CUTTING = 'Blades for Cutting';
    const BLOOD_SEEKERS = 'Blood Seekers';
    const LIVING_BARRIER = 'Living Barrier';
    const RUPTURE = 'Rupture';
    const BLOODY_CHALICE = 'Bloody Chalice';
    const DRAIN = 'Drain';
    const DANCE_OF_DEATH = 'Dance of Death';
    const BLOOD_DRINKER_SORT = [
        self::SPINNING_BLADE, self::BLOODLETTER, self::BLADES_FOR_CUTTING,
        self::BLOOD_SEEKERS, self::LIVING_BARRIER, self::RUPTURE,
        self::BLOODY_CHALICE, self::DRAIN, self::DANCE_OF_DEATH, self::ENERGIZER
    ];

    // Coldheart skills
    const ICICLES = 'Icicles';
    const JAGGED_ICE = 'Jagged Ice';
    const ICE_SHIELD = 'Ice Shield';
    const FROST_BLAST = 'Frost Blast';
    const FROST_SKIN = 'Frost Skin';
    const ICE_GOLEM = 'Ice Golem';
    const LARGE_BORES = 'Large Bores';
    const BREAKING_POINT = 'Breaking Point';
    const SNOWSTORM = 'Snowstorm';
    const COLD_FRONT = 'Cold Front';
    const COLDHEART_SORT = [
        self::JAGGED_ICE, self::ICE_SHIELD, self::FROST_BLAST, self::FROST_SKIN, self::ICE_GOLEM,
        self::LARGE_BORES, self::BREAKING_POINT, self::SNOWSTORM, self::COLD_FRONT, self::ENERGIZER
    ];

    // Electrode skills
    const LOCALIZED_STORM = 'Localized Storm';
    const SHOCKING_DISPLAY = 'Shocking Display';
    const SHOCKING_FORCE = 'Shocking Force';
    const CHAOTIC_STRIKES = 'Chaotic Strikes';
    const LIGHTNING_BARRIER = 'Lightning Barrier';
    const TINGLING_SENSATION = 'Tingling Sensation';
    const LIGHTNING_STRIKE = 'Lightning Strike';
    const CONJURE_ELECTRODE = 'Conjure Electrode';
    const THOUSAND_VOLT_BURST = 'Thousand-Volt Burst';
    const ELECTRODE_SORT = [
        self::LOCALIZED_STORM, self::SHOCKING_DISPLAY, self::SHOCKING_FORCE, self::CHAOTIC_STRIKES, self::LIGHTNING_BARRIER,
        self::TINGLING_SENSATION, self::LIGHTNING_STRIKE, self::CONJURE_ELECTRODE, self::THOUSAND_VOLT_BURST, self::ENERGIZER
    ];

    private $data = [
        'class' => '',
        'relic' => '',
        'skilltabs' => [],
        'hotbar' => null,
        'legendariums' => [],
    ];

    public function __construct(
        string $class = '',
        string $relic = '',
        array $skilltabs = [],
        Hotbar $hotbar = null,
        array $legendariums = []
    )
    {
        $this->data['class'] = $class;
        $this->data['relic'] = $relic;
        $this->data['skilltabs'] = $skilltabs;
        $this->data['hotbar'] = $hotbar ?? new Hotbar([], $skilltabs);
        $this->data['legendariums'] = $legendariums;
    }

    public function setClass(string $class): void
    {
        $this->data['class'] = $class;
    }

    public function getClass(): string
    {
        return isset($this->data['class'])
            ? $this->data['class']
            : '';
    }

    public function setRelic(string $relic): void
    {
        $this->data['relic'] = $relic;
    }

    public function getRelic(): string
    {
        return isset($this->data['relic'])
            ? $this->data['relic']
            : '';
    }

    public function addSkillTab(CharacterSkillTab $skillTab): void
    {
        $this->data['skilltabs'][] = $skillTab;
    }

    public function getSkillTabs(): array
    {
        return $this->data['skilltabs'];
    }

    public function getSkillTab(string $name): CharacterSkillTab
    {
        foreach ($this->data['skilltabs'] as $skillTab) {
            if ($skillTab->getDisplayName() === $name) {
                return $skillTab;
            }
        }
    }

    public function setHotbar(Hotbar $hotbar): void
    {
        $this->data['hotbar'] = $hotbar;
    }

    public function getHotbar(): Hotbar
    {
        return $this->data['hotbar'];
    }

    public function addLegendarium(Legendarium $legendarium, int $pos): void
    {
        if (count($this->data['legendariums']) >= 3) {
            throw new Exception("Can't add more than 3 legendariums.");
        }

        $this->checkValidLegendariumRange($pos);

        $this->data['legendariums'][$pos] = $legendarium;
    }

    public function getLegendarium(int $pos): Legendarium
    {
        $this->checkValidLegendariumRange($pos);

        return $this->data['legendariums'][$pos];
    }

    protected function checkValidLegendariumRange(int $pos): void
    {
        if ($pos < 1 || $pos > 3) {
            throw new Exception("Only 1 through 3 are valid positions.");
        }
    }
}
