<?php

namespace Database\Seeders;

use App\Models\Lawyer;
use Illuminate\Database\Seeder;

class LawyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 1 */
        $lawyer1 = new Lawyer();
        $lawyer1->user_id = 2;
        $lawyer1->save(); 

        /* 2 */
        $lawyer2 = new Lawyer();
        $lawyer2->user_id = 4;
        $lawyer2->save();

        /* 3 */
        $lawyer3 = new Lawyer();
        $lawyer3->user_id = 6;
        $lawyer3->save();
    }
}
