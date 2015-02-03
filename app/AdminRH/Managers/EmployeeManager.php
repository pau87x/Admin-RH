<?php namespace AdminRH\Managers;

class EmployeeManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'code'       => 'required|alpha_dash|unique:employees,code,'. $this->entity->id,
            'first_name' => 'required|alpha',
            'middle_name'=> 'alpha',

            'last_name'  => 'required|alpha',
            'maiden_name'=> 'required|alpha',

            'birthdate' => 'required|date_format:"d/m/Y"',
            'genre'     => 'required|in:male,female',

            'phone'     => 'required|numeric|regex:/^\d{10}$/',
            'cell_phone'=> 'required|numeric|regex:/^\d{10}$/',

            'email'     => 'required|email',
            'rfc'       => array('required', 'alpha_dash', 'regex:/^([A-Z|a-z|&amp;]{3}\d{2}((0[1-9]|1[012])(0[1-9]|1\d|2[0-8])|(0[13456789]|1[012])(29|30)|(0[13578]|1[02])31)|([02468][048]|[13579][26])0229)(\w{2})([A|a|0-9]{1})$|^([A-Z|a-z]{4}\d{2}((0[1-9]|1[012])(0[1-9]|1\d|2[0-8])|(0[13456789]|1[012])(29|30)|(0[13578]|1[02])31)|([02468][048]|[13579][26])0229)((\w{2})([A|a|0-9]{1})){0,3}$/'),
            'curp'      => array('required', 'alpha_dash', 'regex:/^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/'),
            'ss_number' => 'required|alpha_dash',

            'street'    => 'required|regex:/^[a-zA-Z0-9][ A-Za-z0-9._-]*$/',
            'no_ext'    => 'required|alpha_num',
            'no_int'    => 'alpha_dash',
            'extra_address' => 'required|regex:/^[a-zA-Z0-9][ A-Za-z0-9._-]*$/',

            'zip_code'  => 'required|numeric',
            'city'      => 'required',

            'state_id'  => 'required'
            
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