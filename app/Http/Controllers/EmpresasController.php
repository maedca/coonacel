<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Industry;
use App\Relacionista;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'relacionista'){
            $id = auth()->user()->id;
            $empresas = Empresa::where('relacionista_id',$id)->get();
            return view('Empresas.index', compact('empresas'));
        }
        $empresas = Empresa::all();


        return view('Empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role == 'relacionista'){
            $relacionista = auth()->user();
            $industries = Industry::orderBy('name', 'ASC')->get();
            return view('Empresas.create', compact('relacionista', 'industries'));
        }
        $relacionistas = User::where('role', 'relacionista')->orderBy('name', 'ASC')->get();
        $industries = Industry::orderBy('name', 'ASC')->get();
        return view('Empresas.create', compact('relacionistas', 'industries'));
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
        $data = $this->validate($request, [
            'name' => 'required',
            'nit' => 'required',
            'url' => 'required',
            'industry_id' => 'required',
            'empleados' => 'required',
            'tel_ofi' => 'required',
            'cel' => 'required',
            'contacto_1' => 'required',
            'cargo_1' => 'required',
            'tel_1' => 'required',
            'contacto_2' => 'nullable',
            'cargo_2' => 'nullable',
            'tel_2' => 'nullable',
            'descripcion' => 'required',
            'email' => 'required',
            'calle' => 'required',
            'ciudad' => 'required',
            'municipio' => 'required',
            'barrio' => 'required',
            'pais' => 'required',
            'relacionista_id' => 'required',
        ]);
//        $data['relacionista_id'] = auth()->user()->id;
//        dd($data);
        Empresa::create($data);
        return redirect()->route('Empresas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);

        $relacionista = $empresa->relacionista()->get();

        return view('Empresas.show', compact('empresa', 'relacionista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        $relacionistas = Relacionista::all();
        $industries = Industry::all();
//        dd($empresa);
        return view('Empresas.edit', compact('empresa', 'relacionistas', 'industries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'nit' => 'required',
            'url' => 'required',
            'industry_id' => 'required',
            'empleados' => 'required',
            'tel_ofi' => 'required',
            'cel' => 'required',
            'contacto_1' => 'required',
            'cargo_1' => 'required',
            'tel_1' => 'required',
            'contacto_2' => 'nullable',
            'cargo_2' => 'nullable',
            'tel_2' => 'nullable',
            'descripcion' => 'required',
            'email' => 'required',
            'calle' => 'required',
            'ciudad' => 'required',
            'municipio' => 'required',
            'barrio' => 'required',
            'pais' => 'required',
            'relacionista_id' => 'required',
        ]);

        $empresa = Empresa::find($id);
        $empresa->update($request->all());
//     dd($empresa);
        return redirect()->route('Empresas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);
       $empresa->delete();
       return redirect()->route('Empresas.index');
    }
}
