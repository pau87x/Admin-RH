<?php

use AdminRH\Managers\RegisterManager;
use AdminRH\Repositories\TitleRepo;
use AdminRH\Managers\TitleManager;

class TitlesController extends BaseController {

    protected $titleRepo;

    public function __construct(TitleRepo $titleRepo)
    {
        $this->titleRepo = $titleRepo;
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
        //dd(Input::all());
        $title = $this->titleRepo->newTitle();
        $manager = new TitleManager($title, Input::all());
        $manager->save();

        return Redirect::route('titles');
    }

    public function update($id)
    {
        $title = $this->titleRepo->find($id);

        $this->notFoundUnless($title);

        return View::make('titles/edit', compact('title'));
    }

    public function saveUpdate($id)
    {
        $title = $this->titleRepo->find($id);
        $manager = new TitleManager($title, Input::all());

        $manager->save();

        return Redirect::route('titles');
    }

} 