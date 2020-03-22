<?php

namespace App\Http\Controllers;

use App\Employe;
use App\Affectation;
use App\Profil;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UserController extends Controller
{
    private $menu_id = 7;

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
        $users = User::select('employes.*', 'users.*','libelleProfil')
        ->join('affectations', 'affectations.idUser', '=', 'users.id')
        ->join('employes', 'affectations.idEmp', '=', 'employes.id')
        ->join('profils', 'profils.id', '=', 'users.idProfil')
        ->paginate(6);
        return view('users.index', ['menu_id' => $id, 'users' => $users]);
    }

    public function getUser() {

        // $cities = City::where('country_id', $id);
        $id = $_GET['user_id'];
        $user = User::where('id',$id)->get();
        $profils = Profil::get();

        $data['user'] = $user;
        $data['profils'] = $profils;

        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $employes = Employe::select('employes.nomEmp', 'employes.prenomEmp', 'affectations.id')
        ->join('affectations', 'affectations.idEmp', '=', 'employes.id')
        ->where('affectations.statut',1)
        ->where('affectations.idUser',null)
        ->get();
        $profils = Profil::get();
        return view('users.add', 
        ['menu_id' => $id, 'employes' => $employes, 'profils' => $profils]);
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
            'name'        =>  $request->username,
            'email'        =>  $request->username.'@skyitlink.cm',
            'password'        =>  $request->password,
            'statut'        =>  1,
            'idProfil'        =>  $request->profil
        );
        $last_id = User::create($form_data);
        $form_data1 = array(
            'idUser'        =>  $last_id->id
        );
        Affectation::whereId($request->employe)->update($form_data1);
            return redirect(route('users', $id))
                ->with('success','Compte utilisateur créé avec success');
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
        $form_data = array(
            'idProfil'        =>  $request->profil
        );
        //dd($id);
        User::whereId($request->user_id)->update($form_data);
            return redirect(route('users', $this->menu_id))
                ->with('success','Compte Modifié avec success');
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
