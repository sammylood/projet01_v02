<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Privilege;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class UserController {

    // public function __construct(){
    //     Auth::session();
    //     Auth::privilege(1);
    // }

    /**
     * Afficher la page de liste des Users
     */
    public function index()
    {
        $user = new User;
        $users = $user->select('id');
      
        // print_r($users);
        // die();

        if ($users) {
            return View::render('user/userList', ['user' => $users]);
        } else {
            echo "error";
        }
    }

    /**
     * Afficher les détails d'un User
     */
    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            // print_r($data);
            // die();
            $user = new User;
            $selectId = $user->selectId($data['id']);

            if ($selectId) {
                return View::render('user/userShow', ['user' => $selectId]);
            } else {
                return View::render('error', ['msg' => 'Could not find this client']);
            }
        }
        return View::render('error');
    }

    /**
     * Afficher la page du formulaire de création d'un User
     */
    public function create()
    {
        $user = new User;
        $users = $user->select('name');
        
        // print_r($privileges);
        // die();

        return View::render('user/create', ['users' => $users]);
    }

    public function store($data){
        $validator = new Validator;
        $validator->field('name', $data['name'])->min(2)->max(50);
        $validator->field('username', $data['username'])->min(2)->max(50)->unique('User');
        $validator->field('password', $data['password'])->min(6)->max(20);
    //    $validator->field('privilege_id', $data['privilege_id'], "Privilege")->required()->number();

        if($validator->isSuccess()){
            $user = new User;
            $data['email'] = $data['username'];
            $data['password'] = $user->hashPassword($data['password']);
            // print_r($data);
            // die();

            $insert  = $user->insert($data);
            if($insert){
                return View::redirect('user/userList');
            }else{
                return View::render('error');
            }
        }else{
            $errors = $validator->getErrors();
            $privilege = new Privilege;
            $privileges = $privilege->select();
            return View::render('user/create', ['errors'=>$errors, 'inputs'=>$data, 'privileges' => $privileges]);
        }
    }


    /**
     * afficher la page du formulaire de modification d'un User
     */
    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {

            $user = new User;
            $selectId = $user->selectId($data['id']);
            if ($selectId) {
                $privilege = new Privilege;
                $privileges = $privilege->select();
                return View::render('user/userEdit', ['user' => $user, 'privileges' => $privileges, 'inputs' => $selectId]);
            }
        }
        return View::render('error');
    }

    /**
     * Modifier les information d'un User dans la base de données
     */
    public function update($data = [], $get = [])
    {
        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;
            $validator->field('name', $data['name'])->min(2)->max(45);
            $validator->field('username', $data['username'])->max(45);
           

            if ($validator->isSuccess()) {
                $user = new User;
                $update = $user->update($data, $get['id']);
                if ($update) {
                    return View::redirect('user/userShow?id=' . $get['id']);
                }
            } else {
                $errors = $validator->getErrors();
                // print_r( $errors);
                $inputs = $data;
                return View::render('user/userEdit', ['errors' => $errors, 'inputs' => $inputs]);
            }
        }
        return View::render('error');
    }


    /**
     * Supprimer les informations d'un User dans la base de données
     */
public function delete($data = []){
    $user = new User;
    $delete = $user->delete($data['id']);
    if($delete){
        return View::redirect('user/userList');
    }
    return View::render('error');
}

}