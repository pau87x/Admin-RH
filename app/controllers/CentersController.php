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
        //dd(Input::all());
        $center = $this->centerRepo->newCenter();
        $manager = new CenterManager($center, Input::all());
        $manager->save();

        return Redirect::route('centers');
    }

    public function update($id)
    {
        $center = $this->centerRepo->find($id);

        $this->notFoundUnless($center);

        return View::make('centers/edit', compact('center'));
    }

    public function saveUpdate($id)
    {
        $center = $this->centerRepo->find($id);
        $manager = new CenterManager($center, Input::all());

        $manager->save();

        return Redirect::route('centers');
    }

} 