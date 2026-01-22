<?php

use App\Models\Post;
use App\Models\User;
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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Post::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->unique(['post_id', 'user_id']);

            // $table->tinyInteger('value');  // -1 for dislike 1 for like (youtube)
            //$table->enum('value', [1, -1])->default(1);

            // facebook reactions
            //$table->enum('value', ['👍', '❤️', '😂', '💩']);

//            discord
//            $table->string('value');
//            $table->unique(['post_id', 'user_id', 'value']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
