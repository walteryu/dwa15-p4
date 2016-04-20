<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->increments('id');

            # https://laravel.com/docs/5.2/migrations
            $table->string('name');
            $table->string('description');
            $table->string('address');
            $table->string('submitted_by');
            $table->string('inspected_by');

            $table->date('inspection_date');
            $table->text('inspection_location');

            $table->string('inspector_name');
            $table->string('inspector_title');
            $table->string('inspector_phone');
            $table->string('inspector_email');
            $table->string('inspector_company_name');
            $table->string('inspector_company_address');
            $table->string('inspector_company_state');
            $table->integer('inspector_company_zipcode');

            // limit state names to abbreviation
            $table->string('inspector_company_state', 2);

            $table->string('inspector_company_phone');
            $table->string('inspector_company_email');

            $table->boolean('standard_weekly');
            $table->boolean('standard_biweekly');
            $table->boolean('increased_weekly');
            $table->boolean('reduced_monthly');
            $table->boolean('reduced_rain');
            $table->boolean('reduced_frozen');

            $table->boolean('rain_trigger');
            $table->boolean('rain_gauage');
            $table->boolean('weather_station');
            $table->string('station_description');
            $table->float('rainfall_amount');

            $table->boolean('unsafe_conditions');
            $table->text('unsafe_description');
            $table->text('unsafe_location');

            $table->string('bmp_type_1');
            $table->string('bmp_location_1');
            $table->boolean('bmp_maintenance_1');
            $table->boolean('bmp_action_required_1');
            $table->boolean('bmp_action_date_1');
            $table->text('bmp_notes_1');

            $table->string('bmp_type_2');
            $table->string('bmp_location_2');
            $table->boolean('bmp_maintenance_2');
            $table->boolean('bmp_action_required_2');
            $table->boolean('bmp_action_date_2');
            $table->text('bmp_notes_2');

            $table->string('bmp_type_3');
            $table->string('bmp_location_3');
            $table->boolean('bmp_maintenance_3');
            $table->boolean('bmp_action_required_3');
            $table->boolean('bmp_action_date_3');
            $table->text('bmp_notes_3');

            $table->string('bmp_type_4');
            $table->string('bmp_location_4');
            $table->boolean('bmp_maintenance_4');
            $table->boolean('bmp_action_required_4');
            $table->boolean('bmp_action_date_4');
            $table->text('bmp_notes_4');

            $table->string('bmp_type_5');
            $table->string('bmp_location_5');
            $table->boolean('bmp_maintenance_5');
            $table->boolean('bmp_action_required_5');
            $table->boolean('bmp_action_date_5');
            $table->text('bmp_notes_5');

            $table->string('bmp_type_6');
            $table->string('bmp_location_6');
            $table->boolean('bmp_maintenance_6');
            $table->boolean('bmp_action_required_6');
            $table->boolean('bmp_action_date_6');
            $table->text('bmp_notes_6');

            $table->string('bmp_type_7');
            $table->string('bmp_location_7');
            $table->boolean('bmp_maintenance_7');
            $table->boolean('bmp_action_required_7');
            $table->boolean('bmp_action_date_7');
            $table->text('bmp_notes_7');

            $table->string('bmp_type_8');
            $table->string('bmp_location_8');
            $table->boolean('bmp_maintenance_8');
            $table->boolean('bmp_action_required_8');
            $table->boolean('bmp_action_date_8');
            $table->text('bmp_notes_8');

            $table->string('bmp_type_9');
            $table->string('bmp_location_9');
            $table->boolean('bmp_maintenance_9');
            $table->boolean('bmp_action_required_9');
            $table->boolean('bmp_action_date_9');
            $table->text('bmp_notes_9');

            $table->string('bmp_type_10');
            $table->string('bmp_location_10');
            $table->boolean('bmp_maintenance_10');
            $table->boolean('bmp_action_required_10');
            $table->boolean('bmp_action_date_10');
            $table->text('bmp_notes_10');

            $table->string('practice_type_1');
            $table->string('practice_location_1');
            $table->boolean('practice_maintenance_1');
            $table->boolean('practice_action_required_1');
            $table->boolean('practice_action_date_1');
            $table->text('practice_notes_1');

            $table->string('practice_type_2');
            $table->string('practice_location_2');
            $table->boolean('practice_maintenance_2');
            $table->boolean('practice_action_required_2');
            $table->boolean('practice_action_date_2');
            $table->text('practice_notes_2');

            $table->string('practice_type_3');
            $table->string('practice_location_3');
            $table->boolean('practice_maintenance_3');
            $table->boolean('practice_action_required_3');
            $table->boolean('practice_action_date_3');
            $table->text('practice_notes_3');

            $table->string('practice_type_4');
            $table->string('practice_location_4');
            $table->boolean('practice_maintenance_4');
            $table->boolean('practice_action_required_4');
            $table->boolean('practice_action_date_4');
            $table->text('practice_notes_4');

            $table->string('practice_type_5');
            $table->string('practice_location_5');
            $table->boolean('practice_maintenance_5');
            $table->boolean('practice_action_required_5');
            $table->boolean('practice_action_date_5');
            $table->text('practice_notes_5');

            $table->string('practice_type_6');
            $table->string('practice_location_6');
            $table->boolean('practice_maintenance_6');
            $table->boolean('practice_action_required_6');
            $table->boolean('practice_action_date_6');
            $table->text('practice_notes_6');

            $table->string('practice_type_7');
            $table->string('practice_location_7');
            $table->boolean('practice_maintenance_7');
            $table->boolean('practice_action_required_7');
            $table->boolean('practice_action_date_7');
            $table->text('practice_notes_7');

            $table->string('practice_type_8');
            $table->string('practice_location_8');
            $table->boolean('practice_maintenance_8');
            $table->boolean('practice_action_required_8');
            $table->boolean('practice_action_date_8');
            $table->text('practice_notes_8');

            $table->string('practice_type_9');
            $table->string('practice_location_9');
            $table->boolean('practice_maintenance_9');
            $table->boolean('practice_action_required_9');
            $table->boolean('practice_action_date_9');
            $table->text('practice_notes_9');

            $table->string('practice_type_10');
            $table->string('practice_location_10');
            $table->boolean('practice_maintenance_10');
            $table->boolean('practice_action_required_10');
            $table->boolean('practice_action_date_10');
            $table->text('practice_notes_10');

            $table->string('stabilization_area_1');
            $table->string('stabilization_type_1');
            $table->boolean('start_stabilization_1');
            $table->date('stabilization_date_1');
            $table->text('stabilization_notes_1');

            $table->string('stabilization_area_2');
            $table->string('stabilization_type_2');
            $table->boolean('start_stabilization_2');
            $table->date('stabilization_date_2');
            $table->text('stabilization_notes_2');

            $table->string('stabilization_area_3');
            $table->string('stabilization_type_3');
            $table->boolean('start_stabilization_3');
            $table->date('stabilization_date_3');
            $table->text('stabilization_notes_3');

            $table->string('stabilization_area_4');
            $table->string('stabilization_type_4');
            $table->boolean('start_stabilization_4');
            $table->date('stabilization_date_4');
            $table->text('stabilization_notes_4');

            $table->string('stabilization_area_5');
            $table->string('stabilization_type_5');
            $table->boolean('start_stabilization_5');
            $table->date('stabilization_date_5');
            $table->text('stabilization_notes_5');

            $table->boolean ('discharge_confirmation');

            $table->string('discharge_location_1');
            $table->text('discharge_description_1');
            $table->boolean('discharge_sediment_1');
            $table->string('discharge_action_1');

            $table->string('discharge_location_2');
            $table->text('discharge_description_2');
            $table->boolean('discharge_sediment_2');
            $table->string('discharge_action_2');

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
        Schema::drop('inspections');
    }
}
