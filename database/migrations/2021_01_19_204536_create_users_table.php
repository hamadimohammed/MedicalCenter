<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom',50);
            $table->string('prenom',50);
            $table->string('adresse')->nullable();;
            $table->string('email',80)->unique();
            $table->string('phone',10)->nullable();
            $table->date('date_naissance');

            $table->string('login',50)->unique();
            $table->string('password',256);
            $table->boolean('enabled')->default('1');
            $table->bigInteger('spec_id')->unsigned()->nullable();
            $table->foreign('spec_id')
                ->references('id')->on('specialites')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->enum('grade', ['admin', 'medecin','secretaire']);
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
        Schema::dropIfExists('users');
    }
}
