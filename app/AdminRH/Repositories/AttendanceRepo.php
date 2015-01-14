<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Attendance;

class AttendanceRepo extends BaseRepo {

    public function getModel()
    {
        return new Attendance;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function newAttendance()
    {
        $layoff = new Attendance();
        return $layoff;
    }
    
    public function getAttendances($date)
    {
        // $results = DB::select( DB::raw("SELECT * FROM some_table WHERE some_col = :somevariable"), array(
        //    'somevariable' => $someVariable,
        //  ));
        $sql = "select *,(SELECT '***' FROM attendances a  where e.id=a.employee_id and DATE('created_at') = CURDATE() limit 1) as assistance from employees e";
        $sql = "select *, (SELECT 'ok' FROM attendances a where e.id=a.employee_id and DATE(created_at) = CURDATE() limit 1) as assistance from employees e";
        //$results =\DB::raw($sql);
        $results = \DB::select( \DB::raw($sql));
        //$results = \DB::select( \DB::raw($sql), array('somevariable' => $someVariable));
        //dd($results);
        return $results;
    }

} 