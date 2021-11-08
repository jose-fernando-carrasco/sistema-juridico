<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 1 */
        $type1 = new Type();
        $type1->name = "Carta";
        $type1->save();

         /* 2 */
         $type2 = new Type();
         $type2->name = "Doc Prueba";
         $type2->save();

          /* 3 */
        $type3 = new Type();
        $type3->name = "Foto";
        $type3->save();

         /* 4 */
         $type4 = new Type();
         $type4->name = "Informe";
         $type4->save();

    }
}
