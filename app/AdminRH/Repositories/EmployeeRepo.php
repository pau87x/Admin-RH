<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Employee;
use AdminRH\Entities\User;
use DB;

class EmployeeRepo extends BaseRepo {

    public function getModel()
    {
        return new Employee;
    }

    public function getList()
    {
       // return Employee::lists('code', 'first_name');
       return Employee::get();
       //return Employee::with('changes.title')->get();
    }

    public function getListPaginate()
    {
       return Employee::paginate(10);
    }

    public function getListSupervisors()
    {
        //return Employee::where('status_id', '=', 2)->lists('first_name', 'id');
        return Employee::where('status_id', '=', 2)->lists(DB::raw('concat(first_name," ",middle_name," ",last_name," ",maiden_name)'), 'id');
    }

    public function changeStatus($id)
    {
        return Employee::where('id', $id)->update(array('status_id' => 1));
    }

    public function getActive()
    {
        return Employee::where('status_id', '=', 2)->get();
    }

    public function newEmployee()
    {
        $employee = new Employee();
        return $employee;
    }

} 