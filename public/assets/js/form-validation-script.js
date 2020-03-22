var Script = function() {

    /**$.validator.setDefaults({
        submitHandler: function() { alert("submitted!"); }
    });**/

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#feedback_form").validate();

        // validate signup form on keyup and submit
        $("#register_form").validate({
            rules: {
                fullname: {
                    required: true,
                    minlength: 6
                },
                address: {
                    required: true,
                    minlength: 10
                },
                username: {
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                fullname: {
                    required: "Please enter a Full Name.",
                    minlength: "Your Full Name must consist of at least 6 characters long."
                },
                address: {
                    required: "Please enter a Address.",
                    minlength: "Your Address must consist of at least 10 characters long."
                },
                username: {
                    required: "Please enter a Username.",
                    minlength: "Your username must consist of at least 5 characters long."
                },
                password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 5 characters long."
                },
                confirm_password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 5 characters long.",
                    equalTo: "Please enter the same password as above."
                },
                email: "Please enter a valid email address.",
                agree: "Please accept our terms & condition."
            }
        });

        // validate Employe form on keyup and submit
        $("#employe_form").validate({
            rules: {
                nom: {
                    required: true
                },
                adresse: {
                    required: true
                },
                cni: {
                    required: true,
                    minlength: 6
                },
                telephone: {
                    required: true,
                    number: true,
                    minlength: 9
                },
                salaire: {
                    number: true
                },
                poste: {
                    required: true
                }
            },
            messages: {
                nom: {
                    required: "Veuillez saisir le nom de l'employé."
                },
                adresse: {
                    required: "Veuillez saisir l'adresse de l'employé."
                },
                cni: {
                    required: "Saisir le numéro de CNI.",
                    minlength: "Au moins 6 caractères."
                },
                telephone: {
                    required: "Saisir le numéro de téléphone.",
                    minlength: "Au moins 9 caractères.",
                    number: 'Le numéro est constitué uniquement des chiffres'
                },
                salaire: {
                    number: 'Le numéro est constitué uniquement des chiffres'
                },
                poste: {
                    required: "Veuillez choisir un poste pour cet employé."
                }
            }
        });

        // validate Poste form on keyup and submit
        $("#poste_form").validate({
            rules: {
                poste: {
                    required: true
                }
            },
            messages: {
                poste: {
                    required: "Veuillez saisir le libellé du poste."
                }
            }
        });

        // validate Profil form on keyup and submit
        $("#profil_form").validate({
            rules: {
                profil: {
                    required: true
                },
                module: {
                    required: true,
                    checked: true
                }
            },
            messages: {
                profil: {
                    required: "Veuillez saisir le libellé du profil."
                },
                module: {
                    required: "Veuillez choisir au moins un module."
                }
            }
        });

        // validate Salaries form on keyup and submit
        $("#salary_form").validate({
            rules: {
                prime: {
                    number: true
                },
                mois: {
                    required: true
                },
                annee: {
                    required: true
                },
                datePaiement: {
                    required: true,
                    date: true
                }
            },
            messages: {
                prime: {
                    number: "La prime est numérique."
                },
                mois: {
                    required: "Choisir le mois à payer."
                },
                annee: {
                    required: "Choisir l'année à payer."
                },
                datePaiement: {
                    required: "Saisir la date de paiement.",
                    date: "Veuillez vous rassuré que c'est une date que vous avez entré."
                }
            }
        });

        // validate Congé form on keyup and submit
        $("#conge_form").validate({
            rules: {
                employe: {
                    required: true
                },
                motifs: {
                    required: true
                },
                dateDeb: {
                    required: true,
                    date: true
                },
                dateFin: {
                    required: true,
                    date: true
                }
            },
            messages: {
                employe: {
                    required: "Veuillez choisir un employé."
                },
                motifs: {
                    required: "Veuillez saisir le motif du congé."
                },
                dateDeb: {
                    required: "Choisir la date de début.",
                    date: "Veuillez vous rassuré que c'est une date que vous avez entré."
                },
                dateDeb: {
                    required: "Choisir la date de fin.",
                    date: "Veuillez vous rassuré que c'est une date que vous avez entré."
                }
            }
        });

        // validate Salaries form on keyup and submit
        $("#service_form").validate({
            rules: {
                type: {
                    required: true
                },
                service: {
                    required: true
                },
                montant: {
                    required: true,
                    number: true
                }
            },
            messages: {
                type: {
                    required: "Choisir un type de service."
                },
                service: {
                    required: "Saisir le libelle du service."
                },
                montant: {
                    required: "Saisir le montant du service.",
                    number: "Doit être obligatoirement des chiffres."
                }
            }
        });

        // validate Produits form on keyup and submit
        $("#produit_form").validate({
            rules: {
                type: {
                    required: true
                },
                produit: {
                    required: true
                },
                montant: {
                    required: true,
                    number: true
                },
                stock: {
                    required: true,
                    number: true
                }
            },
            messages: {
                type: {
                    required: "Choisir un type de produit."
                },
                produit: {
                    required: "Saisir le libelle du produit."
                },
                montant: {
                    required: "Saisir le montant du service.",
                    number: "Doit être obligatoirement des chiffres."
                },
                stock: {
                    required: "Saisir le stock de produit.",
                    number: "Doit être obligatoirement des chiffres."
                }
            }
        });

        // validate Produits form on keyup and submit
        $("#personnal_info").validate({
            rules: {
                fname: {
                    required: true
                },
                produit: {
                    required: true
                },
                montant: {
                    required: true,
                    number: true
                },
                stock: {
                    required: true,
                    number: true
                }
            },
            messages: {
                type: {
                    required: "Choisir un type de produit."
                },
                produit: {
                    required: "Saisir le libelle du produit."
                },
                montant: {
                    required: "Saisir le montant du service.",
                    number: "Doit être obligatoirement des chiffres."
                },
                stock: {
                    required: "Saisir le stock de produit.",
                    number: "Doit être obligatoirement des chiffres."
                }
            }
        });

        // validate User form on keyup and submit
        $("#user_form").validate({
            rules: {
                employe: {
                    required: true
                },
                profil: {
                    required: true
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
                employe: {
                    required: "Choisir un employe."
                },
                profil: {
                    required: "Choisir un profil utilisateur."
                },
                username: {
                    required: "Saisir le nom d'utilisateur."
                },
                password: {
                    required: "Saisir un mot de passe.",
                    minlength: "Votre mot de passe doit contenir au moins 5 caractères."
                },
                confirm_password: {
                    required: "Saisir un mot de passe.",
                    minlength: "Votre mot de passe doit contenir au moins 5 caractères.",
                    equalTo: "Mot de passe non conforme au mot de passe ci dessus."
                }
            }
        });

        // validate User form on keyup and submit
        $("#planification_form").validate({
            rules: {
                clients: {
                    required: true
                },
                sites: {
                    required: true
                },
                datePlan: {
                    required: true
                },
                equipe: {
                    required: true
                },
                techniciens: {
                    required: true
                }
            },
            messages: {
                clients: {
                    required: "Choisir un client."
                },
                sites: {
                    required: "Choisir un site."
                },
                datePlan: {
                    required: "Saisir une date pour la planification."
                },
                equipe: {
                    required: "Saisir Le nom correspondant a l'equipe."
                },
                techniciens: {
                    required: "Choisir un ou des technicien(s)."
                }
            }
        });

        $("#installation_form").validate({
            rules: {
                upload: {
                    required: true,
                    number: true
                },
                download: {
                    required: true,
                    number: true
                },
                signal: {
                    required: true,
                    number: true,
                    min: 80,
                    max: 100
                }
            },
            messages: {
                upload: {
                    required: "Saisir le paramètre.",
                    number: "Saisir un chiffre."
                },
                download: {
                    required: "Saisir le paramètre.",
                    number: "Saisir un chiffre."
                },
                signal: {
                    required: "Saisir le paramètre.",
                    number: "Saisir un chiffre.",
                    min: "Le signal doit etre compris entre 80 et 100.",
                    max: "Le signal doit etre compris entre 80 et 100."
                }
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if (firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();