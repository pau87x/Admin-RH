<?php namespace AdminRH\Managers;

class TitleManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'name'    => 'required|regex:/^[a-zA-Z0-9][ A-Za-z0-9._-]*$/'         
        ];

        return $rules;
    }

} 