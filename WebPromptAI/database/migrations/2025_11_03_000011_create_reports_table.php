<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->id('report_id');
            $table->foreignId('promt_id')->constrained('promt');
            $table->foreignId('account_id')->constrained('account');
            $table->text('reason');
            $table->timestamp('created_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('report');
    }
};