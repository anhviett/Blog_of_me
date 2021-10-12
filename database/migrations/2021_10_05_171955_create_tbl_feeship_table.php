<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFeeshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_feeship', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('code_city');
            $table->bigInteger('code_district')->nullable();
            $table->bigInteger('code_wards')->nullable();
            $table->string('shipping_fee')->nullable();
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
        Schema::dropIfExists('tbl_feeship');
    }
}
