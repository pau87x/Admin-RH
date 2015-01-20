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

    public function getFilterList($title)
    {

        // $candidates = Candidate::with('changes')->whereHas('changes', function($q) use ($title){

        //     if($title!='')
        //         $q->where('title_id', '=', $title);

        // })->get();
        
        return $candidates;
    }

    public function newCandidate()
    {
        $candidate = new Candidate();
        return $candidate;
    }

} 