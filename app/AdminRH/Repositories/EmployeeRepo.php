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

    public function getAttendances($date)
    {

        $employees = Employee::with(array('attendances' => function($query) use ($date)
        {
            $query->where('created_at', '>=',$date.' 00:00:00')
                  ->where('created_at','<', $date.' 23:59:00');

        }))->get();

        return $employees;

    }

    public function centerIsUsed($center)
    {
        return Employee::with('changes')->whereHas('changes', function($q) use ($center){

            if($center!='')
                $q->where('center_id', '=', $center);

        })->count();
    }

    public function titleIsUsed($title)
    {
        return Employee::with('changes')->whereHas('changes', function($q) use ($title){

            if($title!='')
                $q->where('title_id', '=', $title);

        })->count();
    }

    public function searchEmployee($q)
    {
        $employees =  Employee::where('first_name', 'LIKE',  "%$q%")
                       ->orWhere('middle_name', 'LIKE', "%$q%")
                       ->orWhere('last_name', 'LIKE', "%$q%")
                       ->orWhere('maiden_name', 'LIKE', "%$q%")
                       //->orWhereRaw("CONCAT('first_name', ' ', 'middle_name') LIKE '%$q%'")
                     ->get();
        return $employees;
    }


    public function newEmployee()
    {
        $employee = new Employee();
        return $employee;
    }

} 