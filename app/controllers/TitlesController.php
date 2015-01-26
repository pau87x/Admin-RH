<?php

use AdminRH\Repositories\TitleRepo;
use AdminRH\Repositories\EmployeeRepo;
use AdminRH\Managers\TitleManager;

class TitlesController extends BaseController {

    protected $titleRepo;
    protected $employeeRepo;

    public function __construct(TitleRepo $titleRepo,
                                EmployeeRepo $employeeRepo)
    {
        $this->titleRepo = $titleRepo;
        $this->employeeRepo = $employeeRepo;
    }

    public function show()
    {
        $titles = $this->titleRepo->getAll();

        return View::make('titles/show', compact('titles'));
    }

    public function create()
    {
        return View::make('titles/new');
    }

    public function register()
    {
        $title = $this->titleRepo->newTitle();
        $manager = new TitleManager($title, Input::all());
        $manager->save();

        return Redirect::route('titles');
    }

    public function edit($id)
    {
        $title = $this->titleRepo->find($id);

        $this->notFoundUnless($title);

        return View::make('titles/edit', compact('title'));
    }

    public function update($id)
    {
        $title = $this->titleRepo->find($id);
        $manager = new TitleManager($title, Input::all());

        $manager->save();

        return Redirect::route('titles');
    }

    public function delete($id)
    {
        $title = $this->titleRepo->find($id);

        $this->notFoundUnless($title);

        return View::make('titles/delete', compact('title'));
    }

    public function destroy($id)
    {

        $title = $this->titleRepo->find($id);

        $this->notFoundUnless($title);

        $used = $this->employeeRepo->titleIsUsed($id);

        if($used>0){
            Session::flash('alert-danger', 'El puesto está ligado con al menos un empleado');
        }else{
            $title->delete();
        }

        return Redirect::route('titles');

    }

} 