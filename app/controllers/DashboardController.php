<?php

//use AdminRH\Repositories\EmployeeRepo;

class DashboardController extends BaseController {

    // protected $employeeRepo;

    // public function __construct(EmployeeRepo $employeeRepo)
    // {
    //     $this->employeeRepo = $employeeRepo;
    // }

	public function index()
	{
       // $latest_candidates = $this->employeeRepo->findLatest();

		//return View::make('home', compact('latest_candidates'));
        return View::make('dashboard');
	}

}