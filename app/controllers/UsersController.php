<?php

use AdminRH\Entities\User;
use AdminRH\Repositories\UserRepo;
use AdminRH\Managers\RegisterManager;
use AdminRH\Managers\AccountManager;
use AdminRH\Managers\ProfileManager;

class UsersController extends BaseController {

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function signUp()
    {
        return View::make('users/sign-up');
    }

    public function register()
    {
        $user = $this->userRepo->newUser();
        $manager = new RegisterManager($user, Input::all());
        $manager->save();

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

    public function show()
    {
        $users = $this->userRepo->getListPaginate();

        return View::make('users/show', compact('users'));
    }

    public function edit($id)
    {
        $user = $this->userRepo->find($id);
        return View::make('users/edit', compact('user'));
    }

    public function update($id)
    {
        $user = $this->userRepo->find($id);
        //dd($user);
        $manager = new AccountManager($user, Input::all());

        $manager->save();

        return Redirect::route('users');
    }

} 