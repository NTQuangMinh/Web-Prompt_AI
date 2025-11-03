<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('promt', function (Blueprint $table) {
            $table->id('promt_id');
            $table->foreignId('account_id')->constrained('account');
            $table->string('title');
            $table->text('content');
            $table->string('status')->default('waiting');
            $table->timestamps();
            $table->string('image')->nullable();
            $table->integer('likes_count')->default(0);
            $table->integer('comments_count')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('promt');
    }
};