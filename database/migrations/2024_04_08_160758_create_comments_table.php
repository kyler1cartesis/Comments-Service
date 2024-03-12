<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Domain\Comments\Models\Comments;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Comments', function (Blueprint $table) {
            $table->id("Id");
            $table->foreignUuid("UserId");
            $table->foreignUuid("StepId");
            $table->text("Text");
            $table->unsignedMediumInteger("LikesNumber")->default(0);
            $table->foreignIdFor(Comments::class, "ParentId")->nullable();
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
