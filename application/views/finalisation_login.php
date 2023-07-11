<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Finalisation login </title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/profil.css">
</head>
<body>

<div class="main">

    <div class="container">

        <h2><img src="<?php echo base_url(); ?>assets/images/logo6.png" style=" height: 110px;"></h2>
        <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
            <h3>
                A remplir
            </h3>
            <fieldset>
                <div class="form-row">
                    <div class="form-file">
                        <input type="file" class="inputfile" name="your_picture" id="your_picture"  onchange="readURL(this);" data-multiple-caption="{count} files selected" multiple />
                        <label for="your_picture">
                            <figure>
                                <img src="<?php echo base_url(); ?>assets/images/your-picture.png" alt="" class="your_picture_image">
                            </figure>
                            <span class="file-button">Choisir la photo</span>
                        </label>
                    </div>
                    <div class="form-group-flex">
                        <div class="form-group">
                            <input type="text" name="poids" id="poids" placeholder="Poids" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="taille" id="taille" placeholder="Taille" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="age" id="age" placeholder="Âge" />
                        </div>
                    </div>
                </div>
            </fieldset>

            <h3>
                Adresse
            </h3>
            <fieldset>
                <div class="form-row form-input-flex">
                    <div class="form-input">
                        <input type="text" name="Adresse" id="street_name" placeholder="Adresse" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

</div>

<!-- JS -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-validation/dist/additional-methods.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/finalisation_login.js"></script>

</body>
</html>