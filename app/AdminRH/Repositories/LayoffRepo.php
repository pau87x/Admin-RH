<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Layoff;

class LayoffRepo extends BaseRepo {

    public function getModel()
    {
        return new Layoff;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function newLayoff()
    {
        $layoff = new Layoff();
        return $layoff;
    }

} 