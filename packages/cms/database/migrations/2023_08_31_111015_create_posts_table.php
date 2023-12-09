<?php

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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug");
            $table->text("summary")->nullable();
            $table->longText("content")->nullable();
            $table->json("content_blocks")->nullable();
            $table->boolean("visible")->default(false);
            $table->json("header")->nullable();
            $table->string('featured_image_position')->nullable();
            $table->string('featured_image_visibility')->nullable();
            $table->foreignId('featured_image_id')->nullable()->constrained('media_images')->nullOnDelete();
            $table->foreignId('header_image_id')->nullable()->constrained('media_images')->nullOnDelete();
            $table->foreignId('seo_image_id')->nullable()->constrained('media_images')->nullOnDelete();
            $table->foreignId("post_category_id")->nullable()->constrained()->nullOnDelete();
            $table->timestamp("publish_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
