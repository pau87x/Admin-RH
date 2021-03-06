<?php namespace AdminRH\Managers;

class LayoffManager extends BaseManager {

    public function getRules()
    {
        $rules = [
        	'date' 		  => 'required|date_format:"d/m/Y"',
        	'employee_id' => 'required|exists:employees,id',
            'reason'      => 'required|alpha_plus',
            'comments'    => 'alpha_plus',
        ];

        return $rules;
    }

    public function prepareData($data)
    {
        $date = str_replace("/","-",$data['date']);
        $data['date'] = date("Y/m/d", strtotime($date));

        return $data;
    }
} 