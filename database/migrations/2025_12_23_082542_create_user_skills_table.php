<?php

use App\Models\Skills;
use App\Models\User;
use App\Models\UserSkills;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(UserSkills::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'skill_id')->constrained(table: Skills::TABLE);
            $table->foreignId(column: 'user_id')->constrained(table: User::TABLE);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists(UserSkills::TABLE);
    }
};
