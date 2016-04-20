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
        DB::table('books')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),

            'name' => 'Oakland Airport',
            'description' => 'Runway Renovation',
            'address' => '1 Airport Dr',
            'city' => 'Oakland',
            'state', 2 => 'CA',

            'zipcode' => 94612,
            'lat' => '',
            'long' => '',
            'active' => '',

            'tracking_number' => '',
            'cost_center' => '',
            'project_phase' => '',
            'wdid_number' => '',
            'cgp_number' => '',
            'risk_level' => '',

            'owner_company_name' => '',
            'owner_company_description' => '',
            'owner_company_zipcode' => '',
            'owner_company_address' => '',
            'owner_company_city' => '',
            'owner_company_state', 2 => '',

            'owner_representative' => '',
            'owner_title' => '',
            'owner_phone' => '',
            'owner_email' => '',

            'contractor_company_name' => '',
            'contractor_company_description' => '',
            'contractor_company_zipcode' => '',
            'contractor_company_address' => '',
            'contractor_company_city' => '',
            'contractor_company_state', 2 => '',

            'contractor_representative' => '',
            'contractor_title' => '',
            'contractor_phone' => '',
            'contractor_email' => '',

            'wpcm_company_name' => '',
            'wpcm_company_description' => '',
            'wpcm_company_zipcode' => '',
            'wpcm_company_address' => '',
            'wpcm_company_city' => '',
            'wpcm_company_state', 2 => '',

            'wpcm_representative' => '',
            'wpcm_title' => '',
            'wpcm_phone' => '',
            'wpcm_email' => '',

            'qsp_company_name' => '',
            'qsp_company_description' => '',
            'qsp_company_zipcode' => '',
            'qsp_company_address' => '',
            'qsp_company_city' => '',
            'qsp_company_state', 2 => '',

            'qsp_representative' => '',
            'qsp_title' => '',
            'qsp_phone' => '',
            'qsp_email' => '',
        ]);
    }
}
