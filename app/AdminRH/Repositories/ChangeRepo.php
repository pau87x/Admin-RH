<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Employee;
use AdminRH\Entities\User;
use AdminRH\Entities\Change;

class ChangeRepo extends BaseRepo {

    public function getModel()
    {
        return new Change;
    }

    public function getList()
    {
        return Change::get();
    }

    public function getChanges($id)
    {
        return Change::where('employee_id', $id)->get();
    }

    public function getIsSupervisor($id)
    {
        return Change::where('supervisor_id', $id)->count();
    }

    public function newChange()
    {
        $change = new Change();
        return $change;
    }

} 