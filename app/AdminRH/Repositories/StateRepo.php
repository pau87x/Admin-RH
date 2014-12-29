<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\State;

class StateRepo extends BaseRepo {

    public function getModel()
    {
        return new State;
    }

    public function getList()
    {
        return State::lists('name', 'id');
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

} 