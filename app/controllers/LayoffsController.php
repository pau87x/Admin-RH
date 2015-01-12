<?php

use AdminRH\Managers\RegisterManager;
use AdminRH\Repositories\EmployeeRepo;
use AdminRH\Repositories\LayoffRepo;
use AdminRH\Repositories\ChangeRepo;
use AdminRH\Managers\LayoffManager;

class LayoffsController extends BaseController {

    protected $layoffRepo;
    protected $employeeRepo;

    public function __construct(LayoffRepo $layoffRepo,
                                EmployeeRepo $employeeRepo,
                                ChangeRepo $changeRepo)
    {
        $this->layoffRepo   = $layoffRepo;
        $this->employeeRepo = $employeeRepo;
        $this->changeRepo = $changeRepo;
    }

    public function create($id)
    {
        $employee = $this->employeeRepo->find($id);
        $personal = $this->changeRepo->getIsSupervisor($id);
        $job = 1;
        if($employee->title=='-')
            $job = 0;
        return View::make('layoffs/new', compact('employee','personal','job'));
    }

    public function register($id)
    {
        $employee = $this->employeeRepo->find($id);

        $id = $employee['id'];

        $change = $this->employeeRepo->changeStatus($id);

        $layoff = $this->layoffRepo->newLayoff();

        Input::merge(array('employee_id' => $id));

        $manager = new LayoffManager($layoff, Input::all());
        $manager->save();


        return Redirect::route('employees');
    }

} 