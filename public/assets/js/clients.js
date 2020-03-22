
$(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(".next").click(function(){

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //alert(current_fs.attr('id'));
        var form = $("#msform");
            form.validate({
                rules: {
                    typeclient: {
                        required: true
                    },
                    fname: {
                        required: true
                    },
                    phno: {
                        required: true,
                        number: true
                    },
                    address: {
                        required: true
                    },
                    mail_address: {
                        required: true,
                        email: true
                    },
                    username: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    }
                },
                messages: {
                    typeclient: {
                        required: "<span class='text-danger'>Veuillez choisir le type du client.</span>",
                    },
                    fname: {
                        required: "<span class='text-danger'>Veuillez saisir le nom du client.</span>",
                    },
                    phno: {
                        required: "<span class='text-danger'>Veuillez saisir le numéro de téléphone.</span>",
                        number: "<span class='text-danger'>Veuillez saisir uniquement les chiffres.</span>",
                    },
                    address: {
                        required: "<span class='text-danger'>Veuillez saisir l'adresse du client.</span>",
                    },
                    mail_address: {
                        required: "<span class='text-danger'>Veuillez saisir l'adresse mail du client.</span>",
                        email: "<span class='text-danger'>Veuillez saisir sous la forme xxx@xxx.com.</span>",
                    },
                    username: {
                        required: "<span class='text-danger'>Saisir le nom d'utilisateur.</span>"
                    },
                    password: {
                        required: "<span class='text-danger'>Saisir un mot de passe.</span>",
                        minlength: "<span class='text-danger'>Votre mot de passe doit contenir au moins 5 caractères.</span>"
                    },
                    confirm_password: {
                        required: "<span class='text-danger'>Saisir un mot de passe.</span>",
                        minlength: "<span class='text-danger'>Votre mot de passe doit contenir au moins 5 caractères.</span>",
                        equalTo: "<span class='text-danger'>Mot de passe non conforme au mot de passe ci dessus.</span>"
                    }
                }
            });
            if (form.valid() === true){
                //if ($(current_fs.attr('id')).is(":visible")){
                    //current_fs = $('#account_information');
                    next_fs = $(this).parent().next();
                    next_fs.show(); 
                    current_fs.hide();
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                    step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                    },
                        duration: 600
                    });
                //}
            }
        //next_fs = $(this).parent().next();

        
    });

    $(".previous").click(function(){

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
        },
        duration: 600
        });
    });

    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });

    $(".submit").click(function(){
        return false;
    });

    

});