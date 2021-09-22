<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signups', function (Blueprint $table) {       
                $table->bigIncrements('id');
                $table->string('sponsorname');
                $table->string('sponsor_fullname');
                $table->string('position');
                $table->integer('registration_type');
                $table->integer('product_id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('gender');
                $table->string('dob');
                $table->string('passport');
                $table->string('address1');
                $table->string('address2');
                $table->string('zipcode');
                $table->integer('country_id');
                $table->integer('state_id');
                $table->integer('city_id');
                $table->string('email')->unique();
                $table->string('landline_no')->unique();
                $table->string('mobile')->unique();       
                $table->string('user_name');
                $table->string('password');
                $table->boolean('free_account')->default(false);
                $table->rememberToken();
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
        Schema::dropIfExists('signups');
    }
}