<?php

namespace StormSafe\Http\Controllers;

use Illuminate\Http\Request;
use StormSafe\Http\Requests;

class InspectionController extends Controller
{
    function getIndex() {
        $inspections = \DB::table('inspections')
            ->orderBy('created_at', '=', 'ASC')
            ->get();

        if(is_null($inspections)) {
            \Session::flash(
                'message','No inspections for project, please add them.'
            );
            return redirect('/projects');
        }

        return view('inspections.index')->with('inspections', $inspections);
    }

    public function getShow($id) {
        $inspection = \DB::table('inspections')->where('id', '=', $id)->get();

        if(is_null($inspection)) {
            \Session::flash(
                'message','Inspection not found, please try again.'
            );
            return redirect('/projects');
        }

        return view('inspections.show')->with('inspection',$inspection);
    }

    public function getCreate() {
        $projects = \DB::table('projects')
            ->where('user_id', '=', \Auth::user()->id)
            ->orderBy('name','ASC')
            ->get();

        if(is_null($projects)) {
            \Session::flash(
                'message','No projects not found, please try again.'
            );
            return redirect('/projects');
        }

        $projects_menu = [];
        $projects_menu[0] = 'Please Select Project';

        foreach($projects as $project) {
            $projects_menu[$project->id] = $project->name.' - '.$project->description;
        }

        return view('inspections.create')->with([
            'projects_menu' => $projects_menu
        ]);
    }

