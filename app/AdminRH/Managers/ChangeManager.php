<?php namespace AdminRH\Managers;

class ChangeManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date_format:"d/m/Y"',
            'title_id' => 'required|exists:titles,id',
            'center_id'    => 'required|exists:centers,id',
            'supervisor_id' => 'required|exists:employees,id',
            'salary'   => 'required|numeric|min:0',
            'current'   => 'required|boolean'
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