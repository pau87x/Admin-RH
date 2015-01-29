<?php

use AdminRH\Repositories\CandidateRepo;
use AdminRH\Repositories\CityRepo;
use AdminRH\Repositories\StateRepo;
use AdminRH\Repositories\PositionRepo;
use AdminRH\Repositories\CenterRepo;
use AdminRH\Repositories\EducationRepo;
use AdminRH\Repositories\ExperienceRepo;
use AdminRH\Managers\CandidateManager;
use AdminRH\Managers\CandidateEditManager;
use AdminRH\Managers\CandidateAddCVManager;


class CandidatesController extends BaseController {

    protected $candidateRepo;
    protected $cityRepo;
    protected $stateRepo;
    protected $positionRepo;
    protected $educationRepo;
    protected $experienceRepo;

    public function __construct(CandidateRepo $candidateRepo,
                                CityRepo $cityRepo,
                                StateRepo $stateRepo,
                                PositionRepo $positionRepo,
                                EducationRepo $educationRepo,
                                ExperienceRepo $experienceRepo)
    {
        $this->candidateRepo = $candidateRepo;
        $this->cityRepo      = $cityRepo;
        $this->stateRepo     = $stateRepo;
        $this->positionRepo  = $positionRepo;
        $this->educationRepo  = $educationRepo;
        $this->experienceRepo  = $experienceRepo;
    }

    public function show()
    {
        $candidates = $this->candidateRepo->getCurrentPaginate();

        return View::make('candidates/show', compact('candidates'));
    }

    public function showAll()
    {
        $candidates = $this->candidateRepo->getListPaginate();

        return View::make('candidates/show', compact('candidates'));
    }

    public function searchCandidates()
    {
        $q = e(Input::get('q',''));
        $candidates = $this->candidateRepo->searchCandidates($q);

        return View::make('candidates/show-search', compact('candidates'));
    }

    public function showCandidate($id)
    {
        $candidate   = $this->candidateRepo->find($id);
        $education   = $this->educationRepo->getAll($id);
        $experiences = $this->experienceRepo->getAll($id);

        return View::make('candidates/show-candidate', compact('candidate','education','experiences'));
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
        
        if($manager->save())
            Session::flash('alert-success', 'El candidato se ha creado con éxito');
        else
            Session::flash('alert-danger', 'Ha ocurrido un error al crear el candidato');

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

        $manager  = new CandidateEditManager($candidate, Input::all());
        
        if($manager->save())
            Session::flash('alert-success', 'Se han modificado los datos con éxito');
        else
            Session::flash('alert-danger', 'Ha ocurrido un error al actualizar los datos');

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

        if($candidate->delete())
            Session::flash('alert-success', 'Se han eliminado al candidato');
        else
            Session::flash('alert-danger', 'Ha ocurrido un error al eliminar al candidato');

        return Redirect::route('candidates');
    }

    public function reclute($id)
    {
        $candidate = $this->candidateRepo->find($id);

        $this->notFoundUnless($candidate);

        $birthdate = str_replace("/","-",$candidate->birthdate);
        $candidate->birthdate = date("d/m/Y", strtotime($birthdate));

        $genres     = \Lang::get('utils.genre');
        $states     = $this->stateRepo->getList();
        $position   = $candidate->position;

        return View::make('candidates/reclute', compact('candidate','genres','states','position'));
    }

    public function addCurriculum($id)
    {
        $candidate = $this->candidateRepo->find($id);

        $this->notFoundUnless($candidate);

        return View::make('candidates/add-curriculum', compact('candidate'));
    }

    public function saveCurriculum($id)
    {
        $candidate = $this->candidateRepo->find($id);

        $manager  = new CandidateAddCVManager($candidate, Input::all());
        $manager->save();

       // return Response::json(array('name' => 'Steve', 'state' => 'CA'));
        return Redirect::route('edit_candidate', $id);
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

    public function toExcel()
    {

        $candidates = $this->candidateRepo->getList();

        Excel::create('Candidatos', function($excel) use ($candidates){ //Archivo

            $excel->sheet('candidatos', function($sheet) use ($candidates){ //Hoja

                $data = [];
                array_push($data, ["Nombre Completo","Correo electrónico","Tel. Cel"]);
                
                foreach ($candidates as $candidate) {
                    array_push($data, [$candidate->full_name,$candidate->email,$candidate->cell_phone]);
                }
                $sheet->fromArray($data,null,'A1',false,false);

            });

        })->export('xls');
        
    }

} 