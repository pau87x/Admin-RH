<?php namespace AdminRH\Managers;

class AttendanceManager extends BaseManager {

    public function getRules()
    {
        $rules = [
        	'employee_id' => 'required|exists:employees,id',
            'user_id'      => 'required|exists:users,id',
        ];

        return $rules;
    }
    
} 