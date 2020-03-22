<?php

namespace App\Http\Controllers;

use App\Module;
use App\SubModule;
use Illuminate\Http\Request;

class ModuleController extends Controller
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
        $modules = Module::paginate(6);
        return view('modules.modules', ['menu_id' => $id, 'modules' => $modules]);
    }

    public function indexSubModule($id)
    {
        $modules = Module::get();
        $sousmodules = SubModule::select('sub_modules.*','module')
        ->join('modules', 'modules.id', '=', 'sub_modules.idModule')
        ->paginate(6);
        return view('modules.sousmodules', ['menu_id' => $id, 'modules' => $modules, 'sousmodules' => $sousmodules]);
    }

    public function getModule() {

        // $cities = City::where('country_id', $id);
        $id = $_GET['module_id'];
        $module = Module::where('id',$id)->get();

        return json_encode($module);
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
            'module'        =>  $request->module,
            'couleur'        =>  $request->color,
            'icon'        =>  $request->icon
        );

        if (!empty($request->module_id)) {
            Module::whereId($request->module_id)->update($form_data);
            return redirect(route('modules', $id))
                ->with('success','Module modifié avec success');
        } else {
            Module::create($form_data);
            return redirect(route('modules', $id))
                ->with('success','Module créé avec success');
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
