<?php

namespace App\Models;


use App\Enums\SkillsName;
use Illuminate\Database\Eloquent\Model;


class Skills extends Model
{
    const TABLE = 'skills';
    protected $table = self::TABLE;
    protected $fillable = ['name'];
    protected $casts = ['name' => SkillsName::class];
}
