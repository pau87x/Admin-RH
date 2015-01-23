<?php

use AdminRH\Repositories\ExperienceRepo;
use AdminRH\Repositories\CandidateRepo;
use AdminRH\Managers\ExperienceManager;

class ExperiencesController extends BaseController {

    protected $experienceRepo;
    protected $candidateRepo;

    public function __construct(ExperienceRepo $experienceRepo,
                                CandidateRepo $candidateRepo)
    {
        $this->experienceRepo = $experienceRepo;
        $this->candidateRepo = $candidateRepo;
    }

    public function show($id)
    {
        $experiences = $this->experienceRepo->getAll($id);

        return View::make('experiences/show', compact('experiences'));
    }

    public function create($id)
    {
        $candidate = $this->candidateRepo->find($id);
        return View::make('experiences/new', compact('candidate'));
    }

    public function register($id)
    {
        $candidate = $this->candidateRepo->find($id);
        $experience = $this->experienceRepo->newExperience();

        $candidate_id = $id;
        Input::merge(array('candidate_id' => $candidate_id));
        $manager = new ExperienceManager($experience, Input::all());
        $manager->save();

        return Redirect::route('show_candidate',$candidate_id);
    }

    public function edit($id)
    {
        $experience = $this->experienceRepo->find($id);

        $this->notFoundUnless($experience);

        $candidate_id = $experience->candidate_id;

        $candidate = $this->candidateRepo->find($candidate_id);

        $start = str_replace("/","-",$experience->start);
        $experience->start = date("d/m/Y", strtotime($start));

        $end = str_replace("/","-",$experience->end);
        $experience->end = date("d/m/Y", strtotime($end));

        return View::make('experiences/edit', compact('experience','candidate'));
    }

    public function update($id)
    {
        $experience = $this->experienceRepo->find($id);

        $this->notFoundUnless($experience);

        $candidate_id = $experience->candidate_id;

        $candidate = $this->candidateRepo->find($candidate_id);

        Input::merge(array('candidate_id' => $candidate_id));

        $manager = new ExperienceManager($experience, Input::all());

        $manager->save();

        return Redirect::route('show_candidate',$candidate_id);
    }

    public function delete($id)
    {
        $experience = $this->experienceRepo->find($id);

        $candidate_id = $experience->candidate_id;

        $candidate = $this->candidateRepo->find($candidate_id);

        $this->notFoundUnless($experience);

        return View::make('experiences/delete', compact('experience','candidate'));
    }

    public function destroy($id)
    {

        $experience = $this->experienceRepo->find($id);

        $this->notFoundUnless($experience);

        $candidate_id = $experience->candidate_id;

        $experience->delete();

        return Redirect::route('show_candidate',$candidate_id);

    }

} 