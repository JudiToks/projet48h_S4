<link href="<?php echo base_url('assets'); ?>/css/regime/bootstrap.min.css" rel="stylesheet">

<body>
    <?php
    $datess = $dates;
    $dates = explode(',', $dates);
    $sports = $sport;
    $sport = explode(';', $sport);
    $plats = $plat;
    $plat = explode(';', $plat);
    // var_dump($sport);
    ?>
    <form action="<?php echo site_url('balita/receive_valider_achat'); ?>" method="post">
        <input type="hidden" name="gain" value="<?php echo $gain; ?>">
        <input type="hidden" name="debut" value="<?php echo $debut; ?>">
        <input type="hidden" name="plats" value="<?php echo $plats; ?>">
        <input type="hidden" name="dates" value="<?php echo $datess; ?>">
        <input type="hidden" name="pack" value="<?php echo $pack; ?>">
        <input type="hidden" name="delai" value="<?php echo $delai; ?>">
        <input type="hidden" name="prix" value="<?php echo $prix; ?>">
        <input type="hidden" name="money" value="<?php echo $money; ?>">
        <input type="hidden" name="checkgain" value="<?php echo $checkgain; ?>">
        <input type="hidden" name="sport" value="<?php echo $sports; ?>">

        <ul>
            <li>
                Objectif : <?php echo $gain; ?> <?php echo $checkgain; ?>
            </li>
            <li>
                Debut programme : <?php echo $debut; ?>
            </li>
            <li>
                Duree du programme : <?php echo $delai; ?> JOURS
            </li>

            <li>
                Votre pack : <?php echo $pack; ?>
            </li>

            <li>
                Vos sport :
                <ul>
                    <?php for ($i = 0; $i < count($sport); $i++) {
                        foreach ($listsports->result_array() as $m) {
                            if ($sport[$i] == $m['idsport']) {
                                echo '<li>' . $m['designation'] . '</li>';
                            }
                        } ?>



                    <?php } ?>


                </ul>

            </li>
            <li>
                Vos plats a livrer :
                <ul>
                    <?php for ($i = 0; $i < count($plat); $i++) {
                        foreach ($listplats->result_array() as $m) {
                            if ($plat[$i] == $m['idplat']) {
                                echo '<li>' . $m['nom'] . '</li>';
                            }
                        } ?>



                    <?php } ?>


                </ul>

            </li>
            <li>
                Vos dates de livraison et de programme :
                <ul>
                    <?php for ($i = 0; $i < count($dates); $i++) {
                        echo '<li>' . $dates[$i] . '</li>';
                    } ?>
                </ul>

            </li>
            <li>
                Le prix du regime : <?php echo $prix; ?> Token
            </li>
            <li>
                Le reste de votre argent apres le paiement : <?php echo $money; ?> Token
            </li>


        </ul>



        <div class="text-center">
            <button type="submit" class="btn btn-primary">Valider votre achat</button>
        </div>
    </form>

</body>