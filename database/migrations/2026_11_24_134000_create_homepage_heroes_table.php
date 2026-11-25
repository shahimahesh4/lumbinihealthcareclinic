<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('image_path')->nullable();
            $table->string('image_alt')->default('Smiling Specialist Doctor');
            $table->string('title_prefix')->default('Best');
            $table->string('title_highlight')->default('Health Care');
            $table->string('title_suffix')->default('Clinic');
            $table->text('description');
            $table->string('primary_button_text')->default('Our Services');
            $table->string('primary_button_link')->default('/services');
            $table->string('secondary_button_text')->default('Meet Doctors');
            $table->string('secondary_button_link')->default('/doctors');
            $table->string('badge_top_text')->default('24/7 OPEN');
            $table->string('badge_bottom_text')->default('CARE');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_heroes');
    }
};
