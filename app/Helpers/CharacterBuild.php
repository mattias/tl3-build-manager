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
    const TIGHT_GROUPING = 'tight_grouping';
    const ONSLAUGHT = 'onslaught';
    const TARGETED_STRIKES = 'targeted_strikes';
    const RELOAD = 'reload';
    const EXPLOSIVE_ARROW = 'explosive_arrow';
    const HEART_SEEKER = 'heart_seeker';
    const SCATTER_SHOT = 'scatter_shot';

    // SS Adventurer skills
    const ADVENTURER = 'Adventurer';
    const SCOUTS_BONES = 'scouts_bones';
    const GOBLIN_LEGION = 'goblin_legion';
    const GHOST_VISAGE = 'ghost_visage';
    const RIZZIS_FATE = 'rizzis_fate';
    const SACRIFICE_TO_GOOSE = 'sacrifice_to_goose';
    const CURSE_OF_PI_PI = 'curse_of_pi_pi';
    const SHASTA = 'shasta';

    // Railmaster Conductor skills
    const CONDUCTOR = 'Conductor';
    const BUILD_TRAIN = 'build_train';
    const MORTAR_CAR = 'mortar_car';
    const SHIELD_CAR = 'shield_car';
    const SHOTGONNE_CAR = 'shotgonne_car';
    const GHOST_TRAIN = 'ghost_train';
    const SHOCKING_ROUNDS = 'shocking_rounds';
    const FLAMETHROWER_CAR = 'flamethrower_car';

    // Railmaster Lineage skills
    const LINEAGE = 'Lineage';
    const POUND = 'pound';
    const BLASTING_CHARGE = 'blasting_charge';
    const HAMMER_SPIN = 'hammer_spin';
    const FLYING_PICKS = 'flying_picks';
    const LANTERN_FLASH = 'lantern_flash';
    const TORQUE_SWING = 'torque_swing';
    const SPIKE_DRIVE = 'spike_drive';

    // Forged Barrage skills
    const BARRAGE = 'Barrage';
    const RAPID_FIRE = 'rapid_fire';
    const COAL_LAUNCH = 'coal_launch';
    const SHOTGONNE_BLAST = 'shotgonne_blast';
    const POISON_DART = 'poison_dart';
    const SONIC_PULSE_ARM = 'sonic_pulse_arm';
    const SLUG_SHOT = 'slug_shot';
    const FURNANCE_BLAST = 'furnance_blast';

    // Forged Brawl skills
    const BRAWL = 'Brawl';
    const RAPID_STRIKE = 'rapid_strike';
    const VORTEX_BOMB = 'vortex_bomb';
    const RAMMING_ROBOT = 'ramming_robot';
    const SERVO_DRIVEN_UPPERCUT = 'servo_driven_uppercut';
    const FRACKING_STRIKE = 'fracking_strike';
    const POWER_PROJECTION = 'power_projection';
    const CYCLONE_MODE = 'cyclone_mode';

    // Relics
    const BANE = 'Bane';
    const FLAMING_DESTROYER = 'Flaming Destroyer';
    const BLOOD_DRINKER = 'Blood Drinker';
    const COLDHEART = 'Coldheart';
    const ELECTRODE = 'Electrode';

    // Common skill
    const ENERGIZER = 'Energizer';

    // Bane skills
    const EIGHTLEGGEDDALLIES = 'eightleggeddallies';
    const SPECTRALSPIDER = 'spectralspider';
    const POISONNOVA = 'poisonnova';
    const SPREADOFDEATH = 'spreadofdeath';
    const STAFFEDUP = 'staffedup';
    const VENOMOUSMAW = 'venomousmaw';
    const MIASMA = 'miasma';
    const PUPPETMASTER = 'puppetmaster';
    const ARACHNIDASSAULT = 'arachnidassault';

    // Flaming Destroyer skills
    const SWORDSMASH = 'swordsmash';
    const IGNITIONSOURCE = 'ignitionsource';
    const MAGMABURST = 'magmaburst';
    const BLAZINGPILLAR = 'blazingpillar';
    const GIANTSWINGS = 'giantswings';
    const CLOAKOFFLAMES = 'cloakofflames';
    const NIMBLEFLAMES = 'nimbleflames';
    const FIRESTORM = 'firestorm';
    const SUMMONINGSMASH = 'summoningsmash';

    // Blood Drinker skills
    const SPINNINGBLADE = 'Spinning Blade';
    const BLOODLETTER = 'Bloodletter';
    const BLADESFORCUTTING = 'Blades for Cutting';
    const BLOODSEEKERS = 'Blood Seekers';
    const LIVINGBARRIER = 'Living Barrier';
    const RUPTURE = 'Rupture';
    const BLOODYCHALICE = 'Bloody Chalice';
    const DRAIN = 'Drain';
    const DANCEOFDEATH = 'Dance of Death';
    const BLOOD_DRINKER_SORT = [
        self::SPINNINGBLADE, self::BLOODLETTER, self::BLADESFORCUTTING,
        self::BLOODSEEKERS, self::LIVINGBARRIER, self::RUPTURE,
        self::BLOODYCHALICE, self::DRAIN, self::DANCEOFDEATH, self::ENERGIZER
    ];

    // Coldheart skills
    const JAGGEDICE = 'jaggedice';
    const ICESHIELD = 'iceshield';
    const FROSTBLAST = 'frostblast';
    const FROSTSKIN = 'frostskin';
    const ICEGOLEM = 'icegolem';
    const LARGEBORES = 'largebores';
    const BREAKINGPOINT = 'breakingpoint';
    const SNOWSTORM = 'snowstorm';
    const COLDFRONT = 'coldfront';

    // Electrode skills
    const LOCALIZEDSTORM = 'localizedstorm';
    const SHOCKINGDISPLAY = 'shockingdisplay';
    const SHOCKINGFORCE = 'shockingforce';
    const CHAOTICSTRIKES = 'chaoticstrikes';
    const LIGHTNINGBARRIER = 'lightningbarrier';
    const TINGLINGSENSATION = 'tinglingsensation';
    const LIGHTNINGSTRIKE = 'lightningstrike';
    const CONJUREELECTRODE = 'conjureelectrode';
    const THOUSANDVOLTBURST = 'thousandvoltburst';

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
