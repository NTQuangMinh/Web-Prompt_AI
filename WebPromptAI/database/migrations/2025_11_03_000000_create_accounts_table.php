<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id('account_id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fullname')->nullable();
            $table->text('description')->nullable();
            $table->string('avatar')->nullable();
            $table->foreignId('role_id')->constrained('role');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('account');
    }
};