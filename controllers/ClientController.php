<?php

namespace App\Controllers;

use App\Models\Clients;
use App\Models\Achats;
use App\Models\Succursales;
use App\Models\Voitures;
use App\Models\Encheres;
use App\Models\Timbres;
use App\Models\Images;
use App\Models\Mises;
use App\Models\Countries;
use App\Models\Conditions;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

class ClientController
{

    public function __construct()
    {
        // Auth::session();
    }
    public function accueil()
    {
        $client = new Clients;

        $clients = $client->select('nom');
        if ($clients) {
            return View::render('client/catalogue', ['clients' => $clients]);
        } else {
            echo "error";
        }
    }

    public function home()
    {

        $enchere = new Encheres;
        $encheres = $enchere->select('date_debut');

        $timbre = new Timbres;
        $timbres = $timbre->select('nom');

        $image = new Images;
        $images = $image->select('image_url');

        if ($encheres) {
            return View::render('client/home', ['encheres' => $encheres, 'timbres' => $timbres, 'images' => $images]);
        } else {
            echo "error";
        }
    }

    public function catalogue()
    {
        $enchere = new Encheres;
        $encheres = $enchere->select('date_debut');

        $timbre = new Timbres;
        $timbres = $timbre->select('nom');

        $image = new Images;
        $images = $image->select('image_url');

        if ($encheres) {
            return View::render('client/catalogue', ['encheres' => $encheres, 'timbres' => $timbres, 'images' => $images]);
        } else {
            echo "error";
        }
    }


    public function index()
    {
        // Auth::session();
        $client = new Clients;
        $clients = $client->select('nom');

        $achat = new Achats;
        $achats = $achat->select('date_achat');


        $succursale = new Succursales;
        $succursales = $succursale->select('nom');

        $voiture = new Voitures;
        $voitures = $voiture->select('modele');


        if ($clients) {
            return View::render('client/index', ['clients' => $clients, 'modeles' => $voitures, 'succursales' => $succursales, 'achats' => $achats]);
        } else {
            echo "error";
        }
    }

    // pour la page compte.php

    public function compte()
    {
        Auth::session();

        $enchere = new Encheres;
        $encheres = $enchere->select('date_debut');

        $timbre = new Timbres;
        $timbres = $timbre->select('nom');

        $image = new Images;
        $images = $image->select('image_url');

        $mise = new Mises;
        $mises = $mise->select('montant_mise');

        $country = new Countries;
        $countries = $country->select('country_name');

        $condition = new Conditions;
        $conditions = $condition->select('niveau');

        $client = new Clients;
        $clients = $client->select('nom');

        $achat = new Achats;
        $achats = $achat->select('date_achat');

        $succursale = new Succursales;
        $succursales = $succursale->select('nom');

        $voiture = new Voitures;
        $voitures = $voiture->select('modele');

        if ($timbres) {
            return View::render('client/compte', ['clients' => $clients, 'modeles' => $voitures, 'succursales' => $succursales, 'achats' => $achats, 'encheres' => $encheres, 'timbres' => $timbres, 'images' => $images, 'mises' => $mises, 'countries' => $countries, 'conditions' => $conditions]);
        } else {
            echo "error";
        }
    }


    // Pour la page
    public function miser($data = [])
    {
        Auth::session();
        if (isset($data['id']) && $data['id'] != null) {
            // print_r($data);
            // die();

            $enchereList = new Encheres;
            $encheresList = $enchereList->select('date_debut');

            $encheres = new Encheres;
            $selectId = $encheres->selectId($data['id']);

            $timbre = new Timbres;
            $timbres = $timbre->select('nom');

            $image = new Images;
            $images = $image->select('image_url');

            $mise = new Mises;
            $mises = $mise->select('montant_mise');

            if ($selectId) {
                return View::render('client/produit', ['encheresList' => $encheresList, 'encheres' => $selectId, 'timbres' => $timbres, 'images' => $images, 'mises' => $mises]);
            } else {
                return View::render('error', ['msg' => 'Enchère non trouvée']);
            }
        }
        return View::render('error');
    }


