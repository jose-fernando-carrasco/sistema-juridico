<?php

namespace Database\Seeders;

use App\Models\Invitation;
use Illuminate\Database\Seeder;

class InvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 1 */
        $invitacion1 = new Invitation();
        $invitacion1->title = "Invitacion a Asesinato con Arma de Fuego";
        $invitacion1->Descripcion = "Te invito a ti para trabajar en el caso";
        $invitacion1->status = true;
        $invitacion1->attorney_id = 1; // A
        $invitacion1->lawyer_id = 2;
        $invitacion1->caso_id = 2;
        $invitacion1->save();

        /* 2 */
        $invitacion2 = new Invitation();
        $invitacion2->title = "Invitacion al Asesinato con Arma de Fuego";
        $invitacion2->Descripcion = "Te invito para trabajar en el caso";
        $invitacion2->status = true;
        $invitacion2->attorney_id = 2; // A
        $invitacion2->lawyer_id = 3;
        $invitacion2->caso_id = 2;
        $invitacion2->save();

    }
}
