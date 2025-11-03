<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('follow', function (Blueprint $table) {
            $table->id('follow_id');
            $table->foreignId('follower_id')->constrained('account');
            $table->foreignId('following_id')->constrained('account');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('follow');
    }
};