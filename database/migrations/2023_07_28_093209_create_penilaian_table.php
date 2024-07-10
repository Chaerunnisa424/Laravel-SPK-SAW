<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->integer('id_alternatif');
            $table->string('id_kriteria', 11);
            $table->bigInteger('id_sub')->unsigned();
            $table->timestamps();
        });
        Schema::table('penilaians', function (Blueprint $table) {
            $table->foreign('id_alternatif')->references('id')->on('kosts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kriteria')->references('kode')->on('kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_sub')->references('id')->on('subs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
