<?php namespace AdminRH\Managers;

class CandidateManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'first_name' => 'required|alpha',
            'middle_name'=> 'alpha',

            'last_name'  => 'required|alpha',
            'maiden_name'=> 'required|alpha',

            'genre'     => 'required|in:male,female',
            'birthdate' => 'required|date_format:"d/m/Y"',

            'cell_phone'=> 'required|numeric|regex:/^\d{10}$/',
            'email'     => 'required|email',

            'city'      => 'required',
            'state_id'  => 'required|exists:estados,id',

            'position_id' => 'required|exists:positions,id',
            // //cv
            // 'salary'   => 'required|numeric|min:0'
            //comment
            
        ];

        return $rules;
    }

    public function prepareData($data)
    {
        $birthdate = str_replace("/","-",$data['birthdate']);
        $data['birthdate'] = date("Y/m/d", strtotime($birthdate));

        return $data;
    }

} 