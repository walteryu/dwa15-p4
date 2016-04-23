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
            $table->timestamps();

            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->string('city');
            $table->string('state', 2);

            $table->integer('zipcode');
            $table->float('latitude');
            $table->float('longitude');
            $table->boolean('active');

            $table->string('tracking_number');
            $table->string('cost_center');
            $table->string('project_phase');
            $table->string('wdid_number');
            $table->string('cgp_number');
            $table->integer('risk_level');

            $table->string('owner_company_name');
            $table->string('owner_company_description');
            $table->integer('owner_company_zipcode');
            $table->string('owner_company_address');
            $table->string('owner_company_city');
            $table->string('owner_company_state', 2);

            $table->string('owner_representative');
            $table->string('owner_title');
            $table->string('owner_phone');
            $table->string('owner_email');

            $table->string('contractor_company_name');
            $table->string('contractor_company_description');
            $table->integer('contractor_company_zipcode');
            $table->string('contractor_company_address');
            $table->string('contractor_company_city');
            $table->string('contractor_company_state', 2);

            $table->string('contractor_representative');
            $table->string('contractor_title');
            $table->string('contractor_phone');
            $table->string('contractor_email');

            $table->string('wpcm_company_name');
            $table->string('wpcm_company_description');
            $table->integer('wpcm_company_zipcode');
            $table->string('wpcm_company_address');
            $table->string('wpcm_company_city');
            $table->string('wpcm_company_state', 2);

            $table->string('wpcm_representative');
            $table->string('wpcm_title');
            $table->string('wpcm_phone');
            $table->string('wpcm_email');

            $table->string('qsp_company_name');
            $table->string('qsp_company_description');
            $table->integer('qsp_company_zipcode');
            $table->string('qsp_company_address');
            $table->string('qsp_company_city');
            $table->string('qsp_company_state', 2);

            $table->string('qsp_representative');
            $table->string('qsp_title');
            $table->string('qsp_phone');
            $table->string('qsp_email');
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
