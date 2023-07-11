<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix Régime</title>
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/regime/insertion_regime.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/regime/bootstrap.min.css">
</head>
<form action="<?php echo site_url('balita/receive_choix_regime'); ?>" method="post">

    <body>
        <div class="container">
            <div class="row">
                <div class="card col-5">
                    <img src="<?php echo base_url('assets'); ?>/images/gagner.jpg">
                    <div class="card-body">
                        <h5 class="card-title">Prendre du poids</h5>
                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo quae beatae laboriosam sit sint asperiores quaerat atque iste eveniet soluta earum, exercitationem error est enim distinctio delectus vero temporibus inventore!</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="checkgain" id="flexRadioDefault1" value="gagne" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                GAIN
                            </label>
                        </div>

                    </div>
                </div>
                <div class="card col-5">
                    <img src="<?php echo base_url('assets'); ?>/images/perdre.jpeg">
                    <div class="card-body">
                        <h5 class="card-title">Perdre du poids</h5>
                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo quae beatae laboriosam sit sint asperiores quaerat atque iste eveniet soluta earum, exercitationem error est enim distinctio delectus vero temporibus inventore!</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="checkgain" id="flexRadioDefault2" value="perdre">
                            <label class="form-check-label" for="flexRadioDefault2">
                                PERDRE
                            </label>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-5">
                    <p> Poids à perdre ou à gagner </p>
                    <input class="form-control" name="gain" type="number" placeholder="en kilos" min="1">
                </div>
                <div class="col-5">
                    <p> Date de début du régime </p>
                    <input class="form-control" name="debut" type="date">
                </div>
            </div>
        </div>
    </body>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>

</form>

</html>