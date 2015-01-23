<?php namespace AdminRH\Entities;

class Education extends \Eloquent {

	protected $fillable = ['school','degree','start','end','candidate_id'];
    protected $table = 'education';

}
