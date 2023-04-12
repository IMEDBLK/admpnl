<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoecolesTable extends Migration
{
    public function up()
    {
        Schema::create('auto_ecoles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');

            $table->string('matricule_fiscale');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('pack_id');
            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('cascade');
            $table->date('date_activation_pack');
            $table->string('region'); // Add the region field
            $table->timestamps();
        });

        Schema::table('auto_ecoles', function (Blueprint $table) {
            $table->unsignedBigInteger('pack_id')->change();
        });
    }

    public function down()
    {
        Schema::dropIfExists('autoecoles');
    }
}
