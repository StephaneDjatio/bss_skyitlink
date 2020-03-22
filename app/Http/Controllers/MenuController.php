<?php

namespace App\Http\Controllers;

use App\Module;
use App\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
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
    public function index()
    {
        $profil = Profil::find(Auth::user()->idProfil);
        $modules_id = explode(",", $profil->modules);
        $modules = Module::whereIn('id', $modules_id)->get();
        //dd($modules);
        return view('pages.index', ['modules' => $modules]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->menu_id = $id;
        if ($this->menu_id == 1) {
            return redirect(route('clients.index', 1));
        }elseif ($this->menu_id == 2) {
            return redirect(route('factures.redevances', 2));
        }elseif ($this->menu_id == 3) {
            return redirect(route('souscriptions.stats', 3));
        }elseif ($this->menu_id == 4) {
            return redirect(route('installations.stats', 4));
        }else {
            return view('pages.sub_menu', ['menu_id' => $this->menu_id ]);
        }
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
