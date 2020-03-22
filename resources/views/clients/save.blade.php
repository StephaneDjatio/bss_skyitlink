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
                <div class="col-sm-9 col-md-7 col-lg-12 text-center">
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
                                        <li id="payment"><strong>Produits ou Services</strong></li>
                                        <li id="confirm"><strong>Resumé</strong></li>
                                    </ul> 
                                    <!-- fieldsets -->
                                    <fieldset id="personnal_info">
                                        <div class="form-card">
                                            <h2 class="fs-title">Informations personnelles</h2> 
                                            <input type="text" id="fname" name="fname" placeholder="Nom" /> 
                                            <input type="text" name="lname" placeholder="Prénom" /> 
                                            <input type="text" name="phno" placeholder="Numéro de téléphone." /> 
                                            <input type="text" name="phno_2" placeholder="Autre Numéro de téléphone" />
                                            <input type="text" name="address" placeholder="Adresse" />
                                            <input type="email" name="mail_address" placeholder="Adresse Mail" />
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Etape suivante" />
                                    </fieldset>
                                    <fieldset id="account_info">
                                        <div class="form-card">
                                            <h2 class="fs-title">Compte</h2> 
                                            <input type="text" name="username" placeholder="Nom d'utilisateur" /> 
                                            <input type="text" name="password" placeholder="Mot de passe" /> 
                                            <input type="text" name="confirm_password" placeholder="Confirmer le mot de passe" />
                                        </div> 
                                        <input type="button" name="previous" class="previous action-button-previous" value="Retour" /> 
                                        <input type="button" name="next" class="next action-button" value="Etape suivante" />
                                    </fieldset>
                                    <fieldset id="prod_serv">
                                        <div class="form-card">
                                            <h2 class="fs-title">Produits ou Services</h2>
                                            <div class="radio-group">
                                                <div class='radio' data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px"></div>
                                                <div class='radio' data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px"></div> <br>
                                            </div> <label class="pay">Card Holder Name*</label> <input type="text" name="holdername" placeholder="" />
                                            <div class="row">
                                                <div class="col-9"> <label class="pay">Card Number*</label> <input type="text" name="cardno" placeholder="" /> </div>
                                                <div class="col-3"> <label class="pay">CVC*</label> <input type="password" name="cvcpwd" placeholder="***" /> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3"> <label class="pay">Expiry Date*</label> </div>
                                                <div class="col-9"> <select class="list-dt" id="month" name="expmonth">
                                                        <option selected>Month</option>
                                                        <option>January</option>
                                                        <option>February</option>
                                                        <option>March</option>
                                                        <option>April</option>
                                                        <option>May</option>
                                                        <option>June</option>
                                                        <option>July</option>
                                                        <option>August</option>
                                                        <option>September</option>
                                                        <option>October</option>
                                                        <option>November</option>
                                                        <option>December</option>
                                                    </select> <select class="list-dt" id="year" name="expyear">
                                                        <option selected>Year</option>
                                                    </select> </div>
                                            </div>
                                        </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="make_payment" class="next action-button" value="Confirm" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h2 class="fs-title text-center">Success !</h2> <br><br>
                                            <div class="row justify-content-center">
                                                <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                            </div> <br><br>
                                            <div class="row justify-content-center">
                                                <div class="col-7 text-center">
                                                    <h5>You Have Successfully Signed Up</h5>
                                                </div>
                                            </div>
                                        </div>
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


@endsection