<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Center;

class CenterRepo extends BaseRepo {

    public function getModel()
    {
        return new Center;
    }

    public function getList()
    {
        return Center::lists('name', 'id');
    }

    public function getAll()
    {    
        return Center::get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function newCenter()
    {
        $center = new Center();
        return $center;
    }

} 