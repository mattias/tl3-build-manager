<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\BuildlinkParser;
use App\Helpers\SkillIconFetcher;

class Build extends Model
{
    use HasFactory;

    protected $buildlinkParser;
    protected $skillIconFetcher;

    protected $fillable = [
        'name',
        'link',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->buildlinkParser = resolve(BuildlinkParser::class);
        $this->skillIconFetcher = resolve(SkillIconFetcher::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hotbar()
    {
        $result = [];
        $characterBuild = $this->buildlinkParser->parse($this->link);
        $hotbar = $characterBuild->getHotbar();
        for ($i = 0; $i < 9; $i++) {
            $result[$i] = $this->skillIconFetcher->get(
                $characterBuild->getClass(),
                $hotbar->getPosition($i)->getTree(),
                $hotbar->getPosition($i)->getDisplayName()
            );
        }

        return $result;
    }
}
