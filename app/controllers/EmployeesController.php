<?php

//use AdminRH\Managers\RegisterManager;
use AdminRH\Repositories\EmployeeRepo;
use AdminRH\Repositories\CityRepo;
use AdminRH\Repositories\StateRepo;
// use AdminRH\Managers\AccountManager;
// use AdminRH\Managers\ProfileManager;
use AdminRH\Managers\EmployeeManager;

class EmployeesController extends BaseController {

    protected $employeeRepo;
    protected $cityRepo;
    protected $stateRepo;

    public function __construct(EmployeeRepo $employeeRepo,
                                CityRepo $cityRepo,
                                StateRepo $stateRepo)
    {
        $this->employeeRepo = $employeeRepo;
        $this->cityRepo = $cityRepo;
        $this->stateRepo = $stateRepo;
    }

    public function show()
    {
        $employees = $this->employeeRepo->getList();

       // dd($employees);

        return View::make('employees/show', compact('employees'));
    }

    public function showEmployee($id)
    {
        $employee = $this->employeeRepo->find($id);

        return View::make('employees/show-employee', compact('employee'));
    }

    public function create()
    {
        $genres  = \Lang::get('utils.genre');
        $states  = $this->stateRepo->getList();

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