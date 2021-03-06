<?php

namespace StormSafe;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    protected $fillable = [
        'name',
        'description',
        'inspection_date',
        'inspection_location',

        'inspector_name',
        'inspector_title',
        'inspector_phone',
        'inspector_email',

        'inspector_company_name',
        'inspector_company_address',
        'inspector_company_zipcode',
        'inspector_company_state',
        'inspector_company_phone',
        'inspector_company_email',

        'standard_weekly',
        'standard_biweekly',
        'increased_weekly',
        'reduced_monthly',
        'reduced_rain',
        'reduced_frozen',

        'rain_trigger',
        'rain_gauage',
        'weather_station',
        'station_description',
        'rainfall_amount',

        'unsafe_conditions',
        'unsafe_description',
        'unsafe_location',

        'bmp_type_1',
        'bmp_location_1',
        'bmp_maintenance_1',
        'bmp_action_required_1',
        'bmp_action_date_1',
        'bmp_notes_1',

        'bmp_type_2',
        'bmp_location_2',
        'bmp_maintenance_2',
        'bmp_action_required_2',
        'bmp_action_date_2',
        'bmp_notes_2',

        'bmp_type_3',
        'bmp_location_3',
        'bmp_maintenance_3',
        'bmp_action_required_3',
        'bmp_action_date_3',
        'bmp_notes_3',

        'bmp_type_4',
        'bmp_location_4',
        'bmp_maintenance_4',
        'bmp_action_required_4',
        'bmp_action_date_4',
        'bmp_notes_4',

        'bmp_type_5',
        'bmp_location_5',
        'bmp_maintenance_5',
        'bmp_action_required_5',
        'bmp_action_date_5',
        'bmp_notes_5',

        'bmp_type_6',
        'bmp_location_6',
        'bmp_maintenance_6',
        'bmp_action_required_6',
        'bmp_action_date_6',
        'bmp_notes_6',

        'bmp_type_7',
        'bmp_location_7',
        'bmp_maintenance_7',
        'bmp_action_required_7',
        'bmp_action_date_7',
        'bmp_notes_7',

        'bmp_type_8',
        'bmp_location_8',
        'bmp_maintenance_8',
        'bmp_action_required_8',
        'bmp_action_date_8',
        'bmp_notes_8',

        'bmp_type_9',
        'bmp_location_9',
        'bmp_maintenance_9',
        'bmp_action_required_9',
        'bmp_action_date_9',
        'bmp_notes_9',

        'bmp_type_10',
        'bmp_location_10',
        'bmp_maintenance_10',
        'bmp_action_required_10',
        'bmp_action_date_10',
        'bmp_notes_10',

        'practice_type_1',
        'practice_location_1',
        'practice_maintenance_1',
        'practice_action_required_1',
        'practice_action_date_1',
        'practice_notes_1',

        'practice_type_2',
        'practice_location_2',
        'practice_maintenance_2',
        'practice_action_required_2',
        'practice_action_date_2',
        'practice_notes_2',

        'practice_type_3',
        'practice_location_3',
        'practice_maintenance_3',
        'practice_action_required_3',
        'practice_action_date_3',
        'practice_notes_3',

        'practice_type_4',
        'practice_location_4',
        'practice_maintenance_4',
        'practice_action_required_4',
        'practice_action_date_4',
        'practice_notes_4',

        'practice_type_5',
        'practice_location_5',
        'practice_maintenance_5',
        'practice_action_required_5',
        'practice_action_date_5',
        'practice_notes_5',

        'practice_type_6',
        'practice_location_6',
        'practice_maintenance_6',
        'practice_action_required_6',
        'practice_action_date_6',
        'practice_notes_6',

        'practice_type_7',
        'practice_location_7',
        'practice_maintenance_7',
        'practice_action_required_7',
        'practice_action_date_7',
        'practice_notes_7',

        'practice_type_8',
        'practice_location_8',
        'practice_maintenance_8',
        'practice_action_required_8',
        'practice_action_date_8',
        'practice_notes_8',

        'practice_type_9',
        'practice_location_9',
        'practice_maintenance_9',
        'practice_action_required_9',
        'practice_action_date_9',
        'practice_notes_9',

        'practice_type_10',
        'practice_location_10',
        'practice_maintenance_10',
        'practice_action_required_10',
        'practice_action_date_10',
        'practice_notes_10',

        'stabilization_area_1',
        'stabilization_type_1',
        'start_stabilization_1',
        'stabilization_date_1',
        'stabilization_notes_1',

        'stabilization_area_2',
        'stabilization_type_2',
        'start_stabilization_2',
        'stabilization_date_2',
        'stabilization_notes_2',

        'stabilization_area_3',
        'stabilization_type_3',
        'start_stabilization_3',
        'stabilization_date_3',
        'stabilization_notes_3',

        'stabilization_area_4',
        'stabilization_type_4',
        'start_stabilization_4',
        'stabilization_date_4',
        'stabilization_notes_4',

        'stabilization_area_5',
        'stabilization_type_5',
        'start_stabilization_5',
        'stabilization_date_5',
        'stabilization_notes_5',

        'discharge_confirmation',

        'discharge_location_1',
        'discharge_description_1',
        'discharge_sediment_1',
        'discharge_action_1',

        'discharge_location_2',
        'discharge_description_2',
        'discharge_sediment_2',
        'discharge_action_2',
    ];

    public function project() {
        return $this->belongsTo('\App\Project');
    }

    /*
    public static function getProjectsMenu($id) {
        # $authors = \App\Author::orderBy('last_name','ASC')->get();
        $projects = \DB::table('projects')
            ->orderBy('name', 'ASC')
            ->get();

        $projects_menu = [];
        $projects_menu[0] = 'Please Select Project';

        foreach($projects as $project) {
            $projects_menu[$project->id] = $project->name.', '.$project->description;
        }

        return $projects_menu;
    }
    */
}
