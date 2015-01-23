<?php

use AdminRH\Repositories\EducationRepo;
use AdminRH\Repositories\CandidateRepo;
use AdminRH\Managers\EducationManager;

class EducationController extends BaseController {

    protected $educationRepo;
    protected $candidateRepo;

    public function __construct(EducationRepo $educationRepo,
                                CandidateRepo $candidateRepo)
    {
        $this->educationRepo = $educationRepo;
        $this->candidateRepo = $candidateRepo;
    }

    public function show($id)
    {
        $education = $this->educationRepo->getAll($id);

        return View::make('education/show', compact('education'));
    }

    public function create($id)
    {
        $candidate = $this->candidateRepo->find($id);
        return View::make('education/new', compact('candidate'));
    }

    public function register($id)
    {
        $candidate = $this->candidateRepo->find($id);
        $education = $this->educationRepo->newEducation();

        $candidate_id = $id;
        Input::merge(array('candidate_id' => $candidate_id));

        $manager = new EducationManager($education, Input::all());
        $manager->save();

        return Redirect::route('show_candidate',$candidate_id);
    }

    public function edit($id)
    {
        $education = $this->educationRepo->find($id);

        $this->notFoundUnless($education);

        $candidate_id = $education->candidate_id;


        $candidate = $this->candidateRepo->find($candidate_id);

        $start = str_replace("/","-",$education->start);
        $education->start = date("d/m/Y", strtotime($start));

        $end = str_replace("/","-",$education->end);
        $education->end = date("d/m/Y", strtotime($end));

        return View::make('education/edit', compact('education','candidate'));
    }

    public function update($id)
    {
        $education = $this->educationRepo->find($id);

        $this->notFoundUnless($education);

        $candidate_id = $education->candidate_id;

        $candidate = $this->candidateRepo->find($candidate_id);
        Input::merge(array('candidate_id' => $candidate_id));


        $manager = new EducationManager($education, Input::all());

        $manager->save();

        return Redirect::route('show_candidate',$candidate_id);
    }

    public function delete($id)
    {
        $education = $this->educationRepo->find($id);

        $candidate_id = $education->candidate_id;

        $candidate = $this->candidateRepo->find($candidate_id);

        $this->notFoundUnless($education);

        return View::make('education/delete', compact('education','candidate'));
    }

    public function destroy($id)
    {

        $education = $this->educationRepo->find($id);

        $this->notFoundUnless($education);

        $candidate_id = $education->candidate_id;

        $education->delete();

        return Redirect::route('show_candidate',$candidate_id);

    }

} 