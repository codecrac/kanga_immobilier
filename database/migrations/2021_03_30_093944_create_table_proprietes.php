<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProprietes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietes', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description_courte');
            $table->text('description_longue');


            $table->string('superficie');
            $table->string('adresse');
            $table->string('chambres');
            $table->string('douches');

            $table->string('prix');
            $table->string('video');

            $table->string('url_image');
            $table->text('listes_url_image');
        });

        Schema::table('proprietes', function (Blueprint $table) {
            $table->integer('categorie_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proprietes');
    }
}
