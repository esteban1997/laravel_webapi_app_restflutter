<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('behaviorals', function (Blueprint $table) {
            $table->bigInteger('behavioral_id')->unsigned;
            $table->string('behavioral_type');
            $table->enum('behavioral_model', ['url', 'resource','content']);
            $table->text('content1');
            $table->text('content2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('behaviorals');
    }
};
