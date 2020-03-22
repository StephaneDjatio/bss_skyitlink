<?php

namespace App\Http\Controllers;

use App\Client;
use App\Souscription;
use App\Facture;
use App\Installation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $clients = Client::paginate(6);
        return view('clients.index', ['menu_id' => $id, 'clients' => $clients, 'confirm' => 0]);
    }

    public function confirm()
    {
        $clients = Client::paginate(6);
        return view('clients.index', ['menu_id' => 1, 'clients' => $clients, 'confirm' => 1]);
    }

    public function mesSouscriptions($id)
    {
        $souscriptions = Souscription::select('clients.nomCli', 'clients.id as idCli', 'clients.prenomCli', 'clients.codeCli',
         'souscriptions.*', 'services.libelleService')
        ->join('clients', 'clients.id', '=', 'souscriptions.idClient')
        ->join('services', 'services.id', '=', 'souscriptions.idService')
        ->where('clients.id', '=', $id)
        ->OrderBy('souscriptions.statut', 'ASC')
        ->OrderBy('souscriptions.created_at', 'DESC')
        ->paginate(6);

        $client = Client::find($id);
        return view('clients.souscriptions', ['menu_id' => 1, 
        'souscriptions' => $souscriptions, 'client' => $client,]);
    }

    public function getClient() {

        // $cities = City::where('country_id', $id);
        $id = $_GET['souscription_id'];
        $souscription = Souscription::find($id);
        $client = Client::where('id',$souscription->idClient)->get();

        return json_encode($client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $codeCli = $this->str_random('SKY',7);
        return view('clients.add', ['menu_id' => $id, 'codeCli' => $codeCli]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $codeCli = $this->str_random('SKY',7);
        $password = Hash::make($request->password);
        $form_data = array(
            'codeCli'        =>  $request->codeCli,
            'nomCli'        =>  $request->fname,
            'typeCli'        =>  $request->typeclient,
            'prenomCli'        =>  $request->lname,
            'adresseCli'        =>  $request->address,
            'telCli'        =>  $request->phno,
            'telCli2'        =>  $request->phno_2,
            'mailCli'        =>  $request->mail_address,
            'nomUtilisateur'        =>  $request->username,
            'motPasse'        =>  $password
        );
        $client = Client::create($form_data);
        return json_encode($client->id);
    }

    public function storeSouscription(Request $request)
    {
        $client = Client::where('codeCli', $request->client)->get();
        $form_data = array(
            'site'        =>  $request->site,
            'idClient'        =>  $client[0]->id,
            'idService'        =>  $request->service
        );
        $souscription = Souscription::create($form_data);
        $form_data1 = array(
            'idType'        =>  1,
            'idSouscription'        =>  $souscription->id,
            'reference'        =>  $this->str_random('FA',7),
            'objet'        =>  'Souscription au service de connexion par satellite',
            'dateFacturation'        =>  date('Y-m-d')
        );
        $facture = Facture::create($form_data1);
        $form_data2 = array(
            'idSouscription'        =>  $souscription->id
        );
        Installation::create($form_data2);
        return json_encode($souscription->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', ['menu_id' => 1, 'client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form_data = array(
            'nomCli'        =>  $request->fname,
            'typeCli'        =>  $request->typeclient,
            'prenomCli'        =>  $request->lname,
            'adresseCli'        =>  $request->address,
            'telCli'        =>  $request->phno,
            'telCli2'        =>  $request->phno_2,
            'nomUtilisateur'        =>  $request->username,
            'mailCli'        =>  $request->mail_address
        );
        Client::whereId($id)->update($form_data);
            return redirect(route('clients.index', 1))
                ->with('success','Client Modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
