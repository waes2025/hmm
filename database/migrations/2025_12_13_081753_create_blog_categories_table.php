<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\BlogCategories;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->text(('image'))->nullable();
            $table->string('slug')->nullable();
            $table->enum('is_featured', ['0', '1'])->default(0);
            $table->timestamps();
        });

        BlogCategories::create([
            'name' => 'General',
            'description' => 'General blog category',
            'slug' => 'general',
            'is_featured' => '1',
        ]);
        BlogCategories::create([
            'name' => 'Technology',
            'description' => 'Technology related articles',
            'slug' => 'technology',
            'is_featured' => '1',
        ]);
        BlogCategories::create([
            'name' => 'Lifestyle',
            'description' => 'Lifestyle and wellness articles',
            'slug' => 'lifestyle',
            'is_featured' => '0',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
