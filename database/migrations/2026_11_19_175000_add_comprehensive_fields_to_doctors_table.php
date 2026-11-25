<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('name');
            $table->string('title_prefix')->nullable()->after('slug');
            $table->string('designation')->nullable()->after('specialty');
            $table->foreignId('service_id')->nullable()->after('designation')->constrained('services')->nullOnDelete();
            $table->string('nmc_number')->nullable()->after('qualification');
            $table->string('experience_years')->nullable()->after('nmc_number');
            $table->longText('biography')->nullable()->after('bio');
            $table->json('expertise_areas')->nullable()->after('biography');
            $table->json('education_training')->nullable()->after('expertise_areas');
            $table->json('awards_recognitions')->nullable()->after('education_training');
            $table->text('opd_schedule')->nullable()->after('awards_recognitions');
            $table->json('opd_days')->nullable()->after('opd_schedule');
            $table->string('consultation_fee')->nullable()->after('opd_days');
            $table->string('room_number')->nullable()->after('consultation_fee');
            $table->string('emergency_contact')->nullable()->after('email');
            $table->string('instagram_url')->nullable()->after('linkedin_url');
            $table->string('og_image')->nullable()->after('image_url');
            $table->string('meta_title')->nullable()->after('is_active');
            $table->string('meta_description')->nullable()->after('meta_title');
            $table->text('meta_keywords')->nullable()->after('meta_description');
            $table->string('canonical_url')->nullable()->after('meta_keywords');
            $table->boolean('is_featured')->default(true)->after('canonical_url');
            $table->boolean('is_available_for_booking')->default(true)->after('is_featured');
        });
    }

    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->dropColumn([
                'slug',
                'title_prefix',
                'designation',
                'service_id',
                'nmc_number',
                'experience_years',
                'biography',
                'expertise_areas',
                'education_training',
                'awards_recognitions',
                'opd_schedule',
                'opd_days',
                'consultation_fee',
                'room_number',
                'emergency_contact',
                'instagram_url',
                'og_image',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'canonical_url',
                'is_featured',
                'is_available_for_booking',
            ]);
        });
    }
};
