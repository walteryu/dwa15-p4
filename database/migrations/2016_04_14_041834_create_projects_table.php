<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->string('city');
            $table->string('state', 2); // limit state names to abbreviation

            $table->integer('zipcode');
            $table->float('lat');
            $table->float('long');
            $table->boolean('active');

            $table->string('cost_code');
            $table->string('wdid_number');
            $table->integer('risk_level');

            $table->string('owner_name');
            $table->string('owner_description');
            $table->integer('owner_zipcode');
            $table->string('owner_address');
            $table->string('owner_city');
            $table->string('owner_state', 2); // limit state names to abbreviation

            $table->string('owner_representative');
            $table->string('owner_phone');
            $table->string('owner_email');

            $table->string('contractor_name');
            $table->string('contractor_description');
            $table->integer('contractor_zipcode');
            $table->string('contractor_address');
            $table->string('contractor_city');
            $table->string('contractor_state', 2); // limit state names to abbreviation

            $table->string('contractor_representative');
            $table->string('contractor_phone');
            $table->string('contractor_email');

            $table->string('wpcm_name');
            $table->string('wpcm_description');
            $table->integer('wpcm_zipcode');
            $table->string('wpcm_address');
            $table->string('wpcm_city');
            $table->string('wpcm_state', 2); // limit state names to abbreviation

            $table->string('wpcm_representative');
            $table->string('wpcm_phone');
            $table->string('wpcm_email');

            $table->string('qsp_name');
            $table->string('qsp_description');
            $table->integer('qsp_zipcode');
            $table->string('qsp_address');
            $table->string('qsp_city');
            $table->string('qsp_state', 2); // limit state names to abbreviation

            $table->string('qsp_representative');
            $table->string('qsp_phone');
            $table->string('qsp_email');

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
        Schema::drop('projects');
    }
}
