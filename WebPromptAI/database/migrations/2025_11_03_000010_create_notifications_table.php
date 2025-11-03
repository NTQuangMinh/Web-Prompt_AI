<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->id('notification_id');
            $table->foreignId('account_id')->constrained('account');
            $table->foreignId('promt_id')->nullable()->constrained('promt');
            $table->string('type');
            $table->text('content');
            $table->boolean('is_read')->default(false);
            $table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notification');
    }
};