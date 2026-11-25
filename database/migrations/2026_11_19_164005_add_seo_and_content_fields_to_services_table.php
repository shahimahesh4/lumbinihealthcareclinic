<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('meta_title')->nullable()->after('full_description');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->text('meta_keywords')->nullable()->after('meta_description');
            $table->string('og_image')->nullable()->after('meta_keywords');
            $table->string('canonical_url')->nullable()->after('og_image');
            $table->json('features')->nullable()->after('canonical_url');
            $table->text('preparation_guidelines')->nullable()->after('features');
            $table->json('faqs')->nullable()->after('preparation_guidelines');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title',
                'meta_description',
                'meta_keywords',
                'og_image',
                'canonical_url',
                'features',
                'preparation_guidelines',
                'faqs',
            ]);
        });
    }
};
