<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use App\Helpers\Legendarium;
use Exception;

class Legendariums
{
    protected static $legendaries;

    public static function init()
    {
        if(empty(self::$legendaries)) {
            self::$legendaries = json_decode(Storage::disk('local')->get('legendaries.json'), true)["legendaryItems"];
            sort(self::$legendaries);
        }
    }

    public static function clear()
    {
        self::$legendaries = [];
    }

    public static function getLegendariumById(int $id = 1): Legendarium
    {
        if(empty(self::$legendaries)) {
            throw new Exception("Must run Legendariums::init() before usage!");
        }

        if(--$id < 0) {
            $id = 0;
        }

        return new Legendarium(
            self::$legendaries[$id]['displayName'],
            self::$legendaries[$id]['description']
        );
    }
}
