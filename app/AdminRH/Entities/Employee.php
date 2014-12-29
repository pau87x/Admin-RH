<?php namespace AdminRH\Entities;

class Employee extends \Eloquent {

    protected $guarded = ['id'];

    protected $perPage = 20;

    public function user()
    {
        return $this->hasOne('AdminRH\Entities\User', 'id', 'id');
    }

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

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' .   $this->middle_name . ' ' .   $this->third_name . ' ' . $this->last_name  . ' ' . $this->maiden_name; 
    }

    public function getAddressAttribute()
    {
        return $this->street . ' No. ' .   $this->no_ext . ', ' .   $this->city->name . ', ' . $this->state->name; 
    }

    public function getGenreTitleAttribute()
    {
        return \Lang::get('utils.genre.' . $this->genre);
    }

}