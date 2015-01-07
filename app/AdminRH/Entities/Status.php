<?php namespace AdminRH\Entities;

class Status extends \Eloquent {

	protected $fillable = [];
    protected $table = 'status';

    public function getNameStatusAttribute()
    {
       return substr($this->name);;
    }


}