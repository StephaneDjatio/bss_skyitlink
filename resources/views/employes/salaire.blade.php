@extends('layouts.default')
@section('content')
<!--overview start-->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i> Salaires des Employés</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Menu Principal</li>
            <li><i class="fa fa-laptop"></i>Liste des salaires payés</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        @include('errors')
    </div>

    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            Liste des salaires payés
            </header><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-3">
                        <div class="form-group ">
                            <label for="mois" class="control-label col-lg-2">Mois</label>
                            <div class="col-lg-7">
                                <select class="form-control recherche" name="mois" id="mois">
                                    <option value="">Mois</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group ">
                            <label for="annee" class="control-label col-lg-2">Année</label>
                            <div class="col-lg-7">
                                <select class="form-control recherche" name="annee" id="annee">
                                    <option value="">Année</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group ">
                            <label for="nom" class="control-label col-lg-3">Employé</label>
                            <div class="col-lg-9">
                                <select class="form-control recherche" name="nom" id="nom">
                                    <option value="">Employé</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group ">
                            <label for="dateP" class="control-label col-lg-4">Date de Paie</label>
                            <div class="col-lg-8">
                                <input type="date" class="form-control recherche" name="dateP" id="dateP">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-advance table-hover table-bordered" id="salaries">
                <thead>
                    <tr>
                        <th><i class="icon_key"></i> #Matricule</th>
                        <th>Nom & Prénom</th>
                        <th>Numéro de CNI</th>
                        <th>Poste</th>
                        <th><i class="icon_calendar"></i> Date Paiement</th>
                        <th><i class="fa fa-money"></i> Montant</th>
                        <th><i class="icon_calendar"></i> Mois et Année</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @forelse($salaires as $salaire)
                    <?php
                        setlocale(LC_TIME, "fr_FR");
                        $dateObj   = DateTime::createFromFormat('!m', $salaire->mois);
                    ?>
                    <tr>
                        <td>{{$salaire->matriEmp}}</td>
                        <td>{{$salaire->nomEmp}} {{$salaire->prenomEmp}}</td>
                        <td>{{$salaire->numCNI}}</td>
                        <td>{{$salaire->libellePoste}}</td>
                        <td>{{$salaire->datePaiement}}</td>
                        <td><b class="pull-right badge">{{$salaire->montant + $salaire->prime}} FCFA</b></td>
                        <td class="text-center">
                            <b>
                                {{$monthName = $dateObj->format('F')}}
                                {{$salaire->annee}} 
                            </b>
                        </td>
                        <td>
                            <div class="btn-group">
                            <a class="btn btn-primary edit" id="{{$salaire->id}}" href=""><i class="fa fa-edit"></i></a>
                            <!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->
                            <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8"><h4 class="text-center">Aucun salaire enrégistré</h4></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pull-right">{{$salaires->links()}}</div>
        </section>
    </div>
</div>
<!-- page end-->
@endsection

@section('scripts')
<script>

    function isEmpty(object) { 
        for (var key in object) { 
            if (object.hasOwnProperty(key)) { 
                return false; 
            } 
        } 

        return true; 
    }
    
    $(document).ready(function() {
        var date = new Date();
        var monthArray = new Array();
            monthArray[0] = "Janvier";
            monthArray[1] = "Fevrier";
            monthArray[2] = "Mars";
            monthArray[3] = "Avril";
            monthArray[4] = "Mai";
            monthArray[5] = "Juin";
            monthArray[6] = "Juillet";
            monthArray[7] = "Août";
            monthArray[8] = "Septembre";
            monthArray[9] = "Octobre";
            monthArray[10] = "Novembre";
            monthArray[11] = "Decembre";
        for(m = 0; m <= 11; m++) {
            var optn = document.createElement("OPTION");
            optn.text = monthArray[m];
            // server side month start from one
            optn.value = (m+1);
            var month = date.getMonth();
            // if june selected
            /**if (m == month) {
                optn.selected = true;
            }**/
            document.getElementById('mois').options.add(optn);
        }
        for(y = 2018; y <= 2030; y++) {
            var optn = document.createElement("OPTION");
            optn.text = y;
            optn.value = y;
            var currentyear = date.getFullYear();
            /**if (y == currentyear) {
                optn.selected = true;
            }**/ 
            document.getElementById('annee').options.add(optn);  
        }

        $.ajax({
            url: '/employes',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                var select1 = '<option value="">Employé</option>';
                data.forEach(function(item){
                    select1 += '<option value="'+item.id+'">'+item.nomEmp+' '+item.prenomEmp+'</option>';
                });
                document.getElementById('nom').innerHTML = select1;  
            }
        });

        function getMonth(month){
            return monthArray[month];
        }

        var table = document.getElementById('salaries')
        $('.recherche').on('change', function() {
            var mois = document.getElementById('mois').value;;
            var annee = document.getElementById('annee').value;
            var nom = document.getElementById('nom').value;
            var dateP = document.getElementById('dateP').value;
            $.ajax({
                url: '/search',
                type: 'GET',
                data:{mois:mois, annee:annee, nom:nom, dateP:dateP},
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $("#tbody tr").remove();
                    if(!isEmpty(data)){
                        data.forEach(function(item){
                            console.log(item);
                            var content='';
                            var salary = item.montant + item.prime;
                            content += '<tr>';
                            content += '<td>'+item.matriEmp+'</td>';
                            content += '<td>'+item.nomEmp+' '+item.prenomEmp+'</td>';
                            content += '<td>'+item.numCNI+'</td>';
                            content += '<td>'+item.libellePoste+'</td>';
                            content += '<td>'+item.datePaiement+'</td>';
                            content += '<td><b class="pull-right badge">'+salary+' FCFA</b></td>';
                            content += '<td>'+getMonth(item.mois - 1)+' '+item.annee+'</td>';
                            content += '<td><div class="btn-group">'+
                                '<a class="btn btn-primary edit" id="" href=""><i class="fa fa-edit"></i></a>'+
                                '<!--<a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>-->'+
                                '<a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>'+
                                '</div></td>';
                            content += '</tr>';
                            $(table).find('tbody').append(content);
                        });
                    }else{
                        var content = '';
                        content += '<tr>';
                        content += '<td colspan="8"><h4 class="text-center">Aucun salaire enrégistré pour ce mois</h4></td>';
                        content += '</tr>';
                        $(table).find('tbody').append(content);
                    }
                     
                }
            });
            //$("#tbody tr").remove();
        });

        $('#annee').on('change', function() {
            annee = this.value;
        });

        $('#nom').on('change', function() {
            nom = this.value;
        });
    });
</script>
@endsection