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

        if($manager->save())
            Session::flash('alert-success', 'El usuario se ha creado con éxito');
        else
            Session::flash('alert-danger', 'Ha ocurrido un error al crear el usuario');

        return Redirect::route('users');
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

        if($manager->save())
            Session::flash('alert-success', 'Se han modificado tus datos con éxito');
        else
            Session::flash('alert-danger', 'Ha ocurrido un error al actualizar tus datos');

        return Redirect::route('home');
    }

    public function show()
    {
        $users = $this->userRepo->getListPaginate();

        return View::make('users/show', compact('users'));
    }

    public function searchUsers()
    {
        $q = e(Input::get('q',''));
        $users = $this->userRepo->searchUsers($q);

        return View::make('users/show-search', compact('users'));
    }

    public function edit($id)
    {
        $user = $this->userRepo->find($id);
        return View::make('users/edit', compact('user'));
    }

    public function update($id)
    {
        $user = $this->userRepo->find($id);
        $manager = new AccountManager($user, Input::all());

        if($manager->save())
            Session::flash('alert-success', 'Se han modificado los datos con éxito');
        else
            Session::flash('alert-danger', 'Ha ocurrido un error al actualizar los datos');

        return Redirect::route('users');
    }

} 