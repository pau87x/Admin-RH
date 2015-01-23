<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Position;

class PositionRepo extends BaseRepo {

    public function getModel()
    {
        return new Position;
    }

    public function getList()
    {
        return Position::where('current','=','1')->lists('name', 'id');
    }

    public function getAll()
    {    
        return Position::get();
    }

    public function getCurrent()
    {    
        return Position::where('current','=','1')->orderBy('created_at', 'desc')->get();
    }


    public function find($id)
    {
        return $this->model->find($id);
    }

    public function newPosition()
    {
        $title = new Position();
        return $title;
    }
} 