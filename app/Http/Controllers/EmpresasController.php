<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use App\Relacionista;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
       $relacionistas =  Relacionista::orderBy('name', 'ASC')->get();
        return view('Empresas.create', compact('relacionistas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $this->validate($request,[
            'name' =>'required',
            'nit'=>'required',
            'url'=>'required',
            'industria'=>'required',
            'empleados'=>'required',
            'tel_ofi'=>'required',
            'cel'=>'required',
            'contacto_1'=>'required',
            'cargo_1'=>'required',
            'tel_1'=>'required',
            'contacto_2'=> 'nullable',
            'cargo_2' =>'nullable',
            'tel_2' => 'nullable',
            'descripcion' =>'required',
            'email' =>'required',
            'calle' =>'required',
            'ciudad' =>'required',
            'municipio' =>'required',
            'barrio' =>'required',
            'pais'=>'required'
        ]);

        Empresa::create($request->all());
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
     $relacionista =  $empresa->relacionista();
        return view('empresas.show', compact('empresa', 'relacionista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
