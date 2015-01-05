<?php

use AdminRH\Managers\RegisterManager;
use AdminRH\Repositories\EmployeeRepo;
use AdminRH\Repositories\LayoffRepo;
use AdminRH\Managers\LayoffManager;

class LayoffsController extends BaseController {

    protected $layoffRepo;
    protected $employeeRepo;

    public function __construct(LayoffRepo $layoffRepo,
                                EmployeeRepo $employeeRepo)
    {
        $this->layoffRepo   = $layoffRepo;
        $this->employeeRepo = $employeeRepo;
    }

    public function create($id)
    {
        $employee = $this->employeeRepo->find($id);
        return View::make('layoffs/new', compact('employee'));
    }

    public function register($id)
    {
        $employee = $this->employeeRepo->find($id);

        // dd($employee);

        $layoff = $this->layoffRepo->newLayoff();

        Input::merge(array('employee_id' => 1)); //checar_bug

        $manager = new LayoffManager($layoff, Input::all());
        $manager->save();

        return Redirect::route('employees');
    }

} 