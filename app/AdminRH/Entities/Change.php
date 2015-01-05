<?php namespace AdminRH\Entities;

class Change extends \Eloquent {

    protected $fillable = ['employee_id', 'date', 'title_id', 'center_id','supervisor_id','salary'];

    protected $perPage = 20;

    public function user()
    {
        return $this->hasOne('AdminRH\Entities\User', 'id', 'id');
    }


    public function title()
    {
        return $this->belongsTo('AdminRH\Entities\Title');
    }

    public function center()
    {
        return $this->belongsTo('AdminRH\Entities\Center');
    }

    public function supervisor()
    {
        return $this->belongsTo('AdminRH\Entities\User');
    }

    // public function status()
    // {
    //     return $this->belongsTo('AdminRH\Entities\Status');
    // }

    // public function getTitleAttribute()
    // {
    //     return $this->$title->name;
    // }

    // public function getSupervisorAttribute()
    // {
    //     return $this->$supervisor->first_name; 
    // }

    // public function getCenterAttribute()
    // {
    //     return $this->$center->name;
    // }

}