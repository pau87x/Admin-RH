<?php namespace AdminRH\Entities;

class Candidate extends \Eloquent {

    protected $fillable = ['first_name', 'middle_name','last_name','maiden_name',
                            'birthdate' ,'genre',
                            'cell_phone','email',
                            'city','state_id',
                            'position_id','salary','comment'];

    protected $perPage = 20;

    public function city()
    {
        return $this->belongsTo('AdminRH\Entities\City');
    }

    public function state()
    {
        return $this->belongsTo('AdminRH\Entities\State');
    }

    public function position()
    {
         return $this->belongsTo('AdminRH\Entities\Position');
    }

    // public function attendances()
    // {
    //     return $this->hasMany('AdminRH\Entities\Attendance', 'employee_id');
    // }

    // public function getTitleAttribute()
    // {
    //     if($change = $this->changes->sortBy('created_at')->last())
    //         $title = $this->last_change->title->name;
    //     else
    //         $title = '-';

    //     return $title;
    // }

    public function getJobTypeTitleAttribute()
    {
        return \Lang::get('utils.job_types.' . $this->job_type);
    }

    public function getPositionNameAttribute()
    {
        return $this->position->name;
    }

    public function getPlaceAttribute()
    {
        return $this->city  . ', ' . $this->state->name;
    }

    public function getFullNameAttribute()
    {
        return $this->last_name  . ' ' . $this->maiden_name . ' ' . $this->first_name . ' ' .   $this->middle_name;
    }

    public function getFechaNacAttribute()
    {
        $birthdate = str_replace("/","-", $this->birthdate);
        $birthdate = date("d/m/Y", strtotime($birthdate));
        return $birthdate; 
    }

    public function getGenreTitleAttribute()
    {
        return \Lang::get('utils.genre.' . $this->genre);
    }


}