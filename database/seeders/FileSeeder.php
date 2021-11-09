<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 1 */
        /* $file1 = new File();
        $file1->title = "Trafico de Drogas";
        $file1->caso_id = 1;
        $file1->save(); */
        
        /* 1 */
        $file2 = new File();
        $file2->title = "Expediente de Asesinato con Arma de Fuego";
        $file2->caso_id = 2;
        $file2->save();

       /*  2 
        $file3 = new File();
        $file3->title = "Despojamiento de bienes";
        $file3->caso_id = 3;
        $file3->save(); */

    }
}
