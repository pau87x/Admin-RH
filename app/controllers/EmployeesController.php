<?php

use AdminRH\Repositories\EmployeeRepo;
use AdminRH\Repositories\CityRepo;
use AdminRH\Repositories\StateRepo;
use AdminRH\Repositories\TitleRepo;
use AdminRH\Repositories\CenterRepo;
use AdminRH\Repositories\PositionRepo;
use AdminRH\Managers\EmployeeManager;

class EmployeesController extends BaseController {

    protected $employeeRepo;
    protected $cityRepo;
    protected $stateRepo;
    protected $titleRepo;
    protected $centerRepo;
    protected $positionRepo;

    public function __construct(EmployeeRepo $employeeRepo,
                                CityRepo $cityRepo,
                                StateRepo $stateRepo,
                                TitleRepo $titleRepo,
                                CenterRepo $centerRepo,
                                PositionRepo $positionRepo)
    {
        $this->employeeRepo = $employeeRepo;
        $this->cityRepo     = $cityRepo;
        $this->stateRepo    = $stateRepo;
        $this->titleRepo    = $titleRepo;
        $this->centerRepo   = $centerRepo;
        $this->positionRepo   = $positionRepo;
    }

    public function show()
    {
        //$employees = $this->employeeRepo->getList();
        $employees = $this->employeeRepo->getListPaginate();

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
        $employee = $this->employeeRepo->newEmployee();
        $manager  = new EmployeeManager($employee, Input::all());
        
        $manager->save();

        return Redirect::route('employees');
    }

    public function registerReclute($id)
    {
        $employee = $this->employeeRepo->newEmployee();
        $manager  = new EmployeeManager($employee, Input::all());
        $manager->save();

        $position = $this->positionRepo->find($id);
        $position->current=0;
        $position->save();


        return Redirect::route('employees');
    }

    public function edit($id)
    {
        $employee = $this->employeeRepo->find($id);

        $this->notFoundUnless($employee);

        $birthdate = str_replace("/","-",$employee->birthdate);
        $employee->birthdate = date("d/m/Y", strtotime($birthdate));

        $genres  = \Lang::get('utils.genre');
        $states  = $this->stateRepo->getList();

        return View::make('employees/edit', compact('employee','genres','states'));
    }

    public function update($id)
    {
        $employee = $this->employeeRepo->find($id);
        $manager  = new EmployeeManager($employee, Input::all());

        $manager->save();

        return Redirect::route('employees');
    }

    public function delete($id)
    {
        $employee = $this->employeeRepo->find($id);

        return View::make('employees/delete', compact('employee'));
    }

    public function destroy($id)
    {

        $employee = $this->employeeRepo->find($id);

        $employee->delete();

        return Redirect::route('employees');
    }


    public function filterReport()
    {

        $status  = \Lang::get('utils.status');
        $titles  = $this->titleRepo->getList();
        $centers = $this->centerRepo->getList();
        $supervisors  = $this->employeeRepo->getListSupervisors();


        return View::make('employees/report', compact('status','titles','centers','supervisors'));
       
    }

    public function filterReportSearch()
    {
        $status     = Input::get('status');
        $center     = Input::get('center');
        $title      = Input::get('title');
        $supervisor = Input::get('supervisor');

        $employees = $this->employeeRepo->getFilterList($status,$title,$center,$supervisor);

        return View::make('employees/show-report', compact('employees'));
    }



} 