<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('save', function (Blueprint $table) {
            $table->id('save_id');
            $table->foreignId('promt_id')->constrained('promt');
            $table->foreignId('account_id')->constrained('account');
            $table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('save');
    }
};