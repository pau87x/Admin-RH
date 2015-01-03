<?php

use AdminRH\Managers\RegisterManager;
use AdminRH\Repositories\EmployeeRepo;
use AdminRH\Repositories\CityRepo;
use AdminRH\Repositories\StateRepo;
use AdminRH\Managers\AccountManager;
use AdminRH\Managers\ProfileManager;
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

        return View::make('employees/show', compact('employees'));
    }

    public function create()
    {
        $genres  = \Lang::get('utils.genre');
        // $cities  = $this->cityRepo->getList();
        $states  = $this->stateRepo->getList();
        return View::make('employees/new', compact('genres','states'));
    }

    public function register()
    {
        $user = $this->employeeRepo->newEmployee();
        $manager = new EmployeeManager($user, Input::all());
        $manager->save();

        return Redirect::route('home');
    }

} 