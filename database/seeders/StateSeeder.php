<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 1 */
        $estado1 = new State();
        $estado1->name = "En Espera";
        $estado1->save();
        /* 2 */
        $estado2 = new State();
        $estado2->name = "En Curso";
        $estado2->save();

        /* 3 */
        $estado3 = new State();
        $estado3->name = "Concluido";
        $estado3->save();
    }
}
