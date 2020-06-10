<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('text');
            $table->unsignedBigInteger('personal_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->unsignedBigInteger('parent_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages',function (Blueprint $table){
        $table->dropForeign('messages_user_id_foreign');
        });
        Schema::dropIfExists('messages');
    }
}
