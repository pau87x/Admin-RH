<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Title;

class TitleRepo extends BaseRepo {

    public function getModel()
    {
        return new Title;
    }

    public function getList()
    {
        return Title::lists('name', 'id');
    }

    public function getAll()
    {    
        return Title::get();
    }


    public function find($id)
    {
        return $this->model->find($id);
    }

    public function newTitle()
    {
        $title = new Title();
        return $title;
    }
} 