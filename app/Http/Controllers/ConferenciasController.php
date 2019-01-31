<?php

namespace App\Http\Controllers;

use App\Conferencia;
use App\Conferencista;
use Illuminate\Http\Request;

class ConferenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferencias = Conferencia::orderBy('name', 'ASC')->get();
        return view('conferencias.index' , compact('conferencias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conferencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Conferencia::create($request->all());
        return redirect()->route('conferencias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conferencia  $conferencia
     * @return \Illuminate\Http\Response
     */
    public function show(Conferencia $conferencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conferencia  $conferencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Conferencia $conferencia)
    {
        return view('conferencias.edit', compact('conferencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conferencia  $conferencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conferencia $conferencia)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $conferencia->update($request->all());
        return redirect()->route('conferencias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conferencia  $conferencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conferencia $conferencia)
    {
        $conferencia->delete();
        return redirect()->route('conferencias.index');
    }
}
