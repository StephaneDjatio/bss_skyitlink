@extends('layouts.default')
@section('styles')


@endsection

@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Gestion des clients</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Gestion des clients</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- MultiStep Form -->
        <div id="grad1">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="card">
                        <!--<h2><strong>Sign Up Your User Account</strong></h2>
                        <p>Fill all form field to go to next step</p>-->
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform">
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="personal"><strong>Informations personnelles</strong></li>
                                        <li id="account"><strong>Compte</strong></li>
                                        <li id="payment"><strong>Services</strong></li>
                                        <li id="confirm"><strong>Resumé</strong></li>
                                    </ul> 
                                    <!-- fieldsets -->
                                    <fieldset id="personnal_info">
                                        <div class="form-card">
                                            <h2 class="fs-title">Informations personnelles</h2>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <select id="typeclient" class="list-dt" name="typeclient">
                                                        <option value="">Choisir le type de client</option>
                                                        <option value="1">Entreprise</option>
                                                        <option value="2">Partenaire</option>
                                                        <option value="3">Domicile</option>
                                                    </select>
                                                </div>
                                            </div> 
                                            <input type="text" id="fname" name="fname" placeholder="Nom" />
                                            <input type="text" id="lname" name="lname" placeholder="Prénom" /> 
                                            <input type="text" id="phno" name="phno" placeholder="Numéro de téléphone." /> 
                                            <input type="text" id="phno_2" name="phno_2" placeholder="Autre Numéro de téléphone" />
                                            <input type="text" id="address" name="address" placeholder="Adresse" />
                                            <input type="email" id="mail_address" name="mail_address" placeholder="Adresse Mail" />
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Etape suivante" />
                                    </fieldset>
                                    <fieldset id="account_info">
                                        <div class="form-card">
                                            <h2 class="fs-title">Compte</h2> 
                                            <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" /> 
                                            <input type="password" id="password" name="password" placeholder="Mot de passe" /> 
                                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmer le mot de passe" />
                                        </div> 
                                        <input type="button" name="previous" class="previous action-button-previous" value="Retour" /> 
                                        <input type="button" name="next" class="next action-button" value="Etape suivante" />
                                    </fieldset>
                                    <fieldset id="prod_serv">
                                        <div class="form-card" id="contentProd">
                                            <h2 class="fs-title">Services</h2>
                                            <!-- <div class="row">
                                                <div class="col-lg-12">
                                                    <select id="typeop" class="list-dt" name="typeop">
                                                        <option value="">Choisir le type de l'opération</option>
                                                        <option value="1">Produits</option>
                                                        <option value="2">Services</option>
                                                        <option value="3">Produits et Services</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                            <input type="text" id="count" name="count">
                                            <div class="bodyContent" id="bodyContent">

                                            </div>
                                        </div> 
                                        <input type="button" name="previous" class="previous action-button-previous" value="Retour" /> 
                                        <input type="button" id="resume" name="make_payment" class="next action-button" value="Etape suivante" />
                                    </fieldset>
                                    <fieldset id="resume">
                                        <div class="form-card">
                                            <h2 class="fs-title text-center">Résumé de l'enregistrement</h2> <br><br>
                                            <div class="row justify-content-center">
                                                <div class="col-lg-12 order_d_inner">
                                                    <div class="col-lg-6 details">
                                                        <h4>Informations personnelles et Compte</h4>
                                                        <ul class="list">
                                                            <li><a href="#"><span>Nom et prénom</span> : <b id="name_cli"></b> </a></li>
                                                            <li><a href="#"><span>Numero de tel</span> : <b id="tel_cli"></b> </a></li>
                                                            <li><a href="#"><span>Mail</span> : <b id="mail_cli"></b> </a></li>
                                                            <li><a href="#"><span>Adresse</span> : <b id="adr_cli"></b> </a></li>
                                                            <li><a href="#"><span>Nom d'utilisateur</span> : <b id="user_cli"></b> </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 details">
                                                        <h4>Services</h4>
                                                        <ul class="list" id="list_serv">
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> <br><br>
                                            <div class="row justify-content-center">
                                                <div class="col-7 text-center">
                                                    <h5>You Have Successfully Signed Up</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="previous" class="previous action-button-previous" value="Retour" /> 
                                        <input type="button" name="make_payment" class="next action-button" value="Confirmer" />
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')

