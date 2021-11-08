<?php

namespace Database\Seeders;

use App\Models\Archive;
use Illuminate\Database\Seeder;

class ArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 1 */
        $archive1 = new Archive();
        $archive1->title = "imagen de las drogas";
        $archive1->Descripcion = "adipisicing elit. Molestiae ducimus rem a veniam ea temporibus nam veritatis reiciendis aspernatur, possimus laudantium harum facilis aperiam blanditiis";
        $archive1->file_id = 1;
        $archive1->type_id = 3;
        $archive1->save();

        /* 2 */
        $archive2 = new Archive();
        $archive2->title = "Poder de adquisicion";
        $archive2->Descripcion = "adipisicing elit. Molestiae ducimus rem a veniam ea temporibus nam veritatis reiciendis aspernatur, possimus laudantium harum facilis aperiam blanditiis";
        $archive2->file_id = 1;
        $archive2->type_id = 1;
        $archive2->save();

        /* 3 */
        $archive3 = new Archive();
        $archive3->title = "Declaracion juridica";
        $archive3->Descripcion = "adipisicing elit. Molestiae ducimus rem a veniam ea temporibus nam veritatis reiciendis aspernatur, possimus laudantium harum facilis aperiam blanditiis";
        $archive3->file_id = 2;
        $archive3->type_id = 2; 
        $archive3->save();

        /* 4 */
        $archive4 = new Archive();
        $archive4->title = "Imagen de los hechos";
        $archive4->Descripcion = "adipisicing elit. Molestiae ducimus rem a veniam ea temporibus nam veritatis reiciendis aspernatur, possimus laudantium harum facilis aperiam blanditiis";
        $archive4->file_id = 2;
        $archive4->type_id = 3;
        $archive4->save();

        /* 5 */
        $archive5 = new Archive();
        $archive5->title = "Ducumento del Homocidio";
        $archive5->Descripcion = "adipisicing elit. Molestiae ducimus rem a veniam ea temporibus nam veritatis reiciendis aspernatur, possimus laudantium harum facilis aperiam blanditiis";
        $archive5->file_id = 2;
        $archive5->type_id = 2;
        $archive5->save();

        /* Archive::create([  Ejemplo de otra forma de crear
            'title' => 'Ducumento del Homocidio',
            'Descripcion' => 'adipisicing',
            'file_id' => 2,
            'type_id' => 2
        ]); */

    }
}
