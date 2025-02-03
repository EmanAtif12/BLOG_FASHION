<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop the foreign key if it exists
            $foreignKeyExists = DB::select("SHOW KEYS FROM posts WHERE Key_name = 'posts_category_id_foreign'");
            if (!empty($foreignKeyExists)) {
                $table->dropForeign(['category_id']);
            }

            // Drop the column if it exists
            if (Schema::hasColumn('posts', 'category_id')) {
                $table->dropColumn('category_id');
            }

            // Add the new category_id column with the foreign key constraint
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Safely remove the foreign key and column if it exists
            if (Schema::hasColumn('posts', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
        });
    }
}
