<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSkills extends Model
{
    const TABLE = 'user_skills';
    protected $table = self::TABLE;
    protected $fillable = ['skill_id', 'user_id', 'level'];
}
