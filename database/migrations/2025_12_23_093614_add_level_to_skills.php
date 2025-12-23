<?php

use App\Models\Skills;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(table: Skills::TABLE, callback: function (Blueprint $table) {
            $table->string(column: 'level')->default(value: 'beginner')->after(column: 'name');
        });
    }
    public function down(): void
    {
        Schema::table(table: Skills::TABLE, callback:  function (Blueprint $table) {
            $table->dropIfExists();
        });
    }
};
