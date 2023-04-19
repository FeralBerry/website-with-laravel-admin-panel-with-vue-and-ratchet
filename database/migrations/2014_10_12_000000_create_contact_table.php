<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('phone',20)->nullable();
            $table->string('email',100)->nullable();
            $table->string('second_email',100)->nullable();
            $table->string('whatsapp',20)->nullable();
            $table->string('telegram',20)->nullable();
            $table->string('vk',100)->nullable();
            $table->string('git',100)->nullable();
            $table->string('fb',100)->nullable();
            $table->string('instagram',100)->nullable();
            $table->string('twitter',100)->nullable();
            $table->string('youtube',100)->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
};
