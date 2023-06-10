<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactLandingPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_landing_pages', function (Blueprint $table) {
            $table->id();

            $table->string('title_contact');
            $table->string('description_contact');
            $table->string('image_contact')->nullable();
            $table->string('slug_contact');

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
        Schema::dropIfExists('contact_landing_pages');
    }
}
