<?php namespace AdminRH\Managers;

class CenterManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'name'    => 'required|alpha_plus',     
        ];

        return $rules;
    }

} 