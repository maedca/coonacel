<?php

namespace App\Http\Controllers;

use App\Conferencista;
use Illuminate\Http\Request;

class ConferencistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $conferencistas =  Conferencista::all();
        return view('conferencistas.index' , compact('conferencistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conferencistas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request,[
            'name'=> 'required',
            'ci' => 'required|integer|unique:conferencistas',
            'phone' => 'required|string',
            'email' => 'required|email'
            ]);

        Conferencista::create($request->all());
        return redirect()->route('conferencistas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conferencista  $conferencista
     * @return \Illuminate\Http\Response
     */
    public function show(Conferencista $conferencista)
    {
        $conferencista = Conferencista::finOrFail($conferencista);
        return view('conferencistas.show', compact('conferencista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Conferencista  $conferencista
     * @return \Illuminate\Http\Response
     */
    public function edit(Conferencista $conferencista)
    {
//        $conferencista = Conferencista::finOrFail($conferencista);

        return view('conferencistas.edit',compact('conferencista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Conferencista  $conferencista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conferencista $conferencista)
    {
        $this->validate( $request,[
            'name'=> 'required',
//            'ci' => 'required|integer|unique:conferencistas',
            'phone' => 'required|string',
            'email' => 'required|email'
        ]);
//dd($request);
        $conferencista->update($request->all());
        return redirect()->route('conferencistas.index',$conferencista);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conferencista  $conferencista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conferencista $conferencista)
    {
        $conferencista->delete();

        return redirect()->route('conferencistas.index');
    }
}
