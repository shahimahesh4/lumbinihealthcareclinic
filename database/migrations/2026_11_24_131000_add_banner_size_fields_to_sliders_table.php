<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->unsignedSmallInteger('desktop_height')->default(720)->after('mobile_image_path');
            $table->unsignedSmallInteger('mobile_height')->default(620)->after('desktop_height');
        });
    }

    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn(['desktop_height', 'mobile_height']);
        });
    }
};
