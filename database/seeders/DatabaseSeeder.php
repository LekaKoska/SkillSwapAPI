<?php

namespace Database\Seeders;

use App\Enums\SkillLevel;
use App\Enums\SkillsName;
use App\Models\Skills;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

      $user =  User::factory()->create([
            'name' => 'Leka User',
            'email' => 'lekare@gmail.com',
            'password' => Hash::make('password'),
        ]);

      $user->createToken('admin-access')->plainTextToken;
        foreach (SkillsName::cases() as $skill)
        {
            Skills::create(['name' => $skill->value]);
        }
    }
}
