<?php

namespace App\Http\Controllers;

use App\Facture;
use App\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $redevances = Facture::select('clients.nomCli', 'clients.id as idCli', 'clients.prenomCli', 'clients.codeCli',
         'services.montant', 'factures.*')
        ->join('souscriptions', 'souscriptions.id', '=', 'factures.idSouscription')
        ->join('clients', 'clients.id', '=', 'souscriptions.idClient')
        ->join('services', 'services.id', '=', 'souscriptions.idService')
        ->OrderBy('souscriptions.statut', 'ASC')
        ->OrderBy('souscriptions.created_at', 'DESC')
        ->paginate(6);
        return view('factures.redevances', ['menu_id' => $id, 'redevances' => $redevances]);
    }
    
    public function paiement(Request $request)
    {
        $form_data = array(
            'datePaie'        =>  $request->datePaie,
            'montantPaie'        =>  $request->montantPaie,
            'idFacture'        =>  $request->facture_id,
            'transaction'        =>  $request->numTransaction,
            'idTypeFact'        =>  $request->modePaie,
            'idUser'        =>  Auth::user()->id
        );
        
        Paiement::create($form_data);
        $form_data1 = array(
            'statut'        =>  1
        );
        Facture::whereId($request->facture_id)->update($form_data1);
            return redirect(route('factures.redevances', 2))
                ->with('success','Facture payée');
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
     * @param  \App\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show(Facture $facture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        //
    }
}
