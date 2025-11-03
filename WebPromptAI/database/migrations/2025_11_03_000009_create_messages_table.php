<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->id('message_id');
            $table->foreignId('sender_id')->constrained('account');
            $table->foreignId('reciever_id')->constrained('account');
            $table->text('content');
            $table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('message');
    }
};