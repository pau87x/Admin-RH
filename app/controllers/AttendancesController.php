<?php

//use AdminRH\Repositories\UserRepo;
use AdminRH\Repositories\EmployeeRepo;
use AdminRH\Repositories\AttendanceRepo;
use AdminRH\Managers\AttendanceManager;

class AttendancesController extends BaseController {

    protected $userRepo;
    protected $employeeRepo;
    protected $attendanceRepo;

    public function __construct(EmployeeRepo $employeeRepo,
                                AttendanceRepo $attendanceRepo)
    {
        $this->employeeRepo = $employeeRepo;
        $this->attendanceRepo = $attendanceRepo;
    }

    public function listAttendance()
    {
        $date = date('Y/m/d');

        $employees = $this->employeeRepo->getAttendances($date);

        return View::make('employees/list', compact('employees'));
    }

    public function register($id)
    {
        $employee = $this->employeeRepo->find($id);

        $employee_id = $employee['id'];

        $user = Auth::user();
        $user_id = $user['id'];

        $attendance = $this->attendanceRepo->newAttendance();

        Input::merge(array('employee_id' => $employee_id));
        Input::merge(array('user_id' => $user_id));

        $manager = new AttendanceManager($attendance, Input::all());
        $manager->save();

        return route('delete_attendance',[$attendance->id,$employee_id]);
    }

    public function delete($id,$employee_id)
    {
        $employee = $this->employeeRepo->find($employee_id);

        $attendance = $this->attendanceRepo->find($id);

        $attendance->delete();

        //return Redirect::route('list');
        return route('attendance', [$employee_id]);
    }

    public function listReport()
    {

        // $status  = \Lang::get('utils.status');
        // $titles  = $this->titleRepo->getList();
        // $centers = $this->centerRepo->getList();
        // $supervisors  = $this->employeeRepo->getListSupervisors();


        return View::make('attendance/report-list');
       
    }

    public function listReportSearch()
    {
        // $status = Input::get('status');
        // $center = Input::get('center');
        // $title = Input::get('title');
        // $supervisor = Input::get('supervisor');

        $latin_date = Input::get('date');
        $date = str_replace("/","-",$latin_date);
        $date = date("Y/m/d", strtotime($date));

        $employees = $this->employeeRepo->getAttendances($date);

        return View::make('attendance/show-report-list', compact('employees','latin_date'));
    }


} 