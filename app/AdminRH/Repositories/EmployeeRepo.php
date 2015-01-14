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
       return Employee::get();
       //return Employee::with('changes.title')->get();
    }

    public function getListPaginate()
    {
       return Employee::paginate(10);
    }

    public function getListSupervisors()
    {
        return Employee::where('status_id', '=', 2)->lists(DB::raw('concat(first_name," ",middle_name," ",last_name," ",maiden_name)'), 'id');
    }

    public function getFilterList($status,$title,$center,$supervisor)
    {

        $employees = Employee::with('changes')->whereHas('changes', function($q) use ($status,$center,$title,$supervisor){

            $q->where('current', '=', 1);

            if($center!='')
                $q->where('center_id', '=', $center);

            if($title!='')
                $q->where('title_id', '=', $title);

            if($status!='')
                $q->where('status_id', '=', $status);

            if($supervisor!='')
                $q->where('supervisor_id', '=', $supervisor);

        })->get();
        
        return $employees;
    }

    public function changeStatus($id)
    {
        return Employee::where('id', $id)->update(array('status_id' => 1));
    }

    public function getActives()
    {
        return Employee::where('status_id', '=', 2)
                        ->orderBy('last_name', 'asc')
                        ->orderBy('maiden_name', 'asc')
                        ->orderBy('middle_name', 'asc')
                        ->orderBy('first_name', 'asc')->get();
    }

    public function newEmployee()
    {
        $employee = new Employee();
        return $employee;
    }

} 