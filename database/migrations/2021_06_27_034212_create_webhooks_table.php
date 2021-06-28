<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebhooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webhooks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('resource') ->nullable();
            $table->integer('user_id') ->nullable();
            $table->string('topic') ->nullable();
            $table->bigInteger('application_id') ->nullable();
            $table->unsignedSmallInteger('attempts') ->nullable();
            $table->string('sent') ->nullable();
            $table->string('received') ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webhooks');
    }
}
