<?php namespace AdminRH\Entities;

class Position extends \Eloquent {

	protected $fillable = ['name','description','job_type','salary','city','state_id'];
    protected $table = 'positions';

    public function state()
    {
        return $this->belongsTo('AdminRH\Entities\State');
    }

    public function getJobTypeTitleAttribute()
    {
        return \Lang::get('utils.job_types.' . $this->job_type);
    }

    public function getPlaceAttribute()
    {
        return $this->city  . ', ' . $this->state->name;
    }

}
