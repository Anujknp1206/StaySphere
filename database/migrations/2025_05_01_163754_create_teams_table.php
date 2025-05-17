<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable(); // path or URL to photo
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('webaddress')->nullable();
            $table->string('designation')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();

            $table->string('intro')->nullable(); // Short introduction
            $table->text('description')->nullable(); // Full bio or description

            // Numeric rating columns for different experiences
            $table->unsignedTinyInteger('experience_communication')->nullable();
            $table->unsignedTinyInteger('experience_professionalism')->nullable();
            $table->unsignedTinyInteger('experience_quality')->nullable();
            $table->unsignedTinyInteger('experience_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
