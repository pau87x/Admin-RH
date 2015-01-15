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
        //dd($supervisors);
        return View::make('changes/new', compact('employee','titles','centers','supervisors'));
    }

    public function register($id)
    {
        $employee = $this->employeeRepo->find($id);

        $id = $employee['id'];

        $changes = $this->changeRepo->updateChanges($id);

        $current = 1;
        $change = $this->changeRepo->newChange();

        Input::merge(array('employee_id' => $id)); 
        Input::merge(array('current' => $current));


        $manager = new ChangeManager($change, Input::all());
        $manager->save();

        return Redirect::route('changes', $id);
    }

    public function edit($id)
    {
        $change = $this->changeRepo->find($id);

        $this->notFoundUnless($change);

        //$employee     = $this->employeeRepo->find($id);
        $titles       = $this->titleRepo->getList();
        $centers      = $this->centerRepo->getList();
        $supervisors  = $this->employeeRepo->getListSupervisors();

        $date = str_replace("/","-",$change->date);
        $change->date = date("d/m/Y", strtotime($date));

        return View::make('changes/edit', compact('change','titles','centers','supervisors'));
    }

    public function update($id)
    {
        $change = $this->changeRepo->find($id);

        Input::merge(array('employee_id' => $change->employee_id)); 
        Input::merge(array('current' => $change->current));

        $manager = new ChangeManager($change, Input::all());


        $manager->save();

        return Redirect::route('employees');
    }

} 