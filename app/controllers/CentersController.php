<?php

use AdminRH\Repositories\CenterRepo;
use AdminRH\Repositories\EmployeeRepo;
use AdminRH\Managers\CenterManager;

class CentersController extends BaseController {

    protected $centerRepo;
    protected $employeeRepo;

    public function __construct(CenterRepo $centerRepo,
                                EmployeeRepo $employeeRepo)
    {
        $this->centerRepo   = $centerRepo;
        $this->employeeRepo = $employeeRepo;
    }

    public function show()
    {
        $centers = $this->centerRepo->getAll();

        return View::make('centers/show', compact('centers'));
    }

    public function create()
    {
        return View::make('centers/new');
    }

    public function register()
    {
        $center = $this->centerRepo->newCenter();
        $manager = new CenterManager($center, Input::all());

        if($manager->save())
            Session::flash('alert-success', 'El centro se ha agregado con éxito');
        else
            Session::flash('alert-danger', 'Ha ocurrido un error al crear el centro');

        return Redirect::route('centers');
    }

    public function edit($id)
    {
        $center = $this->centerRepo->find($id);

        $this->notFoundUnless($center);

        return View::make('centers/edit', compact('center'));
    }

    public function update($id)
    {
        $center = $this->centerRepo->find($id);
        $manager = new CenterManager($center, Input::all());

        if($manager->save())
            Session::flash('alert-success', 'Se han modificado los datos con éxito');
        else
            Session::flash('alert-danger', 'Ha ocurrido un error al actualizar los datos');

        return Redirect::route('centers');
    }

    public function delete($id)
    {
        $center = $this->centerRepo->find($id);

        $this->notFoundUnless($center);

        return View::make('centers/delete', compact('center'));
    }

    public function destroy($id)
    {

        $center = $this->centerRepo->find($id);

        $this->notFoundUnless($center);

        $used = $this->employeeRepo->centerIsUsed($id);

        if($used>0){
            Session::flash('alert-danger', 'El centro está ligado con al menos un empleado');
        }else{
            if($center->delete())
                Session::flash('alert-success', 'Se han eliminado el centro');
            else
                Session::flash('alert-danger', 'Ha ocurrido un error al eliminar el centro');
        }
        
        return Redirect::route('centers');
    }

} 