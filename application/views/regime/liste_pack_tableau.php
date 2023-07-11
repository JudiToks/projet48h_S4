<link href="<?php echo base_url('assets'); ?>/css/regime/bootstrap.min.css" rel="stylesheet">
<?php
// $sport = implode(';', $sport);
// $plat = implode(';', $plat);

?>
<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="text-center mb-5">Choisissez votre rythme</h1>
        </div>
        <p>
        <ul>
            <li>
                sport : <?php echo $sport; ?>
            </li>
            <li>
                plat : <?php echo $plat; ?>
            </li>

        </ul>
        </p>

        <div class="row g-4 portfolio-container">
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                <div class="rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?php echo base_url('assets'); ?>/images/easy.jpg " alt="">
                        <div class="portfolio-overlay">
                            <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="bg-light p-4">
                        <form action="<?php echo site_url('balita/receive_liste_pack_tableau'); ?>" method="post">
                            <input type="hidden" name="gain" value="<?php echo $gain; ?>">
                            <input type="hidden" name="debut" value="<?php echo $debut; ?>">
                            <input type="hidden" name="sport" value="<?php echo $sport; ?>">

                            <input type="hidden" name="delai" value="<?php echo $easydelai; ?>">
                            <input type="hidden" name="pack" value="easy">
                            <input type="hidden" name="prix" value="<?php echo $easyprix; ?>">
                            <input type="hidden" name="plat" value="<?php echo $plat; ?>">
                            <center>
                                <h5 class="lh-base mb-0">EASY <span class="encadrage-vert"><?php echo $easydelai; ?> jours</span></a>
                            </center>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><?php echo $easyprix; ?> token</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.3s">
                <div class="rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?php echo base_url('assets'); ?>/images/medium.jpg " alt="">
                        <div class="portfolio-overlay">
                            <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-2.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="bg-light p-4">
                        <form action="<?php echo site_url('balita/receive_liste_pack_tableau'); ?>" method="post">
                            <input type="hidden" name="gain" value="<?php echo $gain; ?>">
                            <input type="hidden" name="debut" value="<?php echo $debut; ?>">
                            <input type="hidden" name="sport" value="<?php echo $sport; ?>">

                            <input type="hidden" name="delai" value="<?php echo $mediumdelai; ?>">
                            <input type="hidden" name="pack" value="medium">
                            <input type="hidden" name="prix" value="<?php echo $mediumprix; ?>">
                            <input type="hidden" name="plat" value="<?php echo $plat; ?>">
                            <center>
                                <h5 class="lh-base mb-0">MEDIUM <span class="encadrage-orange"><?php echo $mediumdelai; ?> jours</span></a>
                            </center>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><?php echo $mediumprix; ?> token</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.5s">
                <div class="rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?php echo base_url('assets'); ?>/images/hard.jpg " alt="">
                        <div class="portfolio-overlay">
                            <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-3.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="bg-light p-4">
                        <form action="<?php echo site_url('balita/receive_liste_pack_tableau'); ?>" method="post">
                            <input type="hidden" name="gain" value="<?php echo $gain; ?>">
                            <input type="hidden" name="debut" value="<?php echo $debut; ?>">
                            <input type="hidden" name="sport" value="<?php echo $sport; ?>">

                            <input type="hidden" name="delai" value="<?php echo $harddelai; ?>">
                            <input type="hidden" name="pack" value="hard">
                            <input type="hidden" name="prix" value="<?php echo $hardprix; ?>">
                            <input type="hidden" name="plat" value="<?php echo $plat; ?>">
                            <input type="hidden" name="checkgain" value="<?php echo $checkgain; ?>">

                            <center>
                                <h5 class="lh-base mb-0">HARD <span class="encadrage-rouge"><?php echo $harddelai; ?> jours</span>
                                    </a>
                            </center>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><?php echo $hardprix; ?> token</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Projects End -->
<style>
    .encadrage-vert {
        display: inline-block;
        padding: 5px 10px;
        border: 2px solid green;
        border-radius: 15px;
        background-color: lightgreen;
    }

    .encadrage-orange {
        display: inline-block;
        padding: 5px 10px;
        border: 2px solid yellow;
        border-radius: 15px;
        background-color: lightgoldenrodyellow;
    }

    .encadrage-rouge {
        display: inline-block;
        padding: 5px 10px;
        border: 2px solid red;
        border-radius: 15px;
        background-color: lightpink;
    }
</style>