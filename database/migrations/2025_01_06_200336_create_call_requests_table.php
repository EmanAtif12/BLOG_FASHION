<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('call_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number');
            $table->string('email');
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('call_requests');
    }
}
