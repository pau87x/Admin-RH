<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Category;

class CategoryRepo extends BaseRepo {

    public function getModel()
    {
        return new Category;
    }

    public function getList()
    {
        return Category::lists('name', 'id');
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

} 