    public function storeMiser($data)
    {
        // print_r($data);
        $validator = new Validator;
        // $validator->field('nom', $data['nom'])->min(2)->max(10);
        // $validator->field('adresse', $data['adresse'])->required();
        // $validator->field('tel', $data['tel'])->required();
        // $validator->field('zip_code', $data['zip_code'], 'Zip Code')->required();
        // $validator->field('courriel', $data['courriel'])->email()->required();
        // $validator->field('id_voiture', $data['voiture_id'], 'Voiture')->required();
        // $validator->field('id_succursale', $data['id_succursale'], 'Succursale')->required();

        if ($validator->isSuccess()) {


            $mise = new Mises;
            $insert = $mise->insert($data);

            if ($insert) {
                return View::redirect('client/compte');
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            // print_r( $errors);

            $enchere = new Encheres;
            $encheres = $enchere->select('date_debut');

            $timbre = new Timbres;
            $timbres = $timbre->select('nom');

            $image = new Images;
            $images = $image->select('image_url');

            $mise = new Mises;
            $mises = $mise->select('montant_mise');

            return View::render('client/create', ['errors' => $errors, 'inputs' => $data, 'encheres' => $encheres, 'timbres' => $timbres, 'images' => $images, 'mises' => $mises]);
        }
    }



    public function show($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {
            // print_r($data);
            // die();
            $encheres = new Encheres;
            $selectId = $encheres->selectId($data['id']);

            $client = new Clients;
            $clients = $client->selectId($data['id']);

            $voiture = new Voitures;
            $voitures = $voiture->select('modele');

            $succursale = new Succursales;
            $succursales = $succursale->select('nom');

            if ($selectId) {
                return View::render('client/show', ['achat' => $selectId, 'clients' => $clients, 'modeles' => $voitures, 'succursales' => $succursales]);
            } else {
                return View::render('error', ['msg' => 'Could not find this client']);
            }
        }
        return View::render('error');
    }

    public function create()
    {
        Auth::session();

        $enchere = new Encheres;
        $encheres = $enchere->select('date_debut');

        $timbre = new Timbres;
        $timbres = $timbre->select('nom');

        $image = new Images;
        $images = $image->select('image_url');

        $mise = new Mises;
        $mises = $mise->select('montant_mise');

        $country = new Countries;
        $countries = $country->select('country_name');

        $condition = new Conditions;
        $conditions = $condition->select('niveau');

        $client = new Clients;
        $clients = $client->select('nom');

        $voiture = new Voitures;
        $voitures = $voiture->select('modele');

        $succursale = new Succursales;
        $succursales = $succursale->select('nom');

        return View::render('client/create', ['clients' => $clients, 'modeles' => $voitures, 'succursales' => $succursales, 'encheres' => $encheres, 'timbres' => $timbres, 'images' => $images, 'mises' => $mises, 'countries' => $countries, 'conditions' => $conditions]);
    }

    public function store($data)
    {
        // print_r($data);
        $validator = new Validator;
        // $validator->field('nom', $data['nom'])->min(2)->max(10);
        // $validator->field('adresse', $data['adresse'])->required();
        // $validator->field('tel', $data['tel'])->required();
        // $validator->field('zip_code', $data['zip_code'], 'Zip Code')->required();
        // $validator->field('courriel', $data['courriel'])->email()->required();
        // $validator->field('id_voiture', $data['voiture_id'], 'Voiture')->required();
        // $validator->field('id_succursale', $data['id_succursale'], 'Succursale')->required();

        if ($validator->isSuccess()) {


            $timbre = new Timbres;
            $insert = $timbre->insert($data);

            if ($insert) {
                return View::redirect('client/uploadImage');
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            // print_r( $errors);

            $client = new Clients;
            $clients = $client->select('nom');

            $voiture = new Voitures;
            $voitures = $voiture->select('modele');

            $succursale = new Succursales;
            $succursales = $succursale->select('nom');


            $enchere = new Encheres;
            $encheres = $enchere->select('date_debut');

            $timbre = new Timbres;
            $timbres = $timbre->select('nom');

            $image = new Images;
            $images = $image->select('image_url');

            $mise = new Mises;
            $mises = $mise->select('montant_mise');

            $country = new Countries;
            $countries = $country->select('country_name');

            $condition = new Conditions;
            $conditions = $condition->select('niveau');


            return View::render('client/create', ['errors' => $errors, 'inputs' => $data, 'clients' => $clients, 'modeles' => $voitures, 'succursales' => $succursales, 'encheres' => $encheres, 'timbres' => $timbres, 'images' => $images, 'mises' => $mises, 'countries' => $countries, 'conditions' => $conditions]);
        }
    }



    public function upload()
    {
        Auth::session();

        $enchere = new Encheres;
        $encheres = $enchere->select('date_debut');

        $timbre = new Timbres;
        $timbres = $timbre->select('nom');

        $image = new Images;
        $images = $image->select('image_url');

        $mise = new Mises;
        $mises = $mise->select('montant_mise');

        $country = new Countries;
        $countries = $country->select('country_name');

        $condition = new Conditions;
        $conditions = $condition->select('niveau');

        $client = new Clients;
        $clients = $client->select('nom');

        $voiture = new Voitures;
        $voitures = $voiture->select('modele');

        $succursale = new Succursales;
        $succursales = $succursale->select('nom');

        return View::render('client/uploadImage', ['clients' => $clients, 'modeles' => $voitures, 'succursales' => $succursales, 'encheres' => $encheres, 'timbres' => $timbres, 'images' => $images, 'mises' => $mises, 'countries' => $countries, 'conditions' => $conditions]);
    }



    public function storeUpload()
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $validator = new Validator;
        // $validator->field('nom', $data['nom'])->min(2)->max(10);
        
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            var_dump($_FILES);

            
            $image_url = ($_FILES["fileToUpload"]["name"]);
            echo "nom d'image " . $image_url;
            $imageTable = ['', $image_url, '1', '15'];
// die();
            $image = new Images;
            $insert = $image->insert($imageTable);
            
            
            echo "<br> ";
            var_dump($imageTable);
            die();
            if ($insert) {
                return View::redirect('client/compte');
                
            }

            return View::redirect('client/upload', ['uploadedImage' => $image_url]);
        } else {
            return View::render('error');
        }


        if ($validator->isSuccess()) {


            // $mise = new Mises;
            // $insert = $mise->insert($data);



        } else {
            $errors = $validator->getErrors();
            // print_r( $errors);

            $enchere = new Encheres;
            $encheres = $enchere->select('date_debut');

            $timbre = new Timbres;
            $timbres = $timbre->select('nom');

            $image = new Images;
            $images = $image->select('image_url');

            $mise = new Mises;
            $mises = $mise->select('montant_mise');

            return View::render('client/compte', ['errors' => $errors,  'encheres' => $encheres, 'timbres' => $timbres, 'images' => $images, 'mises' => $mises]);
        }
    }




