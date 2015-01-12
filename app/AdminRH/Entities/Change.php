<?php namespace AdminRH\Entities;

class Change extends \Eloquent {

    protected $fillable = ['employee_id', 'date', 'title_id', 'center_id','supervisor_id','salary'];

    protected $perPage = 20;

    public function employee()
    {
        return $this->belongsTo('AdminRH\Entities\Employee');
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
        return $this->belongsTo('AdminRH\Entities\Employee');
    }

}