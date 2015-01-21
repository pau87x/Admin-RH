<?php

use AdminRH\Repositories\CandidateRepo;
use AdminRH\Repositories\CityRepo;
use AdminRH\Repositories\StateRepo;
use AdminRH\Repositories\PositionRepo;
use AdminRH\Repositories\CenterRepo;
use AdminRH\Managers\CandidateManager;

class CandidatesController extends BaseController {

    protected $candidateRepo;
    protected $cityRepo;
    protected $stateRepo;
    protected $positionRepo;

    public function __construct(CandidateRepo $candidateRepo,
                                CityRepo $cityRepo,
                                StateRepo $stateRepo,
                                PositionRepo $positionRepo)
    {
        $this->candidateRepo = $candidateRepo;
        $this->cityRepo      = $cityRepo;
        $this->stateRepo     = $stateRepo;
        $this->positionRepo  = $positionRepo;
    }

    public function show()
    {
        $candidates = $this->candidateRepo->getListPaginate();

        return View::make('candidates/show', compact('candidates'));
    }

    public function showCandidate($id)
    {
        $candidate = $this->candidateRepo->find($id);

        return View::make('candidates/show-candidate', compact('candidate'));
    }

    public function create()
    {
        $genres    = \Lang::get('utils.genre');
        $states    = $this->stateRepo->getList();
        $positions = $this->positionRepo->getList();

        return View::make('candidates/new', compact('genres','states','positions'));
    }

    public function register()
    {
        $candidate = $this->candidateRepo->newCandidate();
        $manager  = new CandidateManager($candidate, Input::all());
        
        $manager->save();

        return Redirect::route('candidates');
    }

    public function edit($id)
    {
        $candidate = $this->candidateRepo->find($id);

        $this->notFoundUnless($candidate);

        $birthdate = str_replace("/","-",$candidate->birthdate);
        $candidate->birthdate = date("d/m/Y", strtotime($birthdate));

        $genres     = \Lang::get('utils.genre');
        $states     = $this->stateRepo->getList();
        $positions  = $this->positionRepo->getList();

        return View::make('candidates/edit', compact('candidate','genres','states','positions'));
    }

    public function update($id)
    {
        $candidate = $this->candidateRepo->find($id);
        $manager  = new CandidateManager($candidate, Input::all());
        extract(Input::all());
        $manager->save();

        $extension = Input::file('cv')->getClientOriginalExtension();
        $cv->move("cvs", Input::file('cv')->getClientOriginalName());

        return Redirect::route('candidates');
    }

    public function delete($id)
    {
        $candidate = $this->candidateRepo->find($id);

        return View::make('candidates/delete', compact('candidate'));
    }

    public function destroy($id)
    {

        $candidate = $this->candidateRepo->find($id);

        $candidate->delete();

        return Redirect::route('candidates');
    }


    public function filterReport()
    {
        $titles  = $this->titleRepo->getList();

        return View::make('candidates/report', compact('titles'));
       
    }

    public function filterReportSearch()
    {
        $title      = Input::get('title');

        $candidates = $this->candidateRepo->getFilterList($status,$title,$center,$supervisor);

        return View::make('candidates/show-report', compact('candidates'));
    }


} 