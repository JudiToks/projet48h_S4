<link href="<?php echo base_url('assets'); ?>/css/regime/bootstrap.min.css" rel="stylesheet">

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">

    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="text-center mb-5">Choisissez les jours</h1>
                <h4 class="text-center mb-5">(vous pouvez retirees les jours ou vous voulez vous reposez)</h4>
            </div>
            <p>
            <ul>
                <li>
                    debut : <?php echo $debut; ?>
                </li>
                <li>
                    duree : <?php echo $delai; ?> JOURS
                </li>

            </ul>
            </p>
            <div id="calendar"></div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
            <script>
                var datebleu = [];
                var datevert = [];
                var difference = [];

                var startDate = '<?php echo $debut; ?>'; // Date de début de l'intervalle
                var intervalDays = <?php echo $delai; ?>; // Nombre de jours pour l'intervalle

                for (var i = 0; i <= intervalDays; i++) {
                    var currentDate = moment(startDate).add(i, 'days').format('YYYY-MM-DD');
                    datebleu.push(currentDate);
                }
                difference = datebleu;


                $(document).ready(function() {
                    var startDate = '<?php echo $debut; ?>'; // Date de début de l'intervalle
                    var intervalDays = <?php echo $delai; ?>; // Nombre de jours pour l'intervalle
                    var endDate = moment(startDate).add(intervalDays, 'days').format('YYYY-MM-DD');


                    $('#calendar').fullCalendar({
                        defaultView: 'month',
                        events: [{
                            title: 'Intervalle',
                            start: startDate,
                            end: moment(startDate).add(intervalDays, 'days').format('YYYY-MM-DD'),
                            color: 'blue'
                        }],
                        dayClick: function(date) {
                            var clickedDate = date.format('YYYY-MM-DD');
                            var isInInterval = moment(clickedDate).isBetween(startDate, moment(startDate).add(intervalDays, 'days'));

                            if (isInInterval) {
                                datevert.push(clickedDate);
                                // La date est comprise dans l'intervalle, on la retire de l'intervalle
                                $('#calendar').fullCalendar('removeEvents', function(event) {
                                    return event.start.format('YYYY-MM-DD') === clickedDate && event.color === 'blue';
                                });

                                // On ajoute la date retirée à l'intervalle avec la couleur verte
                                $('#calendar').fullCalendar('renderEvent', {
                                    title: 'Date retirée',
                                    start: clickedDate,
                                    color: 'green'
                                }, true);

                                // Mise à jour de la date de fin de l'intervalle
                                endDate = moment(endDate).add(1, 'day').format('YYYY-MM-DD');
                                intervalDays = intervalDays + 1;

                                datebleu.push(endDate);

                                $('#calendar').fullCalendar('refetchEvents');
                                // Redéfinir le paramètre end de l'événement avec la nouvelle date de fin
                                var event = $('#calendar').fullCalendar('clientEvents', function(event) {
                                    return event.title === 'Intervalle';
                                })[0];
                                event.end = endDate;

                                // Actualisation du calendrier pour refléter les modifications
                                $('#calendar').fullCalendar('updateEvent', event);

                            }
                            console.log('bleu :');
                            console.log(datebleu); // Affiche les dates de l'intervalle dans le tableau datebleu
                            console.log('vert :');
                            console.log(datevert); // Affiche les dates de l'intervalle dans le tableau datebleu

                            // Récupérer les valeurs des variables en JavaScript
                            var maVariable1 = datebleu;
                            var maVariable2 = datevert;

                            // Assigner les valeurs aux champs du formulaire
                            // document.getElementById('variable1').value = maVariable1;
                            // document.getElementById('variable2').value = maVariable2;
                            var tableau1 = maVariable1;
                            var tableau2 = maVariable2;

                            var difference = tableau1.filter(function(element) {
                                return !tableau2.includes(element);
                            });

                            console.log('difference');
                            console.log(difference);
                            document.getElementById('dates').value = difference;


                        }
                    });
                });
            </script>
        </div>
    </div>
    <form action="<?php echo site_url('balita/receive_calendrier'); ?>" method="post">
        <input type="hidden" id="dates" name="dates" value="">

        <input type="hidden" name="gain" value="<?php echo $gain; ?>">
        <input type="hidden" name="debut" value="<?php echo $debut; ?>">
        <input type="hidden" name="sport" value="<?php echo $sport; ?>">

        <input type="hidden" name="delai" value="<?php echo $delai; ?>">
        <input type="hidden" name="pack" value="<?php echo $pack; ?>">
        <input type="hidden" name="prix" value="<?php echo $prix; ?>">
        <input type="hidden" name="money" value="<?php echo $money; ?>">
        <input type="hidden" name="plat" value="<?php echo $plat; ?>">
        <input type="hidden" name="checkgain" value="<?php echo $checkgain; ?>">

        <!-- Autres champs du formulaire... -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>

    </form>
    <script>
        document.getElementById('dates').value = difference;
    </script>

</body>