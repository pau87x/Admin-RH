<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\City;

class CityRepo extends BaseRepo {

    public function getModel()
    {
        return new City;
    }

    public function getList()
    {
        return City::lists('name', 'id');
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

} 