<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Domain\Comments\Models\Comment;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Comments', function (Blueprint $table) {
            $table->id("id");
            $table->foreignUuid("user_id");
            $table->foreignUuid("step_id");
            $table->text("text");
            $table->unsignedMediumInteger("likes_number")->default(0);
            $table->foreignIdFor(Comment::class, "parent_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
