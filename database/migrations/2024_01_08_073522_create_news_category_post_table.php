<?php

use App\Models\NewsCategory;
use App\Models\NewsPost;
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
        Schema::create('news_category_post', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(NewsPost::class);
            $table->foreignIdFor(NewsCategory::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_category_post');
    }
};
