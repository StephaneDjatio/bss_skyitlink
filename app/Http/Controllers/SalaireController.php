<?php

namespace App\Http\Controllers;

use App\Salaire;
use Illuminate\Http\Request;

class SalaireController extends Controller
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
        $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
        ->join('affectations', 'salaires.idEmp', '=', 'affectations.id')
        ->join('employes', 'employes.id', '=', 'affectations.idEmp')
        ->join('postes', 'postes.id', '=', 'affectations.idPoste')
        ->paginate(6);
        return view('employes.salaire', ['menu_id' => $id, 'salaires' => $salaires]);
    }

    public function searchSalaries() {

        // $cities = City::where('country_id', $id);
        $mois = $_GET['mois'];
        $annee = $_GET['annee'];
        $nom = $_GET['nom'];
        $dateP = $_GET['dateP'];
        if(empty($annee) && empty($mois) && empty($nom) && empty($dateP)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->get();
        }

        if(!empty($annee) && !empty($mois) && !empty($nom) && !empty($dateP)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.mois',$mois)
            ->where('salaires.annee',$annee)
            ->where('salaires.idEmp',$nom)
            ->where('salaires.datePaiement',$dateP)
            ->get();
        }elseif(!empty($nom) && !empty($mois) && !empty($dateP)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.mois',$mois)
            ->where('salaires.idEmp',$nom)
            ->where('salaires.datePaiement',$dateP)
            ->get();
        }elseif(!empty($nom) && !empty($mois) && !empty($annee)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where([
                ['salaires.mois',$mois],
                ['salaires.idEmp',$nom],
                ['salaires.annee',$annee]])
            ->get();
        }elseif(!empty($annee) && !empty($mois) && !empty($dateP)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.mois',$mois)
            ->where('salaires.annee',$annee)
            ->where('salaires.datePaiement',$dateP)
            ->get();
        }elseif(!empty($nom) && !empty($annee) && !empty($dateP)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.annee',$annee)
            ->where('salaires.idEmp',$nom)
            ->where('salaires.datePaiement',$dateP)
            ->get();
        }elseif(!empty($nom) && !empty($mois) && !empty($annee)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where([
                ['salaires.mois',$mois],
                ['salaires.idEmp',$nom],
                ['salaires.annee',$annee]])
            ->get();
        }elseif(!empty($annee) && !empty($mois) && !empty($dateP)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.mois',$mois)
            ->where('salaires.annee',$annee)
            ->where('salaires.datePaiement',$dateP)
            ->get();
        }elseif(!empty($dateP) && !empty($mois)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.mois',$mois)
            ->where('salaires.datePaiement',$dateP)
            ->get();
        }elseif(!empty($annee) && !empty($mois)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.mois',$mois)
            ->where('salaires.annee',$annee)
            ->get();
        }elseif(!empty($annee) && !empty($nom)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.idEmp',$nom)
            ->where('salaires.annee',$annee)
            ->get();
        }elseif(!empty($nom) && !empty($mois)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.mois',$mois)
            ->where('salaires.idEmp',$nom)
            ->get();
        }elseif(!empty($dateP) && !empty($nom)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.idEmp',$nom)
            ->where('salaires.datePaiement',$dateP)
            ->get();
        }elseif(!empty($annee) && !empty($dateP)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.datePaiement',$dateP)
            ->where('salaires.annee',$annee)
            ->get();
        }elseif(!empty($dateP) && !empty($nom)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.idEmp',$nom)
            ->where('salaires.datePaiement',$dateP)
            ->get();
        }elseif(!empty($mois)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.mois',$mois)
            ->get();
        }elseif(!empty($annee)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.annee',$annee)
            ->get();
        }elseif(!empty($nom)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.idEmp',$nom)
            ->get();
        }elseif(!empty($dateP)){
            $salaires = Salaire::select('employes.*','libellePoste', 'salaires.*')
            ->leftjoin('affectations', 'affectations.id', '=', 'salaires.idEmp')
            ->leftjoin('employes', 'employes.id', '=', 'affectations.idEmp')
            ->leftjoin('postes', 'postes.id', '=', 'affectations.idPoste')
            ->where('salaires.datePaiement',$dateP)
            ->get();
        }

        return json_encode($salaires);
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
            'montant'        =>  $request->salaire,
            'mois'        =>  $request->mois,
            'annee'        =>  $request->annee,
            'datePaiement'        =>  $request->datePaiement,
            'prime'        =>  $request->prime,
            'idEmp'        =>  $request->id_aff
        );
        Salaire::create($form_data);
            return redirect(route('salaire', $id))
                ->with('success','Paiement effectué avec success');
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
