<?php

namespace App\Http\Controllers;

use App\ConferenceSchedule;
use App\Libranza;
use Illuminate\Http\Request;

class LibranzasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
dd('prueba');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $conferencias  = auth()->user()->conferencias()->get();
    $colections = null;
        return view('libranzas.create', compact('conferencias','empresa','colections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
dd($request->all());
        $this->validate($request,[
            'nro_libranza' => 'required|integer',
            'name'=> 'required|string|max:191',
            'cc'=> 'required|string|max:191',
            'address'=> 'required|string|max:191',
            'neighborhood'=> 'required|string|max:191',
            'city'=> 'required|string|max:191',
            'phone'=> 'required|string|max:191',
            'email'=> 'required|string|max:191',
            'birthday'=> 'required|date|max:191',
            'entrega'=> 'required|integer',
            'receiver_name'=> 'required|string|max:191',
            'referal_name1'=> 'nullable|string|max:191',
            'referal_name2'=> 'nullable|string|max:191',
            'referal_ofi_phone1'=> 'nullable|string|max:191',
            'referal_res_phone1'=> 'nullable|string|max:191',
            'referal_ofi_phone2'=> 'nullable|string|max:191',
            'referal_res_phone2'=> 'nullable|string|max:191',
            'referal_ptco1'=> 'nullable|string|max:191',
            'referal_ptco2'=> 'nullable|string|max:191',
            'collection_1'=> 'nullable|string|max:191',
            'collection_2'=> 'nullable|string|max:191',
            'collection_3'=> 'nullable|string|max:191',
            'collection_4'=> 'nullable|string|max:191',
            'collection_5'=> 'nullable|string|max:191',
            'collection_6'=> 'nullable|string|max:191',
            'price_1'=> 'nullable|integer',
            'price_2'=> 'nullable|integer',
            'price_3'=> 'nullable|integer',
            'price_4'=> 'nullable|integer',
            'price_5'=> 'nullable|integer',
            'price_6'=> 'nullable|integer',
            'total'=> 'nullable|integer',
            'cuotas'=> 'nullable|integer',
            'vr_cuotas'=> 'nullable|integer',
            'plazo'=> 'nullable|integer',
            'file'=>'required|mimes:pdf'
        ]);

//        $file = $request->file('file');
//        $name = time() . $file->getClientOriginalName();
//        $file->move(public_path() . '/libranzas/', $name);
//        $request['file'] = $name;

        Libranza::create($request->all());
        //return redirect()->route('libranza.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libranza  $libranza
     * @return \Illuminate\Http\Response
     */
    public function show(Libranza $libranza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libranza  $libranza
     * @return \Illuminate\Http\Response
     */
    public function edit(Libranza $libranza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libranza  $libranza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libranza $libranza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libranza  $libranza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libranza $libranza)
    {
        //
    }

    public function searchConferencia(Request $request)
    {

    $conferencia =  ConferenceSchedule::find($request['id']);

    $array= [];
    $array['empresa'] = $conferencia->empresa->name;
    $array['relacionista'] = $conferencia->empresa->relacionista->name;
    $array['conferencista'] = $conferencia->conferencista->name;
return $array;

    }
}
