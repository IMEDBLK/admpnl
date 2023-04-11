<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacksTable extends Migration
{
    public function up()
    {
        Schema::create('packs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->integer('prix');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packs');
    }
}
