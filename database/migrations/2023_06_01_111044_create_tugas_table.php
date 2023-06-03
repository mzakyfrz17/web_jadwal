<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('user_id')->constrained('users');
            $table->text('deskripsi');
            $table->dateTime('deadline');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tugas');
    }
}
