<?php

namespace App\Http\Controllers;

use App\Profil;
use App\Service;
use App\Typeservice;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $services = Service::select('services.*', 'libelleTypeService')
        ->join('typeservices', 'typeservices.id', '=', 'services.idType')
        ->paginate(6);

        $types = Typeservice::get();

        return view('services.index',
            ['menu_id' => $id, 'services' => $services, 'types' => $types]
        );
    }

    public function getService() {

        // $cities = City::where('country_id', $id);
        $id = $_GET['service_id'];
        $service = Service::where('id',$id)->get();
        $type = Typeservice::get();
        $data['service'] = $service;
        $data['type'] = $type;

        return json_encode($data);
    }

    public function getServices() {

        // $cities = City::where('country_id', $id);
        $services = Service::get();

        return json_encode($services);
    }

    public function getSingleService(Request $request) {

        // $cities = City::where('country_id', $id);
        $service = Service::find($request->id);

        return json_encode($service);
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
            'libelleService'        =>  $request->service,
            'montant'        =>  $request->montant,
            'idType'        =>  $request->type
        );

        if (!empty($request->service_id)) {
            Service::whereId($request->service_id)->update($form_data);
            return redirect(route('services', $id))
                ->with('success','Modification du Service effectuée avec success');
        } else {
            Service::create($form_data);
            return redirect(route('services', $id))
                ->with('success','Nouveau service ajouté avec success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
