<?php

namespace App\Http\Controllers;

use App\Installation;
use Illuminate\Http\Request;

class InstallationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $installations = Installation::select('installations.*', 'souscriptions.site')
        ->join('souscriptions', 'souscriptions.id', '=', 'installations.idSouscription')
        ->where('installations.statut','!=', 0)
        ->paginate(6);
        return view('installations.installations', ['menu_id' => $id, 'installations' => $installations]);
    }

    public function afficherStats($id)
    {
        $termine = Installation::where('installations.statut','=', 2)->get();
        $encours = Installation::where('installations.statut','=', 1)->get();
        $nonprogramme = Installation::where('installations.statut','=', 0)->get();
        return view('installations.stats', ['menu_id' => $id, 
        'termine' => $termine, 'encours' => $encours, 'nonprogramme' => $nonprogramme]);
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
    public function store(Request $request, $id)
    {
        $form_data = array(
            'upload'        =>  $request->upload,
            'download'        =>  $request->download,
            'signal'        =>  $request->signal,
            'dateInstall'        =>  $request->dateInstall,
            'statut'        =>  2
        );
        Installation::whereId($request->id_inst)->update($form_data);
            return redirect(route('installations.index', $id))
                ->with('success','Installation réalisée avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Installation  $installation
     * @return \Illuminate\Http\Response
     */
    public function show(Installation $installation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Installation  $installation
     * @return \Illuminate\Http\Response
     */
    public function edit(Installation $installation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Installation  $installation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Installation $installation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Installation  $installation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Installation $installation)
    {
        //
    }
}
