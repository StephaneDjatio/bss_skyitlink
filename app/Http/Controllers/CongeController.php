<?php

namespace App\Http\Controllers;

use App\Conge;
use App\Employe;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    private $menu_id = 6;

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
        $conges = Conge::select('employes.*', 'conges.*')
        ->join('employes', 'employes.id', '=', 'conges.idEmp')
        ->paginate(6);
        return view('employes.conge', ['menu_id' => $id, 'conges' => $conges]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $employes = Employe::get();
        return view('employes.addConge', ['menu_id' => $id, 'employes' => $employes]);
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
            'libelleConge'        =>  $request->motifs,
            'dateDeb'        =>  $request->dateDeb,
            'dateFin'        =>  $request->dateFin,
            'idEmp'        =>  $request->employe
        );
        Conge::create($form_data);
            return redirect(route('conges', $id))
                ->with('success','Congé enregistré');
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
        $conge = Conge::find($id);
        $employes = Employe::get();
        return view('employes.addConge', 
        ['menu_id' => $this->menu_id, 
        'employes' => $employes, 
        'conge' => $conge]);
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
        $form_data = array(
            'libelleConge'        =>  $request->motifs,
            'dateDeb'        =>  $request->dateDeb,
            'dateFin'        =>  $request->dateFin,
            'idEmp'        =>  $request->employe
        );
        Conge::whereId($id)->update($form_data);
        return redirect(route('conges', $this->menu_id))
                ->with('success','Congé modifié');
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
