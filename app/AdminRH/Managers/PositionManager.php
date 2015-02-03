<?php namespace AdminRH\Managers;

class PositionManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'name'			=> 'required|alpha_plus',
            'description' 	=> 'max:1000',
            'job_type'    	=> 'required|in:full,partial,freelance,intern',
            'salary' 		=> 'required|numeric|min:0',
            'city'      	=> 'required',
            'state_id'     	=> 'required|exists:estados,id'         
        ];

        return $rules;
    }

} 