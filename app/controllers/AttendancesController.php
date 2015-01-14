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
        //$employees = $this->employeeRepo->getActives();
        $date = date('d/m/Y');
        $employees = $this->attendanceRepo->getAttendances($date);

        //dd($employees);

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

        return Redirect::route('list');
    }

} 