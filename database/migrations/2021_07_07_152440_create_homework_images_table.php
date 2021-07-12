<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploaded_user_id');
            $table->unsignedBigInteger('homework_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('path', 2048);
            $table->timestamps();
            $table->foreign('uploaded_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('homework_id')->references('id')->on('homeworks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homework_images');
    }
}
