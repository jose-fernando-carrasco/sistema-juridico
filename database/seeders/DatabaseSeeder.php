<?php

namespace Database\Seeders;

/* use App\Models\Judge; */
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        /* $this->call(ClientSeeder::class); */
        $this->call(StateSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(JudgeSeeder::class);
        $this->call(LawyerSeeder::class);
        $this->call(AttorneySeeder::class);
        $this->call(CasoSeeder::class);
        $this->call(FileSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(ArchiveSeeder::class);
        $this->call(InvitationSeeder::class);
    }
}
