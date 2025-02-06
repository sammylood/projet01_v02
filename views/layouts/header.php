<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Travail Pratique 1 — Catalogue de produits ">
    <meta name="author" content="Samuel Dorneval - No d'étudiant: 0366635">
    <meta name="keywords" content="Page de catalogue de produits">
    <title>{{ title }}</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset}}css/main.css">
    <script src="{{asset}}js/script.js"></script>
</head>

<body>
    <nav role="menubar">
        <div class="topnav container" id="myTopnav">
            <a href="{{ base }}/client/home" class="logo" role="menuitem"><img src="{{asset}}images/logo-3.png" alt="logo"></a>
            <div class="liens-nav">
                <a href="{{ base }}/client/home" role="menuitem">Accueil</a>
                <a href="{{ base }}/client/catalogue" role="menuitem">À propos</a>
                <div class="dropdown">
                    <bouton class="dropbtn">Enchères ▾</bouton>
                    <div class="dropdown-content">
                        <a href="{{ base }}/client/catalogue-passe" role="menuitem">Enchères passées </a>
                        <a href="{{ base }}/client/catalogue" role="menuitem">Enchères en cours</a>
                    </div>
                </div>
                <a href="{{ base }}/client/catalogue" role="menuitem">À propos de Lord Stampee III</a>
                <a href="{{ base }}/client/catalogue" role="menuitem">Contact</a>
            </div>
            <div class="search-user">
                <a href="{{ base }}/clients" class="search"><i class="fa fa-search"></i></a>
                <a href="{{ base }}/client/compte" class="user"><i class="fa fa-user"></i></a>
            </div>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
    </nav>
    <main>