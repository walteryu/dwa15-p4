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
            $table->string('zipcode'); // verify whether string or int
            $table->string('address');
            $table->string('city');
            $table->string('state');

            $table->string('costcode'); // better name for EA, etc.?
            $table->string('wdid_number'); // verify whether string or int
            $table->string('risk_level'); // verify whether string or int

            $table->string('owner_name');
            $table->string('owner_description');
            $table->string('owner_zipcode'); // verify whether string or int
            $table->string('owner_address');
            $table->string('owner_city');
            $table->string('owner_state');

            $table->string('owner_representative');
            $table->string('owner_phone');
            $table->string('owner_email');

            $table->string('contractor_name');
            $table->string('contractor_description');
            $table->string('contractor_zipcode'); // verify whether string or int
            $table->string('contractor_address');
            $table->string('contractor_city');
            $table->string('contractor_state');

            $table->string('contractor_representative');
            $table->string('contractor_phone');
            $table->string('contractor_email');

            $table->string('wpcm_name');
            $table->string('wpcm_description');
            $table->string('wpcm_zipcode'); // verify whether string or int
            $table->string('wpcm_address');
            $table->string('wpcm_city');
            $table->string('wpcm_state');

            $table->string('wpcm_representative');
            $table->string('wpcm_phone');
            $table->string('wpcm_email');

            $table->string('qsp_name');
            $table->string('qsp_description');
            $table->string('qsp_zipcode'); // verify whether string or int
            $table->string('qsp_address');
            $table->string('qsp_city');
            $table->string('qsp_state');

            $table->string('qsp_representative');
            $table->string('qsp_phone');
            $table->string('qsp_email');

            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->string('');
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
