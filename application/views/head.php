<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>E-COMM</title>
    <link href="<?=base_url()?>asset/css/normalize.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script src="<?=base_url()?>asset/js/script.js"></script>
    <link href="<?=base_url()?>asset/css/stylesheet.css" rel="stylesheet" type="text/css">

</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="<?= site_url('/home') ?>">Accueil</a></li>
            <li class="product"><a href="<?= site_url('/product/all_product') ?>">Produit</a></li>
            <li><a href="<?= site_url('/user/login') ?>">Connexion</a></li>
            <li><a href="<?= site_url('/user/logout') ?>">Déconnexion</a></li>
            <li><a href="<?= site_url('/panier/list_product/')?>">Panier</a></li>
        </ul>
    </nav>
</header>

<?php $this->load->view('menu') ?>


<div class="container">