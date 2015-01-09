<?php namespace AdminRH\Entities;

class Employee extends \Eloquent {

    protected $fillable = ['code', 'first_name', 'middle_name', 'third_name','last_name','maiden_name',
                            'birthdate' ,'genre',
                            'phone' ,'cell_phone','email',
                            'rfc','curp','ss_number',
                            'street','no_ext','extra_address','zip_code','city','state_id','status_id'];

    protected $perPage = 20;

    public function city()
    {
        return $this->belongsTo('AdminRH\Entities\City');
    }

    public function state()
    {
        return $this->belongsTo('AdminRH\Entities\State');
    }

    public function status()
    {
        return $this->belongsTo('AdminRH\Entities\Status');
    }

    public function changes()
    {
        return $this->hasMany('AdminRH\Entities\Change');
    }

    public function getSupervisorAttribute()
    {
        $last_change = $this->changes->last();
        $supervisor_id = $last_change['supervisor_id'];
        return $supervisor_id;
    }

    public function getCenterAttribute()
    {
        $last_change = $this->changes->last();
        $center_id = $last_change['center_id'];
        return $center_id;
    }

    public function getFullNameAttribute()
    {
        return $this->last_name  . ' ' . $this->maiden_name . ' ' . $this->first_name . ' ' .   $this->middle_name . ' ' .   $this->third_name;
    }

    public function getAddressAttribute()
    {
        return $this->street . ' No. ' .   $this->no_ext . ', ' .   $this->city . ', ' . $this->state->name; 
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

    public function getStatusAttribute()
    {
        return \Lang::get('utils.status.' . $this->status_id);
    }

}