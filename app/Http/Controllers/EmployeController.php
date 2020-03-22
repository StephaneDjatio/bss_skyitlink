<?php

namespace App\Http\Controllers;

use App\Employe;
use App\Affectation;
use App\Poste;
use Illuminate\Http\Request;

class EmployeController extends Controller
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
        $employes = Employe::select('employes.*','libellePoste', 'salaireDeBase', 'idPoste', 'affectations.id as affect')
        ->join('affectations', 'affectations.idEmp', '=', 'employes.id')
        ->join('postes', 'postes.id', '=', 'affectations.idPoste')
        ->where('affectations.statut', 1)
        ->paginate(5);
        return view('employes.index', ['menu_id' => $id, 'employes' => $employes]);
    }

    public function getEmploye() {

        // $cities = City::where('country_id', $id);
        $id = $_GET['employe_id'];
        $employe = Employe::select('employes.*', 'salaireDeBase')
        ->join('affectations', 'affectations.idEmp', '=', 'employes.id')
        ->where('employes.id',$id)
        ->where('affectations.statut',1)
        ->get();

        return json_encode($employe);
    }

    public function getEmployePoste() {

        // $cities = City::where('country_id', $id);
        $id = $_GET['employe_id'];
        $poste = $_GET['poste'];
        $employe = Employe::where('id',$id)->get();
        $postes= Poste::where('id','!=',$poste)->get();
        $data['employe'] = $employe;
        $data['postes'] = $postes;

        return json_encode($data);
    }

    public function getEmployes() {

        // $cities = City::where('country_id', $id);
        $employes = Employe::get();

        return json_encode($employes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $postes = Poste::get();
        $matricule = $this->str_random('SKY',3);
        return view('employes.add', 
        ['menu_id' => $id, 
        'postes' => $postes, 
        'matricule' => $matricule]);
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
            'matriEmp'        =>  $request->matricule,
            'nomEmp'        =>  $request->nom,
            'prenomEmp'        =>  $request->prenom,
            'adresseEmp'        =>  $request->adresse,
            'numCNI'        =>  $request->cni,
            'telephoneEmp'        =>  $request->telephone,
            'salaireDeBase'        =>  $request->salaire,
            'idPoste'        =>  $request->poste
        );
        $employe = Employe::create($form_data);

        $form_data1 = array(
            'salaireDeBase'        =>  $request->salaire,
            'dateAffectation'        =>  date('Y-m-d'),
            'idEmp'        =>  $employe->id,
            'statut'        =>  1,
            'idPoste'        =>  $request->poste
        );
        Affectation::create($form_data1);
            return redirect(route('employe', $id))
                ->with('success','Employé créé avec success');
    }

    public function affectation(Request $request, $id)
    {

        $form_data = array(
            'salaireDeBase'        =>  $request->salaire,
            'dateAffectation'        =>  $request->dateaffectation,
            'idEmp'        =>  $request->id_emp,
            'statut'        =>  1,
            'idPoste'        =>  $request->poste
        );
        Affectation::create($form_data);
        $form_data1 = array(
            'statut'        =>  0
        );
        Affectation::whereId($request->id_aff)->update($form_data1);
            return redirect(route('employe', $id))
                ->with('success','Employé affecté à un nouveau poste');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employe = Employe::find($id);
        $postes = Poste::get();
        return view('employes.edit', 
        ['menu_id' => $this->menu_id, 
        'employe' => $employe, 
        'postes' => $postes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form_data = array(
            'nomEmp'        =>  $request->nom,
            'prenomEmp'        =>  $request->prenom,
            'adresseEmp'        =>  $request->adresse,
            'numCNI'        =>  $request->cni,
            'telephoneEmp'        =>  $request->telephone,
            'salaireDeBase'        =>  $request->salaire,
            'idPoste'        =>  $request->poste
        );
        Employe::whereId($id)->update($form_data);
            return redirect(route('employe', $this->menu_id))
                ->with('success','Employé Modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        //
    }

}
