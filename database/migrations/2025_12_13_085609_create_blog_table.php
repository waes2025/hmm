<?php

use App\Models\Blog;
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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_desc')->nullable(); 
            $table->longText('content')->nullable();
            $table->text('image')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('set null');
            $table->string('slug')->nullable();
            $table->boolean('is_featured')->default(false)->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->dateTime('published_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });

        Blog::create([
            'category_id' => 1,
            'title' => 'Welcome to Our Blog',
            'short_desc' => 'This is the first post in our blog.',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras venenatis euismod malesuada.',
            'status' => 'published',
            'published_at' => now(),
            'created_by' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
