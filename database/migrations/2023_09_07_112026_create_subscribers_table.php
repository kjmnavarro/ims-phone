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
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->string('username');
            $table->string('password');
            $table->unsignedBigInteger('domain_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('features_id');
            $table->timestamps();

            $table->foreign('domain_id')->references('id')->on('domains');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('features_id')->references('id')->on('features');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