    public function postCreate(Request $request) {
        $messages = [
            'not_in' => 'Please select project for your inspection.',
        ];

        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'project_id' => 'not_in:0'
        ], $messages);

        $data = $request->only(
            'project_id',
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
            'discharge_action_2'
        );
        $data = array_values($data);

        \DB::table('inspections')->insertGetId([
              'project_id' => $data[0],
              'name' => $data[1],
              'description' => $data[2],

              # Update index values, leave extra ID at the end?
              # 'inspection_date',
              # 'inspection_location',

              'inspector_name' => $data[3],
              'inspector_title' => $data[4],
              'inspector_phone' => $data[5],
              'inspector_email' => $data[6],
              'inspector_company_name' => $data[7],
              'inspector_company_address' => $data[8],
              'inspector_company_zipcode' => $data[9],
              'inspector_company_state' => $data[0],
              'inspector_company_phone' => $data[9],
              'inspector_company_email' => $data[10],
              'standard_weekly' => $data[11],
              'standard_biweekly' => $data[12],
              'increased_weekly' => $data[13],
              'reduced_monthly' => $data[14],
              'reduced_rain' => $data[15],
              'reduced_frozen' => $data[16],
              'rain_trigger' => $data[17],
              'rain_gauage' => $data[18],
              'weather_station' => $data[19],
              'station_description' => $data[20],
              'rainfall_amount' => $data[21],
              'unsafe_conditions' => $data[22],
              'unsafe_description' => $data[23],
              'unsafe_location' => $data[24],
              'bmp_type_1' => $data[25],
              'bmp_location_1' => $data[26],
              'bmp_maintenance_1' => $data[27],
              'bmp_action_required_1' => $data[28],
              'bmp_action_date_1' => $data[29],
              'bmp_notes_1' => $data[30],
              'bmp_type_2' => $data[31],
              'bmp_location_2' => $data[32],
              'bmp_maintenance_2' => $data[33],
              'bmp_action_required_2' => $data[34],
              'bmp_action_date_2' => $data[35],
              'bmp_notes_2' => $data[36],
              'bmp_type_3' => $data[37],
              'bmp_location_3' => $data[38],
              'bmp_maintenance_3' => $data[39],
              'bmp_action_required_3' => $data[40],
              'bmp_action_date_3' => $data[41],
              'bmp_notes_3' => $data[42],
              'bmp_type_4' => $data[43],
              'bmp_location_4' => $data[44],
              'bmp_maintenance_4' => $data[45],
              'bmp_action_required_4' => $data[46],
              'bmp_action_date_4' => $data[47],
              'bmp_notes_4' => $data[48],
              'bmp_type_5' => $data[49],
              'bmp_location_5' => $data[50],
              'bmp_maintenance_5' => $data[51],
              'bmp_action_required_5' => $data[52],
              'bmp_action_date_5' => $data[53],
              'bmp_notes_5' => $data[54],
              'bmp_type_6' => $data[55],
              'bmp_location_6' => $data[56],
              'bmp_maintenance_6' => $data[57],
              'bmp_action_required_6' => $data[58],
              'bmp_action_date_6' => $data[59],
              'bmp_notes_6' => $data[60],
              'bmp_type_7' => $data[61],
              'bmp_location_7' => $data[62],
              'bmp_maintenance_7' => $data[63],
              'bmp_action_required_7' => $data[64],
              'bmp_action_date_7' => $data[65],
              'bmp_notes_7' => $data[66],
              'bmp_type_8' => $data[67],
              'bmp_location_8' => $data[68],
              'bmp_maintenance_8' => $data[69],
              'bmp_action_required_8' => $data[70],
              'bmp_action_date_8' => $data[71],
              'bmp_notes_8' => $data[72],
              'bmp_type_9' => $data[73],
              'bmp_location_9' => $data[74],
              'bmp_maintenance_9' => $data[75],
              'bmp_action_required_9' => $data[76],
              'bmp_action_date_9' => $data[77],
              'bmp_notes_9' => $data[78],
              'bmp_type_10' => $data[79],
              'bmp_location_10' => $data[80],
              'bmp_maintenance_10' => $data[81],
              'bmp_action_required_10' => $data[82],
              'bmp_action_date_10' => $data[83],
              'bmp_notes_10' => $data[84],
              'practice_type_1' => $data[85],
              'practice_location_1' => $data[86],
              'practice_maintenance_1' => $data[87],
              'practice_action_required_1' => $data[88],
              'practice_action_date_1' => $data[89],
              'practice_notes_1' => $data[90],
              'practice_type_2' => $data[91],
              'practice_location_2' => $data[92],
              'practice_maintenance_2' => $data[93],
              'practice_action_required_2' => $data[94],
              'practice_action_date_2' => $data[95],
              'practice_notes_2' => $data[96],
              'practice_type_3' => $data[97],
              'practice_location_3' => $data[98],
              'practice_maintenance_3' => $data[99],
              'practice_action_required_3' => $data[100],
              'practice_action_date_3' => $data[101],
              'practice_notes_3' => $data[102],
              'practice_type_4' => $data[103],
              'practice_location_4' => $data[104],
              'practice_maintenance_4' => $data[105],
              'practice_action_required_4' => $data[106],
              'practice_action_date_4' => $data[107],
              'practice_notes_4' => $data[108],
              'practice_type_5' => $data[109],
              'practice_location_5' => $data[110],
              'practice_maintenance_5' => $data[111],
              'practice_action_required_5' => $data[112],
              'practice_action_date_5' => $data[113],
              'practice_notes_5' => $data[114],
              'practice_type_6' => $data[115],
              'practice_location_6' => $data[116],
              'practice_maintenance_6' => $data[117],
              'practice_action_required_6' => $data[118],
              'practice_action_date_6' => $data[119],
              'practice_notes_6' => $data[120],
              'practice_type_7' => $data[121],
              'practice_location_7' => $data[122],
              'practice_maintenance_7' => $data[123],
              'practice_action_required_7' => $data[124],
              'practice_action_date_7' => $data[125],
              'practice_notes_7' => $data[126],
              'practice_type_8' => $data[127],
              'practice_location_8' => $data[128],
              'practice_maintenance_8' => $data[129],
              'practice_action_required_8' => $data[130],
              'practice_action_date_8' => $data[131],
              'practice_notes_8' => $data[132],
              'practice_type_9' => $data[133],
              'practice_location_9' => $data[134],
              'practice_maintenance_9' => $data[135],
              'practice_action_required_9' => $data[136],
              'practice_action_date_9' => $data[137],
              'practice_notes_9' => $data[138],
              'practice_type_10' => $data[139],
              'practice_location_10' => $data[140],
              'practice_maintenance_10' => $data[141],
              'practice_action_required_10' => $data[142],
              'practice_action_date_10' => $data[143],
              'practice_notes_10' => $data[144],
              'stabilization_area_1' => $data[145],
              'stabilization_type_1' => $data[146],
              'start_stabilization_1' => $data[147],
              'stabilization_date_1' => $data[148],
              'stabilization_notes_1' => $data[149],
              'stabilization_area_2' => $data[150],
              'stabilization_type_2' => $data[151],
              'start_stabilization_2' => $data[152],
              'stabilization_date_2' => $data[153],
              'stabilization_notes_2' => $data[154],
              'stabilization_area_3' => $data[155],
              'stabilization_type_3' => $data[156],
              'start_stabilization_3' => $data[157],
              'stabilization_date_3' => $data[158],
              'stabilization_notes_3' => $data[159],
              'stabilization_area_4' => $data[160],
              'stabilization_type_4' => $data[161],
              'start_stabilization_4' => $data[162],
              'stabilization_date_4' => $data[163],
              'stabilization_notes_4' => $data[164],
              'stabilization_area_5' => $data[165],
              'stabilization_type_5' => $data[166],
              'start_stabilization_5' => $data[167],
              'stabilization_date_5' => $data[168],
              'stabilization_notes_5' => $data[169],
              'discharge_confirmation' => $data[170],
              'discharge_location_1' => $data[171],
              'discharge_description_1' => $data[172],
              'discharge_sediment_1' => $data[173],
              'discharge_action_1' => $data[174],
              'discharge_location_2' => $data[175],
              'discharge_description_2' => $data[176],
              'discharge_sediment_2' => $data[177],
              'discharge_action_2' => $data[178]
        ]);

        \Session::flash('message','Inspection created successfully!');
        return redirect('/inspections');
    }

    public function getEdit($id) {
        $inspection = \DB::table('inspections')->where('id', '=', $id)->get();

        if(is_null($inspection)) {
            \Session::flash('message','Inspection not found, please try again');
            return redirect('/inspections');
        }

        return view('inspections.edit')->with('inspection',$inspection);
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);

        $data = $request->only(
            'project_id',
            'id',
            'name',
            'description'
        );
        $data = array_values($data);

        \DB::table('inspections')->where('id', '=', $data[1])->update([
            'project_id' => $data[0],
            'name' => $data[2],
            'description' => $data[3],
        ]);

        \Session::flash('message','Inspection updated successfully!');
        return redirect('/inspections');
    }

    public function getDelete($id) {
        $inspection = \DB::table('inspections')->where('id', '=', $id)->get();

        if(is_null($inspection)) {
            \Session::flash('flash_message','Inspection not found, please try again.');
            return redirect('/inspections');
        }

        return view('inspections.delete')->with('inspection', $inspection);
    }

    public function postDelete(Request $request) {
        $data = $request->only(
            'user_id',
            'id',
            'name',
            'description',
            'address',
            'city',
            'state',
            'zipcode'
        );
        $data = array_values($data);

        \DB::table('inspections')->where('id', $data[1])->delete();

        \Session::flash('flash_message','Inspection was deleted!');
        return redirect('/inspections');
    }

    # Inspection search form
    public function getSearch() {
        return view('inspections.search');
    }

    # Inspection search form
    public function postSearch(Request $request) {
        $data = $request->input();
        $data = array_values($data);

        $inspections = \DB::table('inspections')
            # ->where('title','LIKE','%'.$request->search.'%')->get();
            ->where('name','LIKE','%'.$data[1].'%')
            ->orWhere('description','LIKE','%'.$data[1].'%')
            ->get();

        return view('inspections.search-ajax')->with(
            ['inspections' => $inspections]
        );
    }
}
