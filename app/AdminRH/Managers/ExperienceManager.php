<?php namespace AdminRH\Managers;

class ExperienceManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'company'	=> 'required|regex:/^[a-zA-Z0-9][ A-Za-z0-9._-]*$/',
            'title' 	=> 'required|regex:/^[a-zA-Z0-9][ A-Za-z0-9._-]*$/',
            'summary'   => 'required|max:1000',
            'start'    	=> 'required|date_format:"d/m/Y"',
            'end' 		=> 'required|date_format:"d/m/Y"',
            'candidate_id' => 'required|exists:candidates,id',
            'current'   => 'in:1,0'
        ];

        return $rules;
    }

    public function prepareData($data)
    {
        $start = str_replace("/","-",$data['start']);
        $data['start'] = date("Y/m/d", strtotime($start));

        $end = str_replace("/","-",$data['end']);
        $data['end'] = date("Y/m/d", strtotime($end));

        if ( ! isset ($data['current']))
        {
            $data['current'] = 0;
        }

        return $data;
    }

} 