<?php

namespace App\Models;


use App\Enums\SkillLevel;
use App\Enums\SkillsName;
use Illuminate\Database\Eloquent\Model;


class Skills extends Model
{
    const TABLE = 'skills';
    protected $table = self::TABLE;
    protected $fillable = ['name', 'level'];
    protected $casts = ['name' => SkillsName::class, 'level' => SkillLevel::class];
}
