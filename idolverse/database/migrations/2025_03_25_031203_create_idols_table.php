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
        Schema::create('idols', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->default('name');
            $table->string('password')->default('name');
            $table->rememberToken();
            $table->unsignedBigInteger('groupId');
            $table->unsignedBigInteger('agencyId');
            $table->foreign('groupId')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('agencyId')->references('id')->on('agencies')->onDelete('cascade');
            $table->string('photo')->nullable();
            $table->date('birthday')->nullable();
            $table->string('birth_country')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('position');
            $table->integer('height');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idols');
    }
};
