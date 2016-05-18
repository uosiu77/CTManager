<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seamen', function (Blueprint $table) {
            $table->increments('seaman_id');
            $table->string('surname');
            $table->string('forename');
            $table->integer('pesel')->unique();
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->integer('rank_id');
            $table->integer('nationality_id');
            $table->integer('user_id')->nullable();
			$table->string('bank_account')->unique();
            $table->string('bank_name');
            $table->string('bank_swift');
			$table->string('postal_code');
            $table->string('city');
            $table->string('street');
            $table->integer('country_id');
            $table->string('email')->unique();
            $table->string('skype')->unique();
            $table->string('phone')->unique();
            $table->string('phone_2')->nullable();
            $table->string('mothers_forename');
            $table->string('mothers_surname');
            $table->string('mothers_maiden');
            $table->string('fathers_forename');
            $table->string('fathers_surname');
            $table->text('nearest_airport')->nullable();
            $table->enum('post_type', array('actual', 'revision'));
            $table->boolean('giodo');
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
        Schema::drop('seamen');
    }
}
