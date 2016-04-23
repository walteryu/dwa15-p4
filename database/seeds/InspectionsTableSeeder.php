<?php

use Illuminate\Database\Seeder;

class InspectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspections')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),

            'name' => 'Oakland Airport',
            'description' => 'Runway Renovation',
            'inspection_date' => Carbon\Carbon::today(),
            'inspection_location' => '1 Airport Dr',

            'inspector_name' => 'Jill Harvard',
            'inspector_title' => str_random(10),
            'inspector_phone' => str_random(10),
            'inspector_email' => str_random(10),

            'inspector_company_name' => str_random(10),
            'inspector_company_address' => str_random(10),
            'inspector_company_zipcode' => str_random(10),
            'inspector_company_state' => 'CA',
            'inspector_company_phone' => str_random(10),
            'inspector_company_email' => str_random(10),

            'standard_weekly' => true,
            'standard_biweekly' => true,
            'increased_weekly' => true,
            'reduced_monthly' => true,
            'reduced_rain' => true,
            'reduced_frozen' => true,

            'rain_trigger' => true,
            'rain_gauage' => true,
            'weather_station' => true,
            'station_description' => str_random(10),
            'rainfall_amount' => mt_rand(0,6),

            'unsafe_conditions' => true,
            'unsafe_description' => str_random(10),
            'unsafe_location' => str_random(10),

            'bmp_type_1' => str_random(10),
            'bmp_location_1' => str_random(10),
            'bmp_maintenance_1' => true,
            'bmp_action_required_1' => true,
            'bmp_action_date_1' => Carbon\Carbon::today(),
            'bmp_notes_1' => str_random(10),

            'bmp_type_2' => str_random(10),
            'bmp_location_2' => str_random(10),
            'bmp_maintenance_2' => true,
            'bmp_action_required_2' => true,
            'bmp_action_date_2' => Carbon\Carbon::today(),
            'bmp_notes_2' => str_random(10),

            'bmp_type_3' => str_random(10),
            'bmp_location_3' => str_random(10),
            'bmp_maintenance_3' => true,
            'bmp_action_required_3' => true,
            'bmp_action_date_3' => Carbon\Carbon::today(),
            'bmp_notes_3' => str_random(10),

            'bmp_type_4' => str_random(10),
            'bmp_location_4' => str_random(10),
            'bmp_maintenance_4' => true,
            'bmp_action_required_4' => true,
            'bmp_action_date_4' => Carbon\Carbon::today(),
            'bmp_notes_4' => str_random(10),

            'bmp_type_5' => str_random(10),
            'bmp_location_5' => str_random(10),
            'bmp_maintenance_5' => true,
            'bmp_action_required_5' => true,
            'bmp_action_date_5' => Carbon\Carbon::today(),
            'bmp_notes_5' => str_random(10),

            'bmp_type_6' => str_random(10),
            'bmp_location_6' => str_random(10),
            'bmp_maintenance_6' => true,
            'bmp_action_required_6' => true,
            'bmp_action_date_6' => Carbon\Carbon::today(),
            'bmp_notes_6' => str_random(10),

            'bmp_type_7' => str_random(10),
            'bmp_location_7' => str_random(10),
            'bmp_maintenance_7' => true,
            'bmp_action_required_7' => true,
            'bmp_action_date_7' => Carbon\Carbon::today(),
            'bmp_notes_7' => str_random(10),

            'bmp_type_8' => str_random(10),
            'bmp_location_8' => str_random(10),
            'bmp_maintenance_8' => true,
            'bmp_action_required_8' => true,
            'bmp_action_date_8' => Carbon\Carbon::today(),
            'bmp_notes_8' => str_random(10),

            'bmp_type_9' => str_random(10),
            'bmp_location_9' => str_random(10),
            'bmp_maintenance_9' => true,
            'bmp_action_required_9' => true,
            'bmp_action_date_9' => Carbon\Carbon::today(),
            'bmp_notes_9' => str_random(10),

            'bmp_type_10' => str_random(10),
            'bmp_location_10' => str_random(10),
            'bmp_maintenance_10' => true,
            'bmp_action_required_10' => true,
            'bmp_action_date_10' => Carbon\Carbon::today(),
            'bmp_notes_10' => str_random(10),

            'practice_type_1' => str_random(10),
            'practice_location_1' => str_random(10),
            'practice_maintenance_1' => true,
            'practice_action_required_1' => true,
            'practice_action_date_1' => Carbon\Carbon::today(),
            'practice_notes_1' => str_random(10),

            'practice_type_2' => str_random(10),
            'practice_location_2' => str_random(10),
            'practice_maintenance_2' => true,
            'practice_action_required_2' => true,
            'practice_action_date_2' => Carbon\Carbon::today(),
            'practice_notes_2' => str_random(10),

            'practice_type_3' => str_random(10),
            'practice_location_3' => str_random(10),
            'practice_maintenance_3' => true,
            'practice_action_required_3' => true,
            'practice_action_date_3' => Carbon\Carbon::today(),
            'practice_notes_3' => str_random(10),

            'practice_type_4' => str_random(10),
            'practice_location_4' => str_random(10),
            'practice_maintenance_4' => true,
            'practice_action_required_4' => true,
            'practice_action_date_4' => Carbon\Carbon::today(),
            'practice_notes_4' => str_random(10),

            'practice_type_5' => str_random(10),
            'practice_location_5' => str_random(10),
            'practice_maintenance_5' => true,
            'practice_action_required_5' => true,
            'practice_action_date_5' => Carbon\Carbon::today(),
            'practice_notes_5' => str_random(10),

            'practice_type_6' => str_random(10),
            'practice_location_6' => str_random(10),
            'practice_maintenance_6' => true,
            'practice_action_required_6' => true,
            'practice_action_date_6' => Carbon\Carbon::today(),
            'practice_notes_6' => str_random(10),

            'practice_type_7' => str_random(10),
            'practice_location_7' => str_random(10),
            'practice_maintenance_7' => true,
            'practice_action_required_7' => true,
            'practice_action_date_7' => Carbon\Carbon::today(),
            'practice_notes_7' => str_random(10),

            'practice_type_8' => str_random(10),
            'practice_location_8' => str_random(10),
            'practice_maintenance_8' => true,
            'practice_action_required_8' => true,
            'practice_action_date_8' => Carbon\Carbon::today(),
            'practice_notes_8' => str_random(10),

            'practice_type_9' => str_random(10),
            'practice_location_9' => str_random(10),
            'practice_maintenance_9' => true,
            'practice_action_required_9' => true,
            'practice_action_date_9' => Carbon\Carbon::today(),
            'practice_notes_9' => str_random(10),

            'practice_type_10' => str_random(10),
            'practice_location_10' => str_random(10),
            'practice_maintenance_10' => true,
            'practice_action_required_10' => true,
            'practice_action_date_10' => Carbon\Carbon::today(),
            'practice_notes_10' => str_random(10),

            'stabilization_area_1' => str_random(10),
            'stabilization_type_1' => str_random(10),
            'start_stabilization_1' => true,
            'stabilization_date_1' => Carbon\Carbon::today(),
            'stabilization_notes_1' => str_random(10),

            'stabilization_area_2' => str_random(10),
            'stabilization_type_2' => str_random(10),
            'start_stabilization_2' => true,
            'stabilization_date_2' => Carbon\Carbon::today(),
            'stabilization_notes_2' => str_random(10),

            'stabilization_area_3' => str_random(10),
            'stabilization_type_3' => str_random(10),
            'start_stabilization_3' => true,
            'stabilization_date_3' => Carbon\Carbon::today(),
            'stabilization_notes_3' => str_random(10),

            'stabilization_area_4' => str_random(10),
            'stabilization_type_4' => str_random(10),
            'start_stabilization_4' => true,
            'stabilization_date_4' => Carbon\Carbon::today(),
            'stabilization_notes_4' => str_random(10),

            'stabilization_area_5' => str_random(10),
            'stabilization_type_5' => str_random(10),
            'start_stabilization_5' => true,
            'stabilization_date_5' => Carbon\Carbon::today(),
            'stabilization_notes_5' => str_random(10),

            'discharge_confirmation' => str_random(10),

            'discharge_location_1' => str_random(10),
            'discharge_description_1' => str_random(10),
            'discharge_sediment_1' => true,
            'discharge_action_1' => str_random(10),

            'discharge_location_2' => str_random(10),
            'discharge_description_2' => str_random(10),
            'discharge_sediment_2' => true,
            'discharge_action_2' => str_random(10),
        ]);
    }
}
