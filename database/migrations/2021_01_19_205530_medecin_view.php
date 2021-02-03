<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedecinView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW medecins_view 
            AS SELECT  med.id,nom,prenom,adresse,phone,date_naissance,email,login,grade,spec_id,libelle
            from (
                select id,nom,prenom,adresse,date_naissance,email,login,spec_id,grade,phone
                from users where grade <>'secretaire' and enabled)
            as med,specialites as spec
            WHERE med.spec_id = spec.id 
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
