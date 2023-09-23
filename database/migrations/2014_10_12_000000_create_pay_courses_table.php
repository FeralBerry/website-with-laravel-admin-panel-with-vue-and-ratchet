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
        Schema::create('pay_courses', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable();
            $table->integer('pay_courses_name_id')->nullable();
            $table->text('description')->nullable();
            $table->string('link',255)->nullable();
            $table->text('youtube')->nullable();
            $table->integer('type')->default(0);
            $table->text('task')->nullable();
            $table->text('example')->nullable();
            $table->text('material')->nullable();
            $table->text('last_lesson')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    public function down()
    {
        Schema::dropIfExists('pay_courses');
    }
};
