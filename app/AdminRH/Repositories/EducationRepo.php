<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Education;

class EducationRepo extends BaseRepo {

    public function getModel()
    {
        return new Education;
    }

    public function getList()
    {
        return Education::lists('school', 'id');
    }

    public function getAll($id)
    {    
        return Education::where('candidate_id', $id)->orderBy('start', 'desc')->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function newEducation()
    {
        $education = new Education();
        return $education;
    }
} 