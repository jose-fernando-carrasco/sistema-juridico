<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        /* 1 */
        $user1 = new User();
        $user1->name = "Juan Cristian Castro Ayala";
       // $user1->carnet = 8236790;
        $user1->email = "cris@correo.com";
        $user1->password = bcrypt('32323232');
        $user1->save();

        /* 2 */
        $user2 = new User();
        $user2->name = "Carlos Pepe Efrain Aguilar";
        //$user2->carnet = 9236716;
        $user2->email = "pepe@correo.com";
        $user2->password = bcrypt('32823232');
        $user2->save();

        /* 3 */
        $user3 = new User();
        $user3->name = "Juan Pablo Sanchez Chavez";
        //$user3->carnet = 4436733;
        $user3->email = "pablo@correo.com";
        $user3->password = bcrypt('31223232');
        $user3->save();

        /* 4 */
        $user4 = new User();
        $user4->name = "Maria Fernanda Chumacero Carrasco";
        //$user4->carnet = 2232794;
        $user4->email = "fer@correo.com";
        $user4->password = bcrypt('54223232');
        $user4->save();

        /* 5 */
        $user5 = new User();
        $user5->name = "Carla Patricia Melgar Barrientos";
        //$user5->carnet = 8239999;
        $user5->email = "carla@correo.com";
        $user5->password = bcrypt('99223232');
        $user5->save();

        /* 6 */
        $user6 = new User();
        $user6->name = "Eugenia Elisa Gonzales Vedia";
        //$user6->carnet = 1236681;
        $user6->email = "eli@correo.com";
        $user6->password = bcrypt('31223289');
        $user6->save();

        /* 7 */
        $user7 = new User();
        $user7->name = "Gustavo Adolfo Ortega Leon";
        //$user7->carnet = 876542;
        $user7->email = "brayan@correo.com";
        $user7->password = bcrypt('31267232');
        $user7->save();

        /* 8 */
        $user8 = new User();
        $user8->name = "Joaquin Chumacero Yupanqui";
        //$user8->carnet = 7841230;
        $user8->email = "joaquin@correo.com";
        $user8->password = bcrypt('11223882');
        $user8->save();

        /* 9 */
        $user9 = new User();
        $user9->name = "Victor Hugo Vega Bonifacio";
        //$user9->carnet = 1029384;
        $user9->email = "hugo@correo.com";
        $user9->password = bcrypt('31553252');
        $user9->save();
    }
}
