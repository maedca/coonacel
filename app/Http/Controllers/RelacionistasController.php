<?php

namespace App\Http\Controllers;

use App\Relacionista;
use Illuminate\Http\Request;

class RelacionistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relacionistas = Relacionista::all();
//        dd($relacionistas);
        return view('relacionistas.index', compact('relacionistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('relacionistas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'ci' => 'required|integer|unique:relacionistas',
            'phone' => 'required|string',
            'email' => 'required|email'
        ]);
        Relacionista::create($request->all());
        return redirect()->route('relacionistas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Relacionista  $relacionista
     * @return \Illuminate\Http\Response
     */
    public function show(Relacionista $relacionista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Relacionista  $relacionista
     * @return \Illuminate\Http\Response
     */
    public function edit(Relacionista $relacionista)
    {
        return view('relacionistas.edit',compact('relacionista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Relacionista  $relacionista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Relacionista $relacionista)
    {
        $this->validate($request,[
            'name'=> 'required',
            'ci' => 'required|integer',
            'phone' => 'required|string',
            'email' => 'required|email'
        ]);
        $relacionista->update($request->all());
        return redirect()->route('relacionistas.edit',$relacionista);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Relacionista  $relacionista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Relacionista $relacionista)
    {
        $relacionista->delete();

        return redirect()->route('relacionistas.index');

    }
}
