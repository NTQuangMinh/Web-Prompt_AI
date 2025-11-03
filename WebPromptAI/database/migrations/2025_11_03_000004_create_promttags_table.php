<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('promttag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promt_id')->constrained('promt');
            $table->foreignId('tag_id')->constrained('tag');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promttag');
    }
};