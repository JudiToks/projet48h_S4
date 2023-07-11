<!doctype html>
<html lang="en">

<head>
  <title>Table 02</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/paiement.css">
  <link href="<?php echo base_url('assets'); ?>/css/regime/bootstrap.min.css" rel="stylesheet">

</head>

<body>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h2 class="heading-section"></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="text-center mb-5">Rechagrement de votre de compte</h1>
          </div>
          <form action="<?php echo site_url('balita/receive_payement'); ?>" method="post">

            <input type="text" name="code" class="form-control mb-3" placeholder="Entrez un code">
            <div class="text-center">

              <?php if (isset($_SESSION['envoit'])) { ?>
                <div><?php echo $_SESSION['envoit'];
                      unset($_SESSION['envoit']);
                      ?></div>
              <?php }
              if (isset($_SESSION['erreur'])) { ?>
                <div><?php echo $_SESSION['erreur'];
                      unset($_SESSION['erreur']);
                    } ?></div>


                <?php if (isset($message)) { ?>
                  <div><?php echo $message;
                      } ?></div>
                  <button type="submit" class="btn btn-primary">Envoyer votre demande</button>
            </div>
          </form>
          <div class="table-wrap">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>Code</th>
                  <th>Valeur</th>
                  <th>Validite</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($code->result_array() as $m) { ?>

                  <tr class="alert" role="alert">
                    <td><?php echo $m['designation']; ?></td>
                    <td><?php echo $m['valeur']; ?> Token</td>
                    <td><?php
                        if ($m['etat'] == 0) {
                          echo " <span style=\"color: green;\">Valide</span>
                      ";
                        } else {
                          echo " <span style=\"color: red;\">Non valide</span>
                          ";
                        }

                        ?> </td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> -->
</body>

</html>