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
        Schema::create('form_categories', function (Blueprint $table) {
            $table->id();
            $table->string('form_category_name')->unique();
            $table->integer('parent_id')->nullable();
            $table->integer('lft')->default(0)->unsigned()->nullable();
            $table->integer('rgt')->default(0)->unsigned()->nullable();
            $table->integer('depth')->default(0)->unsigned()->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_categories');
    }
};
