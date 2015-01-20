<?php namespace AdminRH\Managers;

class PositionManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'name'			=> 'required|regex:/^[a-zA-Z0-9][ A-Za-z0-9._-]*$/',
            'description' 	=> 'max:1000',
            'job_type'    	=> 'required|in:full,partial,freelance,intern',
            'salary' 		=> 'required|numeric|min:0',
            'city'      	=> 'required',
            'state_id'     	=> 'required|exists:estados,id'         
        ];

        return $rules;
    }

} 