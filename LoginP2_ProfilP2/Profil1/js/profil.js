(function($) {
    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            poids: {
                required: true,
                number: true,
            },
            taille: {
                required: true,
                number: true,
            },
            age: {
                required: true,
                digits: true,
            },
            adresse: {
                required: true,
                digits: true
            }
        },
        messages: {
            poids: {
                required: "Veuillez entrer un chiffre correct",
            },
            taille: {
                required: "Veuillez entrer un chiffre en cm",
            },
            age: {
                required: "Veuillez entrer votre âge",
                digits: "Veuillez entrer une valeur numérique",
            },
            adresse: {
                required: "Veuillez indiquer un lieu valide",
            
            },
        },
        onfocusout: function(element) {
            $(element).valid();
        },
        highlight: function(element, errorClass, validClass) {
            $(element)
                .closest('.form-group')
                .addClass("form-error");
            $(element).removeClass("valid");
            $(element).addClass("error");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element)
                .closest('.form-group')
                .removeClass("form-error");
            $(element).removeClass("error");
            $(element).addClass("valid");
        },
    });

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            current: "",
        },
        titleTemplate: '<h3 class="title">#signup-form-h-0#</h3>',
        onInit: function(event, currentIndex) {
            if (currentIndex === 0) {
                form.find(".actions").addClass("test");
            }
        },
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        email: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: "",
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(".your_picture_image").attr("src", e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
})(jQuery);
