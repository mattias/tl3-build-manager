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
    const CONCECRATION = 'Concecration';
    const LIGHT_SPEAR = 'Light Spear';
    const HOLY_FURY = 'Holy Fury';
    const LUMONOUS_RUN = 'lumonous_run';
    const ABSOLVER = 'absolver';

    // DM Dark skills
    const DARK = 'dark';
    const UNHOLY_BOLT = 'unholy_bolt';
    const DARK_SPEARS = 'dark_spears';
    const SHADOW_STEP = 'shadow_step';
    const SPIRIT_WELL = 'spirit_well';
    const ENERGY_SPIKE = 'energy_spike';
    const DAMNATION = 'damnation';
    const ENTROPY = 'entropy';

    // SS Precision skills
    const PRECISION = 'precision';
    const TIGHT_GROUPING = 'tight_grouping';
    const ONSLAUGHT = 'onslaught';
    const TARGETED_STRIKES = 'targeted_strikes';
    const RELOAD = 'reload';
    const EXPLOSIVE_ARROW = 'explosive_arrow';
    const HEART_SEEKER = 'heart_seeker';
    const SCATTER_SHOT = 'scatter_shot';

    // SS Adventurer skills
    const ADVENTURER = 'adventurer';
    const SCOUTS_BONES = 'scouts_bones';
    const GOBLIN_LEGION = 'goblin_legion';
    const GHOST_VISAGE = 'ghost_visage';
    const RIZZIS_FATE = 'rizzis_fate';
    const SACRIFICE_TO_GOOSE = 'sacrifice_to_goose';
    const CURSE_OF_PI_PI = 'curse_of_pi_pi';
    const SHASTA = 'shasta';

    // Railmaster Conductor skills
    const CONDUCTOR = 'conductor';
    const BUILD_TRAIN = 'build_train';
    const MORTAR_CAR = 'mortar_car';
    const SHIELD_CAR = 'shield_car';
    const SHOTGONNE_CAR = 'shotgonne_car';
    const GHOST_TRAIN = 'ghost_train';
    const SHOCKING_ROUNDS = 'shocking_rounds';
    const FLAMETHROWER_CAR = 'flamethrower_car';

    // Railmaster Lineage skills
    const LINEAGE = 'lineage';
    const POUND = 'pound';
    const BLASTING_CHARGE = 'blasting_charge';
    const HAMMER_SPIN = 'hammer_spin';
    const FLYING_PICKS = 'flying_picks';
    const LANTERN_FLASH = 'lantern_flash';
    const TORQUE_SWING = 'torque_swing';
    const SPIKE_DRIVE = 'spike_drive';

    // Forged Barrage skills
    const BARRAGE = 'barrage';
    const RAPID_FIRE = 'rapid_fire';
    const COAL_LAUNCH = 'coal_launch';
    const SHOTGONNE_BLAST = 'shotgonne_blast';
    const POISON_DART = 'poison_dart';
    const SONIC_PULSE_ARM = 'sonic_pulse_arm';
    const SLUG_SHOT = 'slug_shot';
    const FURNANCE_BLAST = 'furnance_blast';

    // Forged Brawl skills
    const BRAWL = 'brawl';
    const RAPID_STRIKE = 'rapid_strike';
    const VORTEX_BOMB = 'vortex_bomb';
    const RAMMING_ROBOT = 'ramming_robot';
    const SERVO_DRIVEN_UPPERCUT = 'servo_driven_uppercut';
    const FRACKING_STRIKE = 'fracking_strike';
    const POWER_PROJECTION = 'power_projection';
    const CYCLONE_MODE = 'cyclone_mode';

    // Relics
    const BANE = 'bane';
    const FLAMING_DESTROYER = 'flamingdestroyer';
    const BLOOD_DRINKER = 'blooddrinker';
    const COLDHEART = 'coldheart';
    const ELECTRODE = 'electrode';

    // Common skill
    const ENERGIZER = 'energizer';

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
    const SPINNINGBLADE = 'spinningblade';
    const BLOODLETTER = 'bloodletter';
    const BLADESFORCUTTING = 'bladesforcutting';
    const BLOODSEEKERS = 'bloodseekers';
    const LIVINGBARRIER = 'livingbarrier';
    const RUPTURE = 'rupture';
    const BLOODYCHALICE = 'bloodychalice';
    const DRAIN = 'drain';
    const DANCEOFDEATH = 'danceofdeath';

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
        'legendarium' => [],
    ];

    public function __construct(Hotbar $hotbar = null)
    {
        $this->data['hotbar'] = $hotbar ? $hotbar : new Hotbar;
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

    public function getSkillTab(string $name): CharacterSkillTab
    {
        foreach ($this->data['skilltabs'] as $skillTab) {
            if ($skillTab->getDisplayName() === $name) {
                return $skillTab;
            }
        }
    }

    public function getHotbar(): Hotbar
    {
        return $this->data['hotbar'];
    }

    public function addLegendarium(Legendarium $legendarium, int $pos): void
    {
        if (count($this->data['legendarium']) >= 3) {
            throw new Exception("Can't add more than 3 legendariums.");
        }

        $this->checkValidLegendariumRange($pos);

        $this->data['legendarium'][$pos] = $legendarium;
    }

    public function getLegendarium(int $pos): Legendarium
    {
        $this->checkValidLegendariumRange($pos);

        return $this->data['legendarium'][$pos];
    }

    protected function checkValidLegendariumRange(int $pos): void
    {
        if ($pos < 1 || $pos > 3) {
            throw new Exception("Only 1 through 3 are valid positions.");
        }
    }
}
