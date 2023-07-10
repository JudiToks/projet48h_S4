(function($) {
    var form = $("#signup-form");

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous : 'Précédent',
            next : 'Suivant',
            finish : 'Terminer',
            current : ''
        },
        titleTemplate : '<h3 class="title">#title#</h3>',
        onStepChanging: function (event, currentIndex, newIndex) {
            // Scroll jusqu'au bouton "Next", "Previous" ou "Finish"
            var actionButton = form.find('.actions a:eq(' + newIndex + ')');
            $('html, body').animate({
                scrollTop: actionButton.offset().top
            }, 500);
            return true;
        },
        onFinished: function (event, currentIndex) {
            alert('Submitted');
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            // Scroll jusqu'au bouton "Next", "Previous" ou "Finish"
            var actionButton = form.find('.actions a:eq(' + currentIndex + ')');
            $('html, body').animate({
                scrollTop: actionButton.offset().top
            }, 500);
        }
    });
})(jQuery);
