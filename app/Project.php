<?php

namespace StormSafe;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'address',
        'city',
        'state',

        'zipcode',
        'latitude',
        'longitude',
        'active',

        'tracking_number',
        'cost_center',
        'project_phase',
        'wdid_number',
        'cgp_number',
        'risk_level',

        'owner_company_name',
        'owner_company_description',
        'owner_company_zipcode',
        'owner_company_address',
        'owner_company_city',
        'owner_company_state',

        'owner_representative',
        'owner_title',
        'owner_phone',
        'owner_email',

        'contractor_company_name',
        'contractor_company_description',
        'contractor_company_zipcode',
        'contractor_company_address',
        'contractor_company_city',
        'contractor_company_state',

        'contractor_representative',
        'contractor_title',
        'contractor_phone',
        'contractor_email',

        'wpcm_company_name',
        'wpcm_company_description',
        'wpcm_company_zipcode',
        'wpcm_company_address',
        'wpcm_company_city',
        'wpcm_company_state',

        'wpcm_representative',
        'wpcm_title',
        'wpcm_phone',
        'wpcm_email',

        'qsp_company_name',
        'qsp_company_description',
        'qsp_company_zipcode',
        'qsp_company_address',
        'qsp_company_city',
        'qsp_company_state',

        'qsp_representative',
        'qsp_title',
        'qsp_phone',
        'qsp_email',
    ];

    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function inspections() {
        return $this->hasMany('\App\Inspection');

        /*
        $inspections = \App\Inspection::with('project')->get();

        foreach($inspections as $inspection) {
              echo $inspection->project->name.' '.$inspection->project->description.' has inspection: '.$inspection->name.'<br>';
        }

        dump($inspections->toArray());
        */
    }

    public static function getProjectInspections($id) {
        # return \App\Book::with('author')->orderBy('id','desc')->get();
        return \DB::table('inspections')
            ->where('project_id', '=', $id)
            ->get();
    }
}
