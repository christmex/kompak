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
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('form_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('questionnaire_title');
            $table->longText('questionnaire_description');
            $table->tinyInteger('questionnaire_target');
            $table->longText('questionnaire_embed_link');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaires');
    }
};
