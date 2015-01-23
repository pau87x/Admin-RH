<?php namespace AdminRH\Entities;

class Experience extends \Eloquent {

	protected $fillable = ['company','title','summary','start','end','current','candidate_id'];
    protected $table = 'experiences';
}
