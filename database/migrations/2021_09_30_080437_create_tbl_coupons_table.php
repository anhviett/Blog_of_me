<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_name');
            $table->text('coupon_code');
            $table->integer('coupon_number');
            $table->integer('coupon_count');
            $table->integer('coupon_condition');
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
        Schema::dropIfExists('tbl_coupons');
    }
}
