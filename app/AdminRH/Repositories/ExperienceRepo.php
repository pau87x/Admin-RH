<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Experience;

class ExperienceRepo extends BaseRepo {

    public function getModel()
    {
        return new Experience;
    }

    public function getList()
    {
        return Experience::lists('company', 'id');
    }

    public function getAll($id)
    {    
        return Experience::where('candidate_id', $id)->orderBy('start', 'desc')->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function newExperience()
    {
        $education = new Experience();
        return $education;
    }
} 