    public function uploadConfirmation()
    {
        Auth::session();

        $enchere = new Encheres;
        $encheres = $enchere->select('date_debut');

        $timbre = new Timbres;
        $timbres = $timbre->select('nom');

        $image = new Images;
        $images = $image->select('image_url');

        $mise = new Mises;
        $mises = $mise->select('montant_mise');

        $country = new Countries;
        $countries = $country->select('country_name');

        $condition = new Conditions;
        $conditions = $condition->select('niveau');

        $client = new Clients;
        $clients = $client->select('nom');

        $voiture = new Voitures;
        $voitures = $voiture->select('modele');

        $succursale = new Succursales;
        $succursales = $succursale->select('nom');

        return View::render('client/upload', ['clients' => $clients, 'modeles' => $voitures, 'succursales' => $succursales, 'encheres' => $encheres, 'timbres' => $timbres, 'images' => $images, 'mises' => $mises, 'countries' => $countries, 'conditions' => $conditions]);
    }



    public function storeUploadConfirmation()
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $validator = new Validator;
        // $validator->field('nom', $data['nom'])->min(2)->max(10);

        if ($validator->isSuccess()) {



            var_dump($_FILES);

            die();

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                return View::redirect('client/compte');
            } else {
                return View::render('error');
            }
        } else {
            $errors = $validator->getErrors();
            // print_r( $errors);

            $enchere = new Encheres;
            $encheres = $enchere->select('date_debut');

            $timbre = new Timbres;
            $timbres = $timbre->select('nom');

            $image = new Images;
            $images = $image->select('image_url');

            $mise = new Mises;
            $mises = $mise->select('montant_mise');

            return View::render('client/compte', ['errors' => $errors, 'inputs' => $data, 'encheres' => $encheres, 'timbres' => $timbres, 'images' => $images, 'mises' => $mises]);
        }
    }






    public function edit($data = [])
    {
        if (isset($data['id']) && $data['id'] != null) {

            $achat = new Achats;
            $selectId = $achat->selectId($data['id']);
            if ($selectId) {
                $client = new Clients;
                $clients = $client->selectId($data['id']);

                $voiture = new Voitures;
                $voitures = $voiture->select('modele');

                $succursale = new Succursales;
                $succursales = $succursale->select('nom');
                //print_r($selectId);
                return View::render('client/edit', ['clients' => $clients, 'modeles' => $voitures, 'succursales' => $succursales, 'inputs' => $selectId]);
            }
        }
        return View::render('error');
    }


    public function update($data = [], $get = [])
    {
        if (isset($get['id']) && $get['id'] != null) {
            $validator = new Validator;
            $validator->field('nom', $data['nom'])->min(2)->max(45);
            $validator->field('adresse', $data['adresse'])->max(45);
            $validator->field('tel', $data['tel'])->max(20);
            $validator->field('code_postal', $data['code_postal'])->max(10);
            $validator->field('courriel', $data['courriel'])->email()->max(45);

            if ($validator->isSuccess()) {
                $client = new Clients;
                $update = $client->update($data, $get['id']);
                if ($update) {
                    return View::redirect('client/show?id=' . $get['id']);
                }
            } else {
                $errors = $validator->getErrors();
                // print_r( $errors);
                $achat = new Achats;
                $selectId = $achat->selectId($data['id']);

                $voiture = new Voitures;
                $voitures = $voiture->select('modele');

                $succursale = new Succursales;
                $succursales = $succursale->select('nom');

                return View::render('client/edit', ['errors' => $errors, 'inputs' => $data, 'modeles' => $voitures, 'succursales' => $succursales,]);
            }
        }
        return View::render('error');
    }


    public function delete($data)
    {
        $achat = new Achats;
        $delete = $achat->delete($data['id']);
        if ($delete) {
            return View::redirect('clients');
        }
        return View::render('error');
    }
}
