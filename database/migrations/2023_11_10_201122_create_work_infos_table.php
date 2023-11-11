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
        Schema::create('work_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('employment_status')->nullable();
            $table->string('primary_role')->nullable();
            $table->json('secondary_role')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('prefered_salary')->nullable();
            $table->json('prefered_work')->nullable();
            $table->boolean('relocation')->default(0);
            $table->string('notice_period')->default(0);
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
        Schema::dropIfExists('work_infos');
    }
};
