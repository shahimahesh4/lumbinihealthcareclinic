<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('mobile_image_path')->nullable()->after('image_path');
            $table->string('mobile_title')->nullable()->after('title');
            $table->string('mobile_subtitle')->nullable()->after('subtitle');
        });
    }

    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn(['mobile_image_path', 'mobile_title', 'mobile_subtitle']);
        });
    }
};
