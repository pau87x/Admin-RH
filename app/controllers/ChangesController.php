<?php

use AdminRH\Managers\RegisterManager;
use AdminRH\Repositories\EmployeeRepo;
use AdminRH\Repositories\ChangeRepo;
use AdminRH\Repositories\TitleRepo;
use AdminRH\Repositories\CenterRepo;
use AdminRH\Managers\AccountManager;
use AdminRH\Managers\ProfileManager;
use AdminRH\Managers\ChangeManager;

class ChangesController extends BaseController {

    protected $employeeRepo;
    protected $changeRepo;

    public function __construct(EmployeeRepo $employeeRepo,
                                ChangeRepo $changeRepo,
                                TitleRepo $titleRepo,
                                CenterRepo $centerRepo)
    {
        $this->employeeRepo = $employeeRepo;
        $this->changeRepo = $changeRepo;
        $this->titleRepo = $titleRepo;
        $this->centerRepo = $centerRepo;
    }

    public function show($id)
    {
        $employee = $this->employeeRepo->find($id);
        $changes = $this->changeRepo->getChanges($id);

        return View::make('changes/show', compact('employee','changes'));
    }

    public function create($id)
    {
        $employee     = $this->employeeRepo->find($id);
        $titles       = $this->titleRepo->getList();
        $centers      = $this->centerRepo->getList();
        $supervisors  = $this->employeeRepo->getListSupervisors();
        return View::make('changes/new', compact('employee','titles','centers','supervisors'));
    }

    public function register($id)
    {
        $employee = $this->employeeRepo->find($id);

        // dd($employee);

        $change = $this->changeRepo->newChange();

        Input::merge(array('employee_id' => 1)); //checar_bug

        $manager = new ChangeManager($change, Input::all());
        $manager->save();

        return Redirect::route('changes', $employee->id);
    }

    // public function update($id)
    // {
    //     $employee = $this->employeeRepo->find($id);

    //     $this->notFoundUnless($employee);

    //     $birthdate = str_replace("/","-",$employee->birthdate);
    //     $employee->birthdate = date("d/m/Y", strtotime($birthdate));

    //     $genres  = \Lang::get('utils.genre');
    //     $states  = $this->stateRepo->getList();
    //     return View::make('employees/edit', compact('employee','genres','states'));
    // }

    // public function saveUpdate($id)
    // {
    //     $employee = $this->employeeRepo->find($id);
    //     $manager = new EmployeeManager($employee, Input::all());

    //     $manager->save();

    //     return Redirect::route('employees');
    // }

} 