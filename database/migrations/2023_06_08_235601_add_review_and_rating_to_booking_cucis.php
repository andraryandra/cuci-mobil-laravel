<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReviewAndRatingToBookingCucis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_cucis', function (Blueprint $table) {
            $table->text('ulasan')->nullable();
            $table->integer('rating')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_cucis', function (Blueprint $table) {
            $table->dropColumn('ulasan');
            $table->dropColumn('rating');
        });
    }
}
