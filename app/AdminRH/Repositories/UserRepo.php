<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\User;
use DB;

class UserRepo extends BaseRepo {

    public function getModel()
    {
        return new User;
    }

    public function getList()
    {
       return User::get();
    }

    public function getListPaginate()
    {
       return User::orderBy('type')->paginate(10);
    }

    public function newUser()
    {
        $employee = new User();
        return $employee;
    }

} 