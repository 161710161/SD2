<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKurikulumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kurikulums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kurikulum');
            $table->text('ket_kurikulum');
            $table->string('nama_kepsek');
            $table->string('nama_wkepsek');
            $table->unsignedinteger('guru_id');
            $table->foreign('guru_id')->references('id')->on('gurus')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedinteger('staf_id');
            $table->foreign('staf_id')->references('id')->on('stafs')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('kurikulums');
    }
}
