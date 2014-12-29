<?php namespace AdminRH\Entities;

class Candidate extends \Eloquent {
	protected $fillable = ['website_url', 'description',
                           'job_type', 'category_id', 'available'];
    protected $perPage = 3;

    public function user()
    {
        return $this->hasOne('AdminRH\Entities\User', 'id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('AdminRH\Entities\Category');
    }

    public function getJobTypeTitleAttribute()
    {
        return \Lang::get('utils.job_types.' . $this->job_type);
    }

    public function getShortDescriptionAttribute()
    {
        return substr($this->description, 0, 100) . '...';
    }

}