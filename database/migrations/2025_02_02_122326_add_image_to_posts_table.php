<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToPostsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Add image column to posts table
            $table->string('image')->nullable(); // Adjust type as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Remove image column if needed
            $table->dropColumn('image');
        });
    }
}
