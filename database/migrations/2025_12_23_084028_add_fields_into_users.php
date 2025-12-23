<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table(table: User::TABLE, callback: function (Blueprint $table) {
            $table->string(column: 'bio', length: 256)->nullable()->after(column: 'password');
            $table->string(column: 'state')->nullable()->after(column: 'bio');
            $table->tinyInteger(column: 'years_of_experience')->nullable()->after(column: 'state');
        });
    }
    public function down(): void
    {
        Schema::table(table: User::TABLE, callback: function(Blueprint $table) {
            $table->dropIfExists();
        });
    }
};
