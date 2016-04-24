<?php

namespace P3;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects() {
        return $this->hasMany('\App\Project');

        /*
        $projects = \App\Project::with('user')->get();

        foreach($projects as $project) {
              echo $project->user->name.' '.$project->user->email.' has project: '.$project->name.'<br>';
        }

        dump($projects->toArray());
        */
    }
}
