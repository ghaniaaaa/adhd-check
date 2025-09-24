<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gejala', function (Blueprint $table) {
            $table->id();
            $table->char('kode_gejala')->unique();
            $table->string('gejala');
            $table->enum('bagian', ['A', 'B']); // A: Inatensi, B:Hiperaktif
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
        Schema::dropIfExists('gejalas');
    }
};
