<?php


class UsersController
{
    public function index(){
        $users = App::get('database')->all('users');

        return view('users', [
            'users' => $users
        ]);
    }

    public function store(){
//        App::get('database')->insert('users', []);

        return redirect('users');
    }
}