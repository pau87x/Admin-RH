<?php namespace AdminRH\Entities;

class Layoff extends \Eloquent {

	protected $fillable = ['date','employee_id','reason','comments'];
	protected $table = 'layoffs';

}