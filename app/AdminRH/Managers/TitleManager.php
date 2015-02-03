<?php namespace AdminRH\Managers;

class TitleManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'name'    => 'required|alpha_plus',
        ];

        return $rules;
    }

} 