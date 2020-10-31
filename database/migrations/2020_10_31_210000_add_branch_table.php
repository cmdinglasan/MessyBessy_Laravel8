<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch_name');
            $table->string('branch_street');
            $table->string('branch_city');
            $table->string('branch_state');
            $table->integer('branch_post_code');
            $table->string('branch_country');
            $table->string('branch_contact_number');
            $table->string('branch_operating_hours');
            $table->string('branch_other_info')->nullable();
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
        Schema::dropIfExists('branches');
    }
}
