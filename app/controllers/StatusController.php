<?php

use AdminRH\Managers\RegisterManager;
use AdminRH\Repositories\StatusRepo;
use AdminRH\Repositories\EmployeeRepo;
use AdminRH\Managers\AccountManager;
use AdminRH\Managers\ProfileManager;
use AdminRH\Managers\StatusManager;

class EmployeesController extends BaseController {

    protected $statusRepo;
    protected $employeeRepo;

    public function __construct(StatusRepo $statusRepo,
                                EmployeeRepo $employeeRepo)
    {
        $this->employeeRepo = $employeeRepo;
        $this->statusRepo = $statusRepo;
    }

    public function show()
    {
        $status = $this->statusRepo->getList();

        return View::make('employees/show', compact('employees'));
    }

    public function create()
    {
        return View::make('employees/new', compact('genres','states'));
    }

    public function register()
    {
        //dd(Input::all());
        $employee = $this->employeeRepo->newEmployee();
        $manager = new EmployeeManager($employee, Input::all());
        $manager->save();

        return Redirect::route('employees');
    }

    public function update($id)
    {
        $employee = $this->employeeRepo->find($id);

        $this->notFoundUnless($employee);

        $birthdate = str_replace("/","-",$employee->birthdate);
        $employee->birthdate = date("d/m/Y", strtotime($birthdate));

        $genres  = \Lang::get('utils.genre');
        $states  = $this->stateRepo->getList();
        return View::make('employees/edit', compact('employee','genres','states'));
    }

    public function saveUpdate($id)
    {
        $employee = $this->employeeRepo->find($id);
        $manager = new EmployeeManager($employee, Input::all());

        $manager->save();

        return Redirect::route('employees');
    }

} 