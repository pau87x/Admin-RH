<?php

use AdminRH\Managers\RegisterManager;
use AdminRH\Repositories\PositionRepo;
use AdminRH\Repositories\StateRepo;
use AdminRH\Managers\PositionManager;

class PositionsController extends BaseController {

    protected $positionRepo;
    protected $stateRepo;

    public function __construct(PositionRepo $positionRepo,
                                StateRepo $stateRepo)
    {
        $this->positionRepo = $positionRepo;
        $this->stateRepo = $stateRepo;
    }

    public function show()
    {
        $positions = $this->positionRepo->getCurrent();

        return View::make('positions/show', compact('positions'));
    }

    public function create()
    {
        $job_types  = \Lang::get('utils.job_types');
        $states  = $this->stateRepo->getList();
        return View::make('positions/new', compact('positions','states','job_types'));
    }

    public function register()
    {
        $position = $this->positionRepo->newPosition();
        $manager = new PositionManager($position, Input::all());
        $manager->save();

        return Redirect::route('positions');
    }

    public function edit($id)
    {
        $position = $this->positionRepo->find($id);
        $job_types  = \Lang::get('utils.job_types');
        $states  = $this->stateRepo->getList();

        $this->notFoundUnless($position);

        return View::make('positions/edit', compact('position','states','job_types'));
    }

    public function update($id)
    {
        $position = $this->positionRepo->find($id);
        $manager = new PositionManager($position, Input::all());

        $manager->save();

        return Redirect::route('positions');
    }

    public function delete($id)
    {
        $position = $this->positionRepo->find($id);

        $this->notFoundUnless($position);

        return View::make('positions/delete', compact('position'));
    }

    public function destroy($id)
    {

        $position = $this->positionRepo->find($id);

        $this->notFoundUnless($position);

        $position->delete();

        return Redirect::route('positions');

    }

} 