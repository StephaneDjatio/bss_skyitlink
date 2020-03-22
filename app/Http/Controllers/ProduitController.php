<?php

namespace App\Http\Controllers;

use App\Produit;
use App\Typeproduit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $produits = Produit::select('produits.*', 'libelleTypeProduit')
        ->join('typeproduits', 'typeproduits.id', '=', 'produits.idType')
        ->paginate(6);

        $types = Typeproduit::get();

        return view('produits.index',
            ['menu_id' => $id, 'produits' => $produits, 'types' => $types]
        );
    }

    public function getProduit() {

        // $cities = City::where('country_id', $id);
        $id = $_GET['produit_id'];
        $produit = Produit::where('id',$id)->get();
        $type = Typeproduit::get();
        $data['produit'] = $produit;
        $data['type'] = $type;

        return json_encode($data);
    }

    public function getProduits() {

        // $cities = City::where('country_id', $id);
        $produit = Produit::get();

        return json_encode($produit);
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
            'libelleProduit'        =>  $request->produit,
            'montant'        =>  $request->montant,
            'stock'        =>  $request->stock,
            'idType'        =>  $request->type
        );

        if (!empty($request->produit_id)) {
            Produit::whereId($request->produit_id)->update($form_data);
            return redirect(route('produits', $id))
                ->with('success','Modification du Produit effectuée avec success');
        } else {
            Produit::create($form_data);
            return redirect(route('produits', $id))
                ->with('success','Nouveau Produit ajouté avec success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
