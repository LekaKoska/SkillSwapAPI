<?php

namespace App\Models;


use App\Enums\SkillLevel;
use App\Enums\SkillsName;
use Illuminate\Database\Eloquent\Model;


class Skills extends Model
{
    const TABLE = 'skills';
    protected $table = self::TABLE;
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['id', 'name', 'level'];
    protected $casts = ['name' => SkillsName::class, 'level' => SkillLevel::class];
}
