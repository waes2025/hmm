<?php

use App\Models\Registration;
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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            $table->text('logo')->nullable();
            $table->timestamps();
        });

        Registration::create([
            'name' => 'hmm',
            'title' => 'A Curated Blog',
            'description' => 'A curated collection of stories, insights, and ideas.',
            'owner_id' => 1,
            'logo' => null,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration');
    }
};
