<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_urls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploaded_user_id')->nullable();
            $table->unsignedBigInteger('test_id');
            $table->string('url');
            $table->timestamps();
            $table->foreign('uploaded_user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_urls');
    }
}
