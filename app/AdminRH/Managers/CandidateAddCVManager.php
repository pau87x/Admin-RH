<?php namespace AdminRH\Managers;

class CandidateAddCVManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'cv' => 'required|mimes:pdf',
            
        ];

        return $rules;
    }

    public function prepareData($data)
    {
        if ( isset ($data['cv']) )
        {
             $cv   = $data['cv'];
             $file = $data['cv']->getClientOriginalName();
             $cv->move('cvs', $file);

             $data['cv'] = $file;
        }

        return $data;
    }

} 