<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css">
</head>
<body>
<main>
    <div class="box">
        <div class="inner-box">
            <div class="forms-wrap">
                <form action="index.html" autocomplete="off" class="sign-in-form">
                    <div class="logo">
                        <img src="<?php echo base_url(); ?>assets/img/logo2.png" />
                        <h4>Re-GYM</h4>
                    </div>

                    <div class="heading">
                        <h2>Content de te revoir</h2>
                        <h6>Pas encore inscrit?</h6>
                        <a href="#" class="toggle">S'inscrire</a>
                    </div>

                    <div class="actual-form">
                        <div class="input-wrap">
                            <input
                                type="text"
                                minlength="4"
                                class="input-field"
                                autocomplete="off"
                                required
                            />
                            <label>Nom</label>
                        </div>

                        <div class="input-wrap">
                            <input
                                type="password"
                                minlength="4"
                                class="input-field"
                                autocomplete="off"
                                required
                            />
                            <label>Mot de passe</label>
                        </div>

                        <input type="submit" value="Se connecter" class="sign-btn" />

                        <!-- <p class="text">
                          Mot de passe oublié ou données de connexion oubliées ?
                          <a href="#">Get help</a> signing in
                        </p> -->
                    </div>
                </form>

                <form action="index.html" autocomplete="off" class="sign-up-form">
                    <div class="logo">
                        <img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="" />
                        <h4>Re-GYM</h4>
                    </div>

                    <div class="heading">
                        <h2>Commencer</h2>
                        <h6>Avez-vous déjà un compte?</h6>
                        <a href="#" class="toggle">S'identifier</a>
                    </div>

                    <div class="actual-form">
                        <div class="input-wrap">
                            <input
                                type="text"
                                minlength="4"
                                class="input-field"
                                autocomplete="off"
                                required
                            />
                            <label>Nom</label>
                        </div>

                        <div class="input-wrap">
                            <input
                                type="email"
                                class="input-field"
                                autocomplete="off"
                                required
                            />
                            <label>Email</label>
                        </div>

                        <div class="input-wrap">
                            <input
                                type="password"
                                minlength="4"
                                class="input-field"
                                autocomplete="off"
                                required
                            />
                            <label>Mot de passe</label>
                        </div>

                        <input type="submit" value="S'inscrire" class="sign-btn" />

                        <!-- <p class="text">
                          By signing up, I agree to the
                          <a href="#">Terms of Services</a> and
                          <a href="#">Privacy Policy</a>
                        </p> -->
                    </div>
                </form>
            </div>

            <div class="carousel">
                <div class="images-wrapper">
                    <img src="<?php echo base_url(); ?>assets/img/image1.png" class="image img-1 show" alt="" />
                    <img src="<?php echo base_url(); ?>assets/img/image2.png" class="image img-2" alt="" />
                    <img src="<?php echo base_url(); ?>assets/img/image3.png" class="image img-3" alt="" />
                </div>

                <div class="text-slider">
                    <div class="text-wrap">
                        <div class="text-group">
                            <h2>Équilibrez votre assiette
                            </h2>
                            <h2>Le succès commence par une alimentation saine : rejoignez-nous !</h2>
                            <h2>Slogan 3 du projet</h2>
                        </div>
                    </div>

                    <div class="bullets">
                        <span class="active" data-value="1"></span>
                        <span data-value="2"></span>
                        <span data-value="3"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Javascript file -->
<script src="<?php echo base_url(); ?>assets/js/login.js"></script>
</body>
</html>
