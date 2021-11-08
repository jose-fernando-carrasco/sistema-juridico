<?php

namespace Database\Seeders;

use App\Models\Judge;
use Illuminate\Database\Seeder;

class JudgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 1 */
        $judge1 = new Judge();
        $judge1->user_id = 10;
        $judge1->save(); 

        /* 2 */
        $judge2 = new Judge();
        $judge2->user_id = 3;
        $judge2->save();

        /* 3 */
        $judge3 = new Judge();
        $judge3->user_id = 5;
        $judge3->save();
    }
}
