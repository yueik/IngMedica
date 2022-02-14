<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Implante;
use App\Http\Resources\ImplanteResource;
use App\Http\Resources\ImplanteCollection;

class ImplanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$implantes = ImplanteResource::collection(Implante::all());
        $implantes = Implante::with('modelo')->get();

        return view('Implante.index')->with('implantes', $implantes);
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
        $implante = new Implante();

        $implante->modelo_id = $request->get('modelo');
        $implante->talle_id = $request->get('talle');
        $implante->codigo = $request->get('codigo');
        $implante->serie = $request->get('serie');
        $implante->estado_id = $request->get('estado');
        $implante->activo = 1;

        $implante->save();

        return redirect('/Implantes');
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
        $implante = Implante::find($id);

        $implante->modelo_id = $request->get('modelo');
        $implante->talle_id = $request->get('talle');
        $implante->codigo = $request->get('codigo');
        $implante->serie = $request->get('serie');
        $implante->estado_id = $request->get('estado');
        $implante->activo = 1;

        $implante->save();

        return redirect('/Implantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $implante = Implante::find($id);
        $implante->delete();

        //return redirect('/Implantes');
    }
}
