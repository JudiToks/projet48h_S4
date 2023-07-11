    <!-- Libraries Stylesheet -->
    <!-- <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet"> -->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url('assets'); ?>/css/regime/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <!-- Projects Start -->


    <form action="<?php echo site_url('balita/receive_sport'); ?>" method="post">
        <input type="hidden" name="gain" value="<?php echo $gain; ?>">
        <input type="hidden" name="debut" value="<?php echo $debut; ?>">
        <input type="hidden" name="checkgain" value="<?php echo $checkgain; ?>">

        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="text-center mb-5">Choisissez vos sports</h1>
                </div>
                <h5>
                    <i>
                        <u>
                            <center> sport de maison</center>
                        </u>
                    </i>
                </h5>

                <div class="row g-4 portfolio-container">
                    <?php
                    $variable = array();

                    foreach ($maison->result_array() as $m) {
                        $value = $m['idsport']; // Valeur à caster en tant que string
                        $stringValue = $value . ''; // Casting de la valeur en string en concaténant avec une chaîne vide

                        $variable[] = 'sport' . $stringValue;
                    ?>

                        <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                            <div class="rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="<?php echo base_url('assets'); ?>/images/sport/<?php echo $m['img']; ?>" alt="">
                                    <div class="portfolio-overlay">
                                        <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="bg-light p-4">
                                    <p class="text-primary fw-medium mb-2"><?php echo $m['designation']; ?></p>
                                    <h5 class="lh-base mb-0"><?php echo $m['calorie_par_heure']; ?> cal / heure</a>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="<?php echo 'sport', $m['idsport']; ?>" id="flexRadioDefault1" value="oui" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                OUI
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="<?php echo 'sport',  $m['idsport']; ?>" id="flexRadioDefault2" value="non">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                NON
                                            </label>
                                        </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>

                <h5>
                    <i>
                        <u>
                            <center> sport en salles</center>
                        </u>
                    </i>
                </h5>

                <div class="row g-4 portfolio-container">
                    <?php foreach ($salle->result_array() as $m) {
                        $value = $m['idsport']; // Valeur à caster en tant que string
                        $stringValue = $value . ''; // Casting de la valeur en string en concaténant avec une chaîne vide

                        $variable[] = 'sport' . $stringValue;
                    ?>

                        <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                            <div class="rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="<?php echo base_url('assets'); ?>/images/sport/<?php echo $m['img']; ?>" alt="">
                                    <div class="portfolio-overlay">
                                        <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="bg-light p-4">
                                    <p class="text-primary fw-medium mb-2"><?php echo $m['designation']; ?></p>
                                    <h5 class="lh-base mb-0"><?php echo $m['calorie_par_heure']; ?> cal / heure</a>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="<?php echo 'sport',  $m['idsport']; ?>" id="flexRadioDefault1" value="oui" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                OUI
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="<?php echo 'sport',  $m['idsport']; ?>" id="flexRadioDefault2" value="non">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                NON
                                            </label>
                                        </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                    <h5>
                        <i>
                            <u>
                                <center> sport en exterieur</center>
                            </u>
                        </i>
                    </h5>

                </div>
                <div class="row g-4 portfolio-container">
                    <?php foreach ($exterieur->result_array() as $m) {
                        $value = $m['idsport']; // Valeur à caster en tant que string
                        $stringValue = $value . ''; // Casting de la valeur en string en concaténant avec une chaîne vide

                        $variable[] = 'sport' . $stringValue;
                    ?>

                        <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                            <div class="rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="<?php echo base_url('assets'); ?>/images/sport/<?php echo $m['img']; ?>" alt="">
                                    <div class="portfolio-overlay">
                                        <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="bg-light p-4">
                                    <p class="text-primary fw-medium mb-2"><?php echo $m['designation']; ?></p>
                                    <h5 class="lh-base mb-0"><?php echo $m['calorie_par_heure']; ?> cal / heure</a>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="<?php echo 'sport',  $m['idsport']; ?>" id="flexRadioDefault1" value="oui" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                OUI
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="<?php echo 'sport',  $m['idsport']; ?>" id="flexRadioDefault2" value="non">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                NON
                                            </label>
                                        </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>

                </div>

            </div>

            <div class="text-center">
                <?php
                $variable = implode(';', $variable);

                ?>

                <input type="hidden" name="variable" value="<?php echo $variable; ?>">

                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
    </form>

    <!-- Projects End -->