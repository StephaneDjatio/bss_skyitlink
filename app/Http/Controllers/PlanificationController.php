<?php

namespace App\Http\Controllers;

use App\AppartEquipe;
use App\Client;
use App\Employe;
use App\EquipeInstallation;
use App\Installation;
use App\Planification;
use App\Souscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $planifications = Planification::select('planifications.*', 'installations.idEquipe', 'installations.statut as statut_install', 'souscriptions.site',
        'clients.nomCli', 'clients.adresseCli', 'clients.prenomCli', 'clients.codeCli')
        ->join('installations', 'installations.id', '=', 'planifications.idInstallation')
        ->join('souscriptions', 'souscriptions.id', '=', 'installations.idSouscription')
        ->join('clients', 'clients.id', '=', 'souscriptions.idClient')
        ->paginate(6);
        return view('installations.planifications', ['menu_id' => $id, 'planifications' => $planifications]);
    }

    public function getSites() {

        // $cities = City::where('country_id', $id);
        $id = $_GET['client_id'];
        $sites = Souscription::select('installations.id','souscriptions.site')
        ->join('installations', 'souscriptions.id', '=', 'installations.idSouscription')
        ->where('souscriptions.idClient', $id)
        ->where('installations.statut', 0)
        ->get();

        return json_encode($sites);
    }

    public function getTeam() {

        // $cities = City::where('country_id', $id);
        $id = $_GET['equipe_id'];
        $team = EquipeInstallation::select('equipe_installations.libelleEquipe', 'employes.*')
        ->join('appart_equipes', 'appart_equipes.idEquipe', '=', 'equipe_installations.id')
        ->join('affectations', 'affectations.id', '=', 'appart_equipes.idEmp')
        ->join('employes', 'employes.id', '=', 'affectations.idEmp')
        ->where('equipe_installations.id', $id)
        ->get();

        return json_encode($team);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $clients= Client::get();
        //$techniciens= Employe::where('idPoste', 6)->get();
        $techniciens = Employe::select('employes.*','libellePoste', 'salaireDeBase', 'idPoste', 'affectations.id as affect')
        ->join('affectations', 'affectations.idEmp', '=', 'employes.id')
        ->join('postes', 'postes.id', '=', 'affectations.idPoste')
        ->where('affectations.statut', 1)
        ->where('idPoste', 6)
        ->get();
        return view('installations.add', ['menu_id' => $id,'clients' => $clients,'techniciens' => $techniciens]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $form_data = array(
            'datePlan'        =>  $request->datePlan,
            'statutPlan'        =>  0,
            'idEmp'        =>  Auth::user()->id,
            'idInstallation'        =>  $request->sites,
        );

        $planification = Planification::create($form_data);

        $form_data1 = array(
            'libelleEquipe'        =>  $request->equipe,
            'statut'        =>  0
        );

        $equipe = EquipeInstallation::create($form_data1);

        foreach ($request->techniciens as $technicien) {
            $form_data2 = array(
                'idEquipe'        =>  $equipe->id,
                'idEmp'        =>  $technicien
            );
            AppartEquipe::create($form_data2);
        }

        $form_data3 = array(
            'idEquipe'        =>  $equipe->id,
            'statut'        =>  1
        );
        Installation::whereId($request->sites)->update($form_data3);
        return redirect(route('planifications.index', 4))
                ->with('success','Planification effctuee avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Planification  $planification
     * @return \Illuminate\Http\Response
     */
    public function show(Planification $planification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Planification  $planification
     * @return \Illuminate\Http\Response
     */
    public function edit(Planification $planification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Planification  $planification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planification $planification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Planification  $planification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planification $planification)
    {
        //
    }
}
