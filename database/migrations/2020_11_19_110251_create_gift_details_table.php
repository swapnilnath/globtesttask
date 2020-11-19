<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_details', function (Blueprint $table) {
            $table->id();
            $table->string('gift_name')->nullable();
            $table->string('store_id')->nullable();
            $table->string('gift_image')->nullable();
            $table->longText('description')->nullable();
            $table->string('price')->nullable();
            $table->string('post_gift_detail')->nullable();
            $table->enum('status',['active', 'block'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gift_details');
    }
}