<script>
    var produits;
    var options;
    var optionserv;
    var allData;
    $(document).ready(function() {
        $.ajax({
            url: '/produits',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                options = '<option value="">Choisir un produit</option>';
                $.each(data, function(key, value) {
                    options += '<option value='+ value.id +'>' + value.libelleProduit + '</option>';
                    
                });
                //console.log(options);
            }
        });

        $.ajax({
            url: '/services',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                allData = data;
                optionserv = '<option value="">Choisir un service</option>';
                $.each(data, function(key, value) {
                    optionserv += '<option value='+ value.id +'>' + value.libelleService + '</option>';
                    document.getElementById('count').value = 1;
                    var next_exp = document.getElementById('count').value;
                    var contentProd = document.getElementById('bodyContent');
                    $('#bodyContent').empty();
                    var div = document.createElement('div');
                    var content;
                    content = '<div class="col-lg-5 select">';
                    content += '<select id="service'+next_exp+'" class="list-dt" name="service'+next_exp+'">';
                    content += optionserv;
                    content += '</select>';
                    content += '</div>';
                    content += '<div class="col-lg-5">';
                    content += '<input type="text" id="quantiteServ'+next_exp+'" name="quantiteServ'+next_exp+'" placeholder="Quantité Service" value="1">';
                    // content += '<input type="text" id="id'+next_exp+'" name="id'+next_exp+'" value="'+next_exp+'">';
                    content += '</div>';
                    content += '<div class="col-lg-2" id="btn'+next_exp+'">';
                    content += '<a href="#" id="plus'+next_exp+'" onclick="addServ()" name="add-Serv'+next_exp+'" class="plus action-button">Ajouter</a>';
                    content += '</div><span id="space'+next_exp+'"><br><br><br><br></span>';

                    div.innerHTML = content;
                    div.setAttribute('id', 'contentOp1');
                    div.setAttribute('class', 'contentOp');
                    contentProd.appendChild(div);
                });
                //console.log(options);
            }
        });

        $('#resume').on('click', function(){
            // alert('test')
            $('#name_cli').empty();
            $('#tel_cli').empty();
            $('#mail_cli').empty();
            $('#adr_cli').empty();
            $('#user_cli').empty();
            var contentProd = document.getElementById('bodyContent');
            var name = document.getElementById('fname').value+' '+document.getElementById('lname').value;
            var tel = document.getElementById('phno').value;
            var email = document.getElementById('mail_address').value;
            var adresse = document.getElementById('address').value;
            var username = document.getElementById('username').value;
            var count_serv = document.getElementById('count').value;
            document.getElementById('name_cli').append(name);
            document.getElementById('tel_cli').append(tel);
            document.getElementById('mail_cli').append(email);
            document.getElementById('adr_cli').append(adresse);
            document.getElementById('user_cli').append(username);
            var children = $('div.select').children('select');
            children.each(function() {
                // var childrenSelect = $('div.contentOp').children('select.list-dt');

                // childrenSelect.each(function() {
                //     $('#list_serv').append('id: ' + this.id + '<br>');
                // })
                // alert(this.id );
                // $.each(allData, function(key, value) {
                //     if (value.id ) {
                        
                //     }
                // })
                // $('pre.out').append( 'id: ' + this.id + ', title: ' + this.title + '<br>' );
                var value = document.getElementById(this.id).value;
                $('#list_serv').append('id: ' + value + '<br>');
            });
            alert(children.length);
        });
        

        // $('#typeop').on('change', function() {
        //     var operation = this.value;
        //     //$('#username').val(employe_id.toLowerCase());
        //     //var div = document.getElementById('contentOp1');
        //     document.getElementById('count').value = 1;
        //     var next_exp = document.getElementById('count').value;
        //     var contentProd = document.getElementById('bodyContent');
        //     $('#bodyContent').empty();
        //     var div = document.createElement('div');
        //     var content;
        //     if (operation == 1) {
        //         // alert("Produits");
        //         content = '<div class="col-lg-5">';
        //         content += '<select id="produit'+next_exp+'" class="list-dt" name="produit'+next_exp+'">';
        //         content += options;
        //         content += '</select>';
        //         content += '</div>';
        //         content += '<div class="col-lg-5">';
        //         content += '<input type="text" id="quantiteProd'+next_exp+'" name="quantiteProd'+next_exp+'" placeholder="Quantité produit"  value="1">';
        //         // content += '<input type="text" id="id'+next_exp+'" name="id'+next_exp+'" value="'+next_exp+'">';
        //         content += '</div>';
        //         content += '<div class="col-lg-2" id="btn'+next_exp+'">';
        //         content += '<a href="#" id="plus'+next_exp+'" onclick="addProd()" name="add-more'+next_exp+'" class="plus action-button">Ajouter</a>';
        //         content += '</div><span id="space'+next_exp+'"><br><br><br><br></span>';

        //         div.innerHTML = content;
        //         div.setAttribute('id', 'contentOp1');
        //         contentProd.appendChild(div);
        //     }
        //     if (operation == 2) {
        //         // alert("Services");
        //         content = '<div class="col-lg-5">';
        //         content += '<select id="service'+next_exp+'" class="list-dt" name="service'+next_exp+'">';
        //         content += optionserv;
        //         content += '</select>';
        //         content += '</div>';
        //         content += '<div class="col-lg-5">';
        //         content += '<input type="text" id="quantiteServ'+next_exp+'" name="quantiteServ'+next_exp+'" placeholder="Quantité Service" value="1">';
        //         // content += '<input type="text" id="id'+next_exp+'" name="id'+next_exp+'" value="'+next_exp+'">';
        //         content += '</div>';
        //         content += '<div class="col-lg-2" id="btn'+next_exp+'">';
        //         content += '<a href="#" id="plus'+next_exp+'" onclick="addServ()" name="add-Serv'+next_exp+'" class="plus action-button">Ajouter</a>';
        //         content += '</div><span id="space'+next_exp+'"><br><br><br><br></span>';

        //         div.innerHTML = content;
        //         div.setAttribute('id', 'contentOp1');
        //         contentProd.appendChild(div);
        //     }
        //     if (operation == 3) {
        //         // alert("Produits et services");
        //         content = '<div class="col-lg-6" id="produitDiv'+next_exp+'">';
        //         content += '<div class="col-lg-7">';
        //         content += '<select id="produit'+next_exp+'" class="list-dt" name="produit'+next_exp+'">';
        //         content += options;
        //         content += '</select>';
        //         content += '</div>';
        //         content += '<div class="col-lg-3">';
        //         content += '<input type="text" id="quantiteProd'+next_exp+'" name="quantiteProd'+next_exp+'" placeholder="Quantité produit"  value="1">';
        //         // content += '<input type="text" id="id'+next_exp+'" name="id'+next_exp+'" value="'+next_exp+'">';
        //         content += '</div>';
        //         content += '<div class="col-lg-2" id="btn'+next_exp+'">';
        //         content += '<a href="#" id="plus'+next_exp+'" onclick="addProdServ()" name="add-more'+next_exp+'" class="plus action-button">Ajouter</a>';
        //         content += '</div>';
        //         content += '</div>';

        //         content += '<div class="col-lg-6" id="serviceDiv'+next_exp+'">';
        //         content += '<div class="col-lg-7">';
        //         content += '<select id="service'+next_exp+'" class="list-dt" name="service'+next_exp+'">';
        //         content += optionserv;
        //         content += '</select>';
        //         content += '</div>';
        //         content += '<div class="col-lg-3">';
        //         content += '<input type="text" id="quantiteServ'+next_exp+'" name="quantiteServ'+next_exp+'" placeholder="Quantité Service" value="1">';
        //         // content += '<input type="text" id="id'+next_exp+'" name="id'+next_exp+'" value="'+next_exp+'">';
        //         content += '</div>';
        //         content += '<div class="col-lg-2" id="btn'+next_exp+'">';
        //         content += '<a href="#" id="plus'+next_exp+'" onclick="addServ()" name="add-Serv'+next_exp+'" class="plus action-button">Ajouter</a>';
        //         content += '</div>';
        //         content += '</div><span id="space'+next_exp+'"><br></span>';
        //         div.innerHTML = content;
        //         div.setAttribute('id', 'contentOp1');
        //         contentProd.appendChild(div);
        //     }
        // });
    });
    function addProd(){
        //alert('Bonjour');
        var count = document.getElementById('count').value;
        var next_exp = parseInt(count) + 1;
        var contentProd = document.getElementById('bodyContent');
        var div = document.createElement('div');
        var plus = document.getElementById('plus'+count);
        //var moins = document.getElementById('moins'+count).value;
        var content = '<div class="col-lg-5">';
            content += '<select id="produit'+next_exp+'" class="list-dt" name="produit'+next_exp+'">';
            content += options;
            content += '</select>';
            content += '</div>';
            content += '<div class="col-lg-4">';
            content += '<input type="text" id="quantiteProd'+next_exp+'" name="quantiteProd'+next_exp+'" placeholder="Quantité produit"   value="1">';
            // content += '<input type="text" id="id'+next_exp+'" name="id'+next_exp+'" value="'+next_exp+'">';
            content += '</div>';
            content += '<div class="col-lg-3" id="btn'+next_exp+'">';
            content += '<a href="#" id="plus'+next_exp+'" onclick="addProd()" name="add-more'+next_exp+'" class="plus action-button">Ajouter</a>';
            content += '<a href="#" id="'+next_exp+'" onclick="removeProd('+next_exp+')" name="moins'+next_exp+'" class="moins action-remove">Supprimer</a>';
            content += '</div><span id="space'+next_exp+'"><br><br><br><br></span>';

        div.innerHTML = content;
        div.setAttribute('id', 'contentOp'+next_exp);
        div.setAttribute('class', 'contentOp');
        contentProd.appendChild(div);
        document.getElementById('count').value = next_exp;
        plus.remove();
    }

    function addServ(){
        //alert('Bonjour');
        var count = document.getElementById('count').value;
        var next_exp = parseInt(count) + 1;
        var contentProd = document.getElementById('bodyContent');
        var div = document.createElement('div');
        var plus = document.getElementById('plus'+count);
        //var moins = document.getElementById('moins'+count).value;
        var content = '<div class="col-lg-5">';
            content += '<select id="service'+next_exp+'" class="list-dt" name="service'+next_exp+'">';
            content += optionserv;
            content += '</select>';
            content += '</div>';
            content += '<div class="col-lg-4">';
            content += '<input type="text" id="quantiteServ'+next_exp+'" name="quantiteServ'+next_exp+'" placeholder="Quantité produit"   value="1">';
            // content += '<input type="text" id="id'+next_exp+'" name="id'+next_exp+'" value="'+next_exp+'">';
            content += '</div>';
            content += '<div class="col-lg-3" id="btn'+next_exp+'">';
            content += '<a href="#" id="plus'+next_exp+'" onclick="addServ()" name="add-Serv'+next_exp+'" class="plus action-button">Ajouter</a>';
            content += '<a href="#" id="'+next_exp+'" onclick="removeProd('+next_exp+')" name="moins'+next_exp+'" class="moins action-remove">Supprimer</a>';
            content += '</div><span id="space'+next_exp+'"><br><br><br><br></span>';

        div.innerHTML = content;
        div.setAttribute('id', 'contentOp'+next_exp);
        div.setAttribute('class', 'contentOp');
        contentProd.appendChild(div);
        document.getElementById('count').value = next_exp;
        plus.remove();
    }

    function addProdServ(){
        //alert('Bonjour');
        var count = document.getElementById('count').value;
        var next_exp = parseInt(count) + 1;
        var contentProd = document.getElementById('bodyContent');
        var div = document.createElement('div');
        var div2 = document.createElement('div');
        var plus = document.getElementById('plus'+count);
        //var moins = document.getElementById('moins'+count).value;
        var content = '<div class="col-lg-7">';
            content += '<select id="service'+next_exp+'" class="list-dt" name="service'+next_exp+'">';
            content += optionserv;
            content += '</select>';
            content += '</div>';
            content += '<div class="col-lg-2">';
            content += '<input type="text" id="quantiteServ'+next_exp+'" name="quantiteServ'+next_exp+'" placeholder="Quantité produit"   value="1">';
            // content += '<input type="text" id="id'+next_exp+'" name="id'+next_exp+'" value="'+next_exp+'">';
            content += '</div>';
            content += '<div class="col-lg-3" id="btn'+next_exp+'">';
            content += '<a href="#" id="plus'+next_exp+'" onclick="addProdServ()" name="add-Serv'+next_exp+'" class="plus action-button">Ajouter</a>';
            content += '<a href="#" id="'+next_exp+'" onclick="removeProd('+next_exp+')" name="moins'+next_exp+'" class="moins action-remove">Supprimer</a>';
            content += '</div>';

        div2.innerHTML = content;
        div.setAttribute('id', 'contentOp'+next_exp);
        div2.setAttribute('id', 'produitDiv'+next_exp);
        div2.setAttribute('class', 'col-lg-6');
        div.appendChild(div2);
        contentProd.appendChild(div);
        document.getElementById('count').value = next_exp;
        plus.remove();
    }

    function removeProd(id){
        var count = document.getElementById('count').value;
        var removeBtn = document.getElementById(id).id;
        //alert(removeBtn);
        var backDiv = parseInt(removeBtn) - 1;
        var removeDiv = document.getElementById('contentOp'+removeBtn);
        var upDivBtn = document.getElementById('btn'+backDiv);
        var upDiv = document.getElementById('contentOp'+backDiv);
        var oldSpan = document.getElementById('space'+backDiv);
        var div = document.createElement('div');
        var span = document.createElement('span');
        
        document.getElementById('count').value = parseInt(count) - 1;
        
        if(removeBtn == count && count != 2){
            removeDiv.remove();
            oldSpan.remove();
            upDivBtn.remove();
            var content = '<a href="#" id="plus'+backDiv+'" onclick="addProd()" name="add-more'+backDiv+'" class="plus action-button">Ajouter</a>';
            content += '<a href="#" id="'+backDiv+'" onclick="removeProd('+backDiv+')" name="moins'+backDiv+'" class="moins action-remove">Supprimer</a>';
            var spanContent = '<br><br><br><br>';
            div.innerHTML = content;
            span.innerHTML = spanContent;
            div.setAttribute('id', 'btn'+backDiv);
            div.setAttribute('class', 'col-lg-3');
            upDiv.appendChild(div);
            span.setAttribute('id', 'space'+backDiv);
            upDiv.appendChild(span);
        }
        if(count == 2){
            removeDiv.remove();
            oldSpan.remove();
            upDivBtn.remove();
            var content = '<a href="#" id="plus'+backDiv+'" onclick="addProd()" name="add-more'+backDiv+'" class="plus action-button">Ajouter</a>';
            var spanContent = '<br><br><br><br>';
            div.innerHTML = content;
            span.innerHTML = spanContent;
            div.setAttribute('id', 'btn'+backDiv);
            div.setAttribute('class', 'col-lg-2');
            upDiv.appendChild(div);
            span.setAttribute('id', 'space'+backDiv);
            upDiv.appendChild(span);
        }
        if(removeBtn > 1 && removeBtn < count){
            removeDiv.remove();
        }
    }
</script>
@endsection