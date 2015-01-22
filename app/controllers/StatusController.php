<?php

use AdminRH\Repositories\StatusRepo;
use AdminRH\Managers\StatusManager;

class StatusController extends BaseController {

    protected $statusRepo;
    protected $employeeRepo;

    public function __construct(StatusRepo $statusRepo)
    {
        $this->employeeRepo = $employeeRepo;
        $this->statusRepo = $statusRepo;
    }

} 