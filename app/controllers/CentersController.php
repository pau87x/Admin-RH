<?php

use AdminRH\Managers\RegisterManager;
use AdminRH\Repositories\CenterRepo;
use AdminRH\Managers\CenterManager;

class CentersController extends BaseController {

    protected $centerRepo;

    public function __construct(CenterRepo $centerRepo)
    {
        $this->centerRepo = $centerRepo;
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
        $manager->save();

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

        $manager->save();

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

        $center->delete();

        return Redirect::route('centers');

    }

} 