<?php

namespace App\Http\Controllers;
use App\Souscription;
use App\Installation;

use Illuminate\Http\Request;

class SouscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $souscriptions = Souscription::select('installations.statut as statut_install', 'clients.nomCli', 'clients.id as idCli', 'clients.prenomCli', 'clients.codeCli',
         'souscriptions.*', 'services.libelleService')
        ->join('clients', 'clients.id', '=', 'souscriptions.idClient')
        ->join('installations', 'installations.idSouscription', '=', 'souscriptions.id')
        ->join('services', 'services.id', '=', 'souscriptions.idService')
        ->where('souscriptions.statut', '!=', 3)
        ->OrderBy('souscriptions.statut', 'ASC')
        ->OrderBy('souscriptions.created_at', 'DESC')
        ->paginate(6);
        return view('souscriptions.index', ['menu_id' => $id, 'souscriptions' => $souscriptions]);
    }

    public function clientsSuspendus($id)
    {
        $souscriptions = Souscription::select('clients.nomCli', 'clients.id as idCli', 'clients.prenomCli', 'clients.codeCli',
         'souscriptions.*', 'services.libelleService')
        ->join('clients', 'clients.id', '=', 'souscriptions.idClient')
        ->join('services', 'services.id', '=', 'souscriptions.idService')
        ->where('souscriptions.statut', '=', 3)
        ->OrderBy('souscriptions.statut', 'ASC')
        ->OrderBy('souscriptions.created_at', 'DESC')
        ->paginate(6);
        return view('souscriptions.index', ['menu_id' => $id, 'souscriptions' => $souscriptions]);
    }

    public function validatation(Request $request){
        $dateFin = date('Y-m-d', strtotime($request->dateDeb.' + 30 days'));
        $form_data = array(
            'dateDeb'        =>  $request->dateDeb,
            'dateFin'        =>  $dateFin,
            'statut'        =>  '1'
        );

        Souscription::whereId($request->souscription_id)->update($form_data);
            return redirect(route('souscriptions.index', 3))
                ->with('success','Activation realisee avec success');
    }

    public function suspension(Request $request){
        $form_data = array(
            'statut'        =>  '3'
        );

        Souscription::whereId($request->souscription_id)->update($form_data);
            return redirect(route('souscriptions.index', 3))
                ->with('error','Client suspendu');
    }

    public function reactiver(Request $request){
        $form_data = array(
            'statut'        =>  '1'
        );

        Souscription::whereId($request->souscription_id)->update($form_data);
            return redirect(route('souscriptions.index', 3))
                ->with('success','Reactivation reussie');
    }

    public function afficherStats($id)
    {
        $termine = Souscription::selectRaw('COUNT(id), DAY(dateFin) as day, MONTH(dateFin) as month, YEAR(dateFin) as year')
        ->where('statut', 1)
        ->orWhere('statut', 2)
        ->groupBy('dateFin')
        ->get();
        $encours = Installation::where('installations.statut','=', 1)->get();
        $nonprogramme = Installation::where('installations.statut','=', 0)->get();
        dd($termine);
        return view('souscriptions.stats', ['menu_id' => $id,
        'termine' => $termine, 'encours' => $encours, 'nonprogramme' => $nonprogramme]);
    }

    public function getSouscriptions()
    {
        $termine = Souscription::selectRaw('COUNT(id), MONTH(dateFin) as month')
        ->where('statut', 1)
        ->orWhere('statut', 2)
        ->groupBy('month')
        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
