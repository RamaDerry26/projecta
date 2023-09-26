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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id')->nullable();
            $table->foreign('siswa_id')->references('id')->on('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('contact_type_id')->nullable();
            $table->foreign('contact_type_id')->references('id')->on('contact_types')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('contacts');
    }
};
