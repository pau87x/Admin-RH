<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Employee;

class EmployeeRepo extends BaseRepo {

    public function getModel()
    {
        return new Employee;
    }

    public function getList()
    {
       // return Employee::lists('code', 'first_name');
        return Employee::get();
        
        // DB::table('users')->get();
        // DB::table('roles')->lists('title');
    }

    public function getActive()
    {
        return Employee::where('status_id', '=', 1)->get();
    }

    public function newEmployee()
    {
        $user = new User();
        $user->type = 'employee';
        return $user;
    }

} 