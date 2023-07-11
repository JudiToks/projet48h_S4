    <!-- Libraries Stylesheet -->
    <!-- <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet"> -->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url('assets'); ?>/css/regime/bootstrap.min.css" rel="stylesheet">
    <?php
    // $sport = implode(';', $sport);

    ?>

    <!-- Template Stylesheet -->
    <!-- Projects Start -->


    <form action="<?php echo site_url('balita/receive_listesplats'); ?>" method="post">
        <input type="hidden" name="gain" value="<?php echo $gain; ?>">
        <input type="hidden" name="debut" value="<?php echo $debut; ?>">
        <input type="hidden" name="checkgain" value="<?php echo $checkgain; ?>">
        <input type="hidden" name="sport" value="<?php echo $sport; ?>">
        <input type="hidden" name="sport" value="<?php echo $sport; ?>">

        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="text-center mb-5">Choisissez vos plats pour <?php echo $checkgain; ?> du poids</h1>
                </div>
                <div class="row g-4 portfolio-container">
                    <?php
                    $variable = array();
                    foreach ($plat->result_array() as $m) {
                        $value = $m['idplat']; // Valeur à caster en tant que string
                        $stringValue = $value . ''; // Casting de la valeur en string en concaténant avec une chaîne vide

                        $variable[] = 'plat' . $stringValue;
                    ?>

                        <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                            <div class="rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="<?php echo base_url('assets'); ?>/images/plat/<?php echo $m['image']; ?>" alt="">
                                    <div class="portfolio-overlay">
                                        <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                                <div class="bg-light p-4">
                                    <p class="text-primary fw-medium mb-2"><?php echo $m['nom']; ?></p>
                                    <h5 class="lh-base mb-0"><?php echo $m['calories']; ?> cal</a>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="<?php echo 'plat', $m['idplat']; ?>" id="flexRadioDefault1" value="oui" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                OUI
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="<?php echo 'plat', $m['idplat']; ?>" id="flexRadioDefault2" value="non">
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