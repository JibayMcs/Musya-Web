<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->string('id')->primary()->unique();
            $table->string('name');
            $table->string('cover');
            $table->string('path');
            $table->unsignedBigInteger('album_id');
            $table->timestamps();

            $table->foreign('album_id')
                ->references('id')
                ->on('albums')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
};
