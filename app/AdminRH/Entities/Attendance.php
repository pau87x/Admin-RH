<?php namespace AdminRH\Entities;

class Attendance extends \Eloquent {

	protected $fillable = ['date','employee_id','user_id'];
	protected $table = 'attendances';

}