<?php

namespace Database\Seeders;

use App\Models\Attorney;
use Illuminate\Database\Seeder;

class AttorneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /* 1 */
        $attorney1 = new Attorney();
        $attorney1->user_id = 7;
        $attorney1->save();

        /* 2 */
        $attorney2 = new Attorney();
        $attorney2->user_id = 8;
        $attorney2->save();

        /* 3 */
        $attorney3 = new Attorney();
        $attorney3->user_id = 9;
        $attorney3->save();

    }
}
