<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,10) as $index)
        {
            DB::table('projects')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'user_id' => rand(1,3),

                'name' => 'Oakland Airport',
                'description' => 'Runway Renovation',
                'address' => '1 Airport Dr',
                'city' => 'Oakland',
                'state' => 'CA',
                'zipcode' => 94621,

                'latitude' => 37.7125689,
                'longitude' => -122.2197428,
                'active' => true,

                'tracking_number' => str_random(10),
                'cost_center' => str_random(10),
                'project_phase' => str_random(10),
                'wdid_number' => str_random(10),
                'cgp_number' => str_random(10),
                'risk_level' => 2,

                'owner_company_name' => str_random(10),
                'owner_company_description' => str_random(10),
                'owner_company_zipcode' => 94621,
                'owner_company_address' => str_random(10),
                'owner_company_city' => str_random(10),
                'owner_company_state' => 'CA',

                'owner_representative' => str_random(10),
                'owner_title' => str_random(10),
                'owner_phone' => str_random(10),
                'owner_email' => str_random(10),

                'contractor_company_name' => str_random(10),
                'contractor_company_description' => str_random(10),
                'contractor_company_zipcode' => 94621,
                'contractor_company_address' => str_random(10),
                'contractor_company_city' => str_random(10),
                'contractor_company_state' => 'CA',

                'contractor_representative' => str_random(10),
                'contractor_title' => str_random(10),
                'contractor_phone' => str_random(10),
                'contractor_email' => str_random(10),

                'wpcm_company_name' => str_random(10),
                'wpcm_company_description' => str_random(10),
                'wpcm_company_zipcode' => 94621,
                'wpcm_company_address' => str_random(10),
                'wpcm_company_city' => str_random(10),
                'wpcm_company_state' => 'CA',

                'wpcm_representative' => str_random(10),
                'wpcm_title' => str_random(10),
                'wpcm_phone' => str_random(10),
                'wpcm_email' => str_random(10),

                'qsp_company_name' => str_random(10),
                'qsp_company_description' => str_random(10),
                'qsp_company_zipcode' => 94621,
                'qsp_company_address' => str_random(10),
                'qsp_company_city' => str_random(10),
                'qsp_company_state' => 'CA',

                'qsp_representative' => str_random(10),
                'qsp_title' => str_random(10),
                'qsp_phone' => str_random(10),
                'qsp_email' => str_random(10),
            ]);
        }
    }
}
