<?php

namespace Database\Seeders;

use App\Models\Caso;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class CasoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 1 */
        $caso1 = new Caso();
        $caso1->code = 3350;
        $caso1->title = "Manejo de Estupefacientes alucinojenas";
        //Datos Demandante
        $caso1->nameA = "Marta Aguirre";
        $caso1->profesionA = "Comerciante";
        $caso1->domicilioA = "Calle los pinos";
        $caso1->ciA = 1111111;
        //Datos Demandado
        $caso1->nameB = "Maria Eugenia";
        $caso1->profesionB = "Florista";
        $caso1->domicilioB = "Av.San Aurelio";
        $caso1->ciB = 2222222;
        $caso1->Descripcion = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem culpa facilis recusandae? Consequuntur labore harum aliquam autem voluptatum excepturi accusamus facere eius natus et. Corrupti quaerat aspernatur ducimus! Deserunt, minus.";
        //Llaves foranea Juez
        $caso1->judge_id = null;
        //Llaves foranea estado
        $caso1->state_id = 1;
        //Llaves foranea Abogado Demandante
        $caso1->lawyerA_id = 1;
        //Llaves foranea Abogado Demandado
        $caso1->lawyerB_id = null;
        //Llaves foranea Procurador Demandante
        $caso1->attorneyA_id = null;
        //Llaves foranea Procurador Demandado
        $caso1->attorneyB_id = null;
        $caso1->save();



        /* 2 */
        $caso2 = new Caso();
        $caso2->code = 4452;
        $caso2->title = "Asesinato con Arma de Fuego";
        //Datos Demandante
        $caso2->nameA = "Digno Nogales";
        $caso2->profesionA = "Estudiante Universitario";
        $caso2->domicilioA = "Calle Van Guardia";
        $caso2->ciA = 3333333;
        //Datos Demandado
        $caso2->nameB = "Hernesto de la Cruz";
        $caso2->profesionB = "Cantante";
        $caso2->domicilioB = "Av.Equipetrol";
        $caso2->ciB = 4444444;
        $caso2->Descripcion = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem culpa facilis recusandae? Consequuntur labore harum aliquam autem voluptatum excepturi accusamus facere eius natus et. Corrupti quaerat aspernatur ducimus! Deserunt, minus.";
        //Llaves foranea Juez
        $caso2->judge_id = 2;
        //Llaves foranea estado
        $caso2->state_id = 2; // cambie xdxdxd
        //Llaves foranea Abogado Demandante
        $caso2->lawyerA_id = 2;
        //Llaves foranea Abogado Demandado
        $caso2->lawyerB_id = 3;

        //Llaves foranea Procurador Demandante
        $caso2->attorneyA_id = 1;
        //Llaves foranea Procurador Demandado
        $caso2->attorneyB_id = 2;

        $caso2->save();
      

        /* 3 */
        $caso3 = new Caso();
        $caso3->code = 4858;
        $caso3->title = "Asalto con arma Blanca";
        //Datos Demandante
        $caso3->nameA = "Ruben Aguirre";
        $caso3->profesionA = "Electricista";
        $caso3->domicilioA = "Calle los ricos";
        $caso3->ciA = 5555555;
        //Datos Demandado
        $caso3->nameB = "Andres Marrique";
        $caso3->profesionB = "Sin oficios";
        $caso3->domicilioB = "Av.la Lujan";
        $caso3->ciB = 6666666;
        $caso3->Descripcion = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem culpa facilis recusandae? Consequuntur labore harum aliquam autem voluptatum excepturi accusamus facere eius natus et. Corrupti quaerat aspernatur ducimus! Deserunt, minus.";
        //Llaves foranea Juez
        $caso3->judge_id = 3;
        //Llaves foranea estado
        $caso3->state_id = 1; // estado concluido
        //Llaves foranea Abogado Demandante
        $caso3->lawyerA_id = 3;
        //Llaves foranea Abogado Demandado
        $caso3->lawyerB_id = 1;
        //Llaves foranea Procurador Demandante
        $caso3->attorneyA_id = null;
        //Llaves foranea Procurador Demandado
        $caso3->attorneyB_id = null;
        $caso3->save();

    }
}
