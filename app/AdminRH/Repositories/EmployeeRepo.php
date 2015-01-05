<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Employee;
use AdminRH\Entities\User;

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

    public function getListSupervisors()
    {
       return Employee::lists('first_name', 'id');
    }


    public function getActive()
    {
        return Employee::where('status_id', '=', 1)->get();
    }

    public function newEmployee()
    {
        $employee = new Employee();
        return $employee;
    }

} 