<?php

namespace AdminRH\Repositories;

use AdminRH\Entities\Candidate;
use AdminRH\Entities\Category;
use AdminRH\Entities\User;

class CandidateRepo extends BaseRepo {

    public function getModel()
    {
        return new Candidate;
    }

    public function findLatest($take = 10)
    {
        return Category::with([
            'candidates' => function ($q) use ($take) {
                    $q->take($take);
                    $q->orderBy('created_at', 'DESC');
                },
            'candidates.user'
        ])->get();
    }

    public function newCandidate()
    {
        $user = new User();
        $user->type = 'candidate';
        return $user;
    }

} 