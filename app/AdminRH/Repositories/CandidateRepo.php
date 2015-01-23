<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Candidate;
use DB;

class CandidateRepo extends BaseRepo {

    public function getModel()
    {
        return new Candidate;
    }

    public function getList()
    {
       return Candidate::get();
    }

    public function getListPaginate()
    {
       return Candidate::paginate(10);
    }

    public function getCurrentPaginate()
    {   
        $candidates = Candidate::with('position')->whereHas('position', function($q){

                $q->where('current', '=', '1');

         })->paginate(10);
        return $candidates;

    }

    public function newCandidate()
    {
        $candidate = new Candidate();
        return $candidate;
    }

} 