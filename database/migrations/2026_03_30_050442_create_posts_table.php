<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Author
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Basic Info
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');

            // Images
            $table->string('featured_image')->nullable();
            $table->string('thumbnail')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // Publishing
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            // Analytics
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedInteger('reading_time')->nullable();

            // Soft delete (trash system)
            $table->softDeletes();

            $table->timestamps();

            // Indexes (important for performance)
            $table->index(['is_published', 'published_at']);
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
