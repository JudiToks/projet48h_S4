<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url(); ?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/homeCustomer.css">
</head>
<body>
<div class="header">
    <div class="top-nav">
        <ul>
            <li><a href="#">ACCEUIL</a></li>
            <li><a href="#">ACTIVITES</a></li>
            <li><a href="#">SUIVIS</a></li>
            <li><a href="#">COMMENCER UN REGIME</a></li>
        </ul>
        <div class="search-bar">
            <input type="text" name="search" placeholder="Recherche">
            <button type="submit"><img src="<?php echo base_url(); ?>assets/img/magnifying-glass.png" alt="Search"></button>
        </div>
        <div class="wallet">
            <div class="wallet-icon">
                <i class="zmdi zmdi-plus"></i>
            </div>
            <div class="wallet-content">
                <h5 class="amount" id="wallet-amount">2500000</h5>
                <span class="currency">Token</span>
                <script>
                    // Récupérer l'élément du montant du wallet
                    const walletAmount = document.getElementById('wallet-amount');

                    // Fonction pour mettre à jour le contenu et le style du wallet
                    function updateWallet(amount) {
                        // Mettre à jour le contenu du wallet avec le nouveau montant
                        walletAmount.textContent = amount;

                        // Mettre à jour le style du wallet en fonction de la longueur du montant
                        const amountLength = amount.toString().length;
                        const minWidth = amountLength * 16 + 40; // Calculer la large
                    }
                </script>
            </div>
        </div>
        <div class="account-wrap">
            <div class="account-item clearfix js-item-menu">
                <div class="image">
                    <img src="<?php echo base_url(); ?>assets/img/avatar-01.jpg" alt="nomena" />
                </div>
                <div class="content">
                    <a class="js-acc-btn" href="#">Nomena</a>
                </div>
                <div class="account-dropdown js-dropdown">
                    <div class="info clearfix">
                        <div class="image">
                            <a href="#">
                                <img src="<?php echo base_url(); ?>assets/img/avatar-01.jpg" alt="nomena" />
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="name">
                                <a href="#">Nomena</a>
                            </h5>
                            <span class="email">nomena@example.com</span>
                        </div>
                    </div>

                    <div class="account-dropdown__footer">
                        <a href="#"><i class="zmdi zmdi-power"></i>Deconnexion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="side-nav">
        <img src="<?php echo base_url(); ?>assets/img/logo1-removebg-preview (2).png" class="logo">
        <a href="#">Re-GYM</a>
    </div>
    <div class="text-box">
        <p>Mangez bien,</p>
        <h1>Vivez
            mieux!</h1>
        <div class="icon">
            <img src="<?php echo base_url(); ?>assets/img/arrow.png">
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script></script>
<script src="<?php echo base_url(); ?>assets/vendor/wow/wow.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/animsition/animsition.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>
</html>
