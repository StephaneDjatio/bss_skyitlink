<?php

namespace App\Http\Controllers;

use App\Poste;
use Illuminate\Http\Request;

class PosteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('postes.index');
    }

    public function getPostes() {

        // $cities = City::where('country_id', $id);
        $id = $_GET['poste_id'];
        $poste = Poste::where('id',$id)->get();

        return json_encode($poste);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $postes = Poste::paginate(5);
        return view('postes.add', ['menu_id' => $id, 'postes' => $postes]);
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
            'libellePoste'        =>  $request->poste
        );
        if (!empty($request->poste_id)) {
            Poste::whereId($request->poste_id)->update($form_data);
            return redirect(route('postes.create', $id))
                ->with('success','Modification du poste effectuée avec success');
        } else {
            Poste::create($form_data);
            return redirect(route('postes.create', $id))
                ->with('success','Nouveau poste ajouté avec success');
        }
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
