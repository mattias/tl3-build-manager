<?php

namespace App\Helpers;

class BuildlinkParser
{
    // Classes
    const DUSK_MAGE = 'duskmage';
    const FORGED = 'forged';
    const RAILMASTER = 'railmaster';
    const SHARPSHOOTER = 'sharpshooter';

    // DM Light skills
    const LIGHT = 'light';
    const HOLY_BOLT = 'holy_bolt';
    const RADIANT_BLAST = 'radiant_blast';
    const CONCENCRATION = 'concencration';
    const LIGHT_SPEAR = 'light_spear';
    const HOLY_FURY = 'holy_fury';
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


    // Class positions
    const CLASS_TREE1_POSITIONS = [
        self::DUSK_MAGE => [3, 7, 8, 9, 4, 5, 6],
        self::FORGED => [3, 4, 5, 6, 7, 8, 9],
        self::RAILMASTER => [3, 4, 5, 7, 9, 6, 8],
        self::SHARPSHOOTER => [3, 9, 8, 7, 5, 6, 4],
    ];

    const CLASS_TREE2_POSITIONS = [
        self::DUSK_MAGE => [10, 12, 15, 13, 16, 14, 11],
        self::FORGED => [10, 11, 12, 13, 15, 16, 14],
        self::RAILMASTER => [10, 11, 12, 13, 14, 15, 16],
        self::SHARPSHOOTER => [10, 14, 11, 12, 13, 15, 16],
    ];

    protected $buildlink;
    protected $buildStart;
    protected $class;

    public function parse(string $buildlink): array
    {
        $this->buildlink = $buildlink;
        $this->buildStart = strpos($buildlink, '?');
        $this->buildStart += 7; // Moves to the beginning of the data

        $parsed = [];
        $parsed['class'] = $this->class = $this->getClass();
        $parsed['relic'] = $this->getRelic();
        $parsed['tree1'] = $this->getTree1();
        $parsed['tree2'] = $this->getTree2();
        $parsed['relicskills'] = $this->getRelicskills();
        $parsed['hotbar'] = $this->getHotbar();
        $parsed['legendarium'] = $this->getLegendarium();

        return $parsed;
    }

    private function getClass(): string
    {
        return $this->getClassFromNumber(
            (int) $this->getDataFromPos(
                $this->getPosition(1)
            )
        );
    }

    private function getClassFromNumber(int $num): string
    {
        return [
            self::DUSK_MAGE,
            self::FORGED,
            self::RAILMASTER,
            self::SHARPSHOOTER,
        ][$this->zeroBased($num)];
    }

    private function getRelic(): string
    {
        return $this->getRelicFromNumber(
            (int) $this->getDataFromPos(
                $this->getPosition(2)
            )
        );
    }

    private function getRelicFromNumber(int $num): string
    {
        return [
            self::BANE,
            self::FLAMING_DESTROYER,
            self::BLOOD_DRINKER,
            self::COLDHEART,
            self::ELECTRODE,
        ][$this->zeroBased($num)];
    }

    private function getTree1(): array
    {
        $tree = [];
        $positions = self::CLASS_TREE1_POSITIONS[$this->class];

        foreach ($positions as $pos) {
            $tree[] = $this->chardec($this->getDataFromPos($this->getPosition($pos)));
        }

        return $tree;
    }

    private function getTree2(): array
    {
        $tree = [];
        $positions = self::CLASS_TREE2_POSITIONS[$this->class];

        foreach ($positions as $pos) {
            $tree[] = $this->chardec($this->getDataFromPos($this->getPosition($pos)));
        }

        return $tree;
    }

    private function getRelicskills(): array
    {
        $tree = [];
        $positions = [17, 18, 19, 20, 21, 22, 23, 24, 25, 26];

        foreach ($positions as $pos) {
            $tree[] = $this->chardec($this->getDataFromPos($this->getPosition($pos)));
        }

        return $tree;
    }

    private function getHotbar(): array
    {
        $tree = [];
        $positions = [27, 28, 29, 30, 31, 32, 33, 34, 35];

        foreach ($positions as $pos) {
            $tree[] = $this->chardec($this->getDataFromPos($this->getPosition($pos)));
        }

        return $tree;
    }

    private function getLegendarium(): array
    {
        $legendarium = explode(';', substr($this->buildlink, $this->getPosition(37)['start']));

        return $legendarium;
    }

    private function getDataFromPos(array $pos)
    {
        return substr($this->buildlink, $pos['start'], $pos['end']);
    }

    private function getPosition(int $pos): array
    {
        $pos = $this->zeroBased($pos);

        return [
            'start' => $this->buildStart + $pos,
            'end' => ($this->buildStart + 1 + $pos) - ($this->buildStart + $pos),
        ];
    }

    // Maybe a better name?
    private function zeroBased(int $num): int
    {
        return ($num <= 0)
            ? 0
            : --$num;
    }

    // I thought it was hex first, but it was just regular characters
    private function chardec(string $char): int
    {
        return is_numeric($char)
            ? (int) $char
            : ord(strtolower($char)) - 87;
    }
}
