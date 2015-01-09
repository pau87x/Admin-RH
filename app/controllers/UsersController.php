<?php

use AdminRH\Entities\User;
//use AdminRH\Repositories\UserRepo;
use AdminRH\Managers\RegisterManager;
use AdminRH\Managers\AccountManager;
use AdminRH\Managers\ProfileManager;

class UsersController extends BaseController {

    protected $candidateRepo;
    protected $categoryRepo;

    // public function __construct(UserRepo $userRepo)
    // {
    //     $this->userRepo = $userRepo;
    // }

    public function signUp()
    {
        return View::make('users/sign-up');
    }

    public function register()
    {
        // $user = $this->userRepo->newUser();
        // $manager = new RegisterManager($user, Input::all());
        // $manager->save();

        return Redirect::route('home');
    }

    public function account()
    {
        $user = Auth::user();
        return View::make('users/account', compact('user'));
    }

    public function updateAccount()
    {
        $user = Auth::user();
        $manager = new AccountManager($user, Input::all());

        $manager->save();

        return Redirect::route('home');
    }

    // public function profile()
    // {
    //     $user = Auth::user();
    //     $candidate = $user->getCandidate();

    //     $categories = $this->categoryRepo->getList();
    //     $job_types  = \Lang::get('utils.job_types');

    //     return View::make('users/profile', compact('user', 'candidate', 'categories', 'job_types'));
    // }

    // public function updateProfile()
    // {
    //     $user = Auth::user();
    //     $candidate = $user->getCandidate();
    //     $manager = new ProfileManager($candidate, Input::all());

    //     $manager->save();

    //     return Redirect::route('home');
    // }

} 