<?php namespace AdminRH\Entities;

class Employee extends \Eloquent {

    protected $fillable = ['code', 'first_name', 'middle_name','last_name','maiden_name',
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
        return $this->hasMany('AdminRH\Entities\Change', 'employee_id');
    }

    public function attendances()
    {
        return $this->hasMany('AdminRH\Entities\Attendance', 'employee_id');
    }

    public function getLastChangeAttribute()
    {
        return $this->changes->sortBy('created_at')->last();
    }

    public function getTitleAttribute()
    {
        if($change = $this->changes->sortBy('created_at')->last())
            $title = $this->last_change->title->name;
        else
            $title = '-';

        return $title;
    }

    public function getCenterAttribute()
    {
        if($change = $this->changes->sortBy('created_at')->last())
            $center = $this->last_change->center->name;
        else
            $center = '-';

        return $center;
    }

    public function getAssistanceAttribute()
    {
        if($this->attendances->count() > 0)
        {
            return true;
        }

        return false;
    }

    public function getFullNameAttribute()
    {
        return $this->last_name  . ' ' . $this->maiden_name . ' ' . $this->first_name . ' ' .   $this->middle_name;
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