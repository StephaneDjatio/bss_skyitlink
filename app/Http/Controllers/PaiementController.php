<?php

namespace App\Http\Controllers;

use App\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $paiements = Paiement::select('factures.reference', 'paiements.*', 'employes.nomEmp', 'employes.prenomEmp',
        'clients.nomCli', 'clients.adresseCli', 'clients.prenomCli', 'clients.codeCli', 'services.montant', 
        'services.libelleService')
        ->join('factures', 'factures.id', '=', 'paiements.idFacture')
        ->join('souscriptions', 'souscriptions.id', '=', 'factures.idSouscription')
        ->join('clients', 'clients.id', '=', 'souscriptions.idClient')
        ->join('services', 'services.id', '=', 'souscriptions.idService')
        ->join('users', 'users.id', '=', 'paiements.iduser')
        ->join('affectations', 'users.id', '=', 'affectations.iduser')
        ->join('employes', 'employes.id', '=', 'affectations.idEmp')
        ->paginate(6);
        return view('paiements.index', ['menu_id' => $id, 'paiements' => $paiements]);
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
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paiement $paiement)
    {
        //
    }
}
