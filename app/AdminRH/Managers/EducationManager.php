<?php namespace AdminRH\Managers;

class EducationManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'school'	=> 'required|regex:/^[a-zA-Z0-9][ A-Za-z0-9._-]*$/',
            'degree' 	=> 'required|regex:/^[a-zA-Z0-9][ A-Za-z0-9._-]*$/',
            'start'    	=> 'required|date_format:"d/m/Y"',
            'end' 		=> 'required|date_format:"d/m/Y"',
            'candidate_id' => 'required|exists:candidates,id'
        ];

        return $rules;
    }

    public function prepareData($data)
    {
        $start = str_replace("/","-",$data['start']);
        $data['start'] = date("Y/m/d", strtotime($start));

        $end = str_replace("/","-",$data['end']);
        $data['end'] = date("Y/m/d", strtotime($end));

        return $data;
    }

} 