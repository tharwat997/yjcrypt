<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('to');
            $table->string('from');
            $table->string('subject');
            $table->integer('attempts');
            $table->boolean('decrypted');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE `messages` ADD `message` VARBINARY(16)');
        DB::statement('ALTER TABLE `messages` ADD `key` VARBINARY(16)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('messages');
    }
}
