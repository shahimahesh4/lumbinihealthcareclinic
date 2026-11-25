<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_heroes', function (Blueprint $table) {
            $table->string('about_eyebrow')->default('- ABOUT US -')->after('badge_bottom_text');
            $table->string('about_title')->default('We Give You The Perfect Care You Deserve')->after('about_eyebrow');
            $table->text('about_description')->nullable()->after('about_title');
            $table->string('about_image_path')->nullable()->after('about_description');
            $table->string('about_image_alt')->default('Clinical Care at Lumbini Health Care Center')->after('about_image_path');
            $table->string('about_doctor_image_path')->nullable()->after('about_image_alt');
            $table->string('about_doctor_name')->default('Dr. Suresh Sharma')->after('about_doctor_image_path');
            $table->string('about_doctor_designation')->default('Medical Director & Senior Consultant')->after('about_doctor_name');
            $table->string('about_doctor_credentials')->default('Certified Healthcare Practitioner • 15+ Yrs Experience')->after('about_doctor_designation');
            $table->string('about_button_text')->default('Our Services')->after('about_doctor_credentials');
            $table->string('about_button_link')->default('/services')->after('about_button_text');
            $table->string('about_emergency_text')->default('24/7 Hours Emergency Support')->after('about_button_link');
        });
    }

    public function down(): void
    {
        Schema::table('homepage_heroes', function (Blueprint $table) {
            $table->dropColumn([
                'about_eyebrow', 'about_title', 'about_description', 'about_image_path', 'about_image_alt',
                'about_doctor_image_path', 'about_doctor_name', 'about_doctor_designation',
                'about_doctor_credentials', 'about_button_text', 'about_button_link', 'about_emergency_text',
            ]);
        });
    }
};
