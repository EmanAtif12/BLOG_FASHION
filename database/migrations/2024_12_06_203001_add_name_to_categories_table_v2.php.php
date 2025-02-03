<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Check if the column exists and if it has the foreign key constraint
            if (Schema::hasColumn('posts', 'category_id')) {
                // Check if the foreign key constraint exists
                $foreignKeyExists = DB::select("SHOW KEYS FROM posts WHERE Key_name = 'posts_category_id_foreign'");
                
                // If the foreign key exists, drop it
                if (!empty($foreignKeyExists)) {
                    $table->dropForeign(['category_id']);
                }
                $table->dropColumn('category_id');
            }

            // Add the column with the correct foreign key constraint
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Safely remove the foreign key and column
            if (Schema::hasColumn('posts', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
        });
    }
};
