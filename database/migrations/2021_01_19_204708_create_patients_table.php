<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nom',50);
            $table->string('prenom',50);
            $table->string('adresse')->nullable();;
            $table->string('email',80)->unique();
            $table->string('phone',10)->nullable();
            $table->date('date_naissance');
            $table->bigInteger('num_sec_soc')->unique()->nullable();
            $table->string('antecedent',2048)->nullable();
            $table->boolean('enabled')->default('1');

            $table->string('login',50)->unique();
            $table->string('password',256);
            
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
