<?php

namespace App\Http\Controllers;

use App\Libranza;
use Illuminate\Http\Request;
use App\ConferenceSchedule;
class LibranzasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libras = auth()->user()->libranzas()->get();

return view('libra.index',compact('libras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $conferencias  = auth()->user()->conferencias()->get();
        $colections = null;

        return view('libra.create',compact('conferencias'));
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
        $data = $this->validate($request,[
            'conferencista' => 'required|string',
            'conferencia' => 'required|string',
            'conferencista_id' => 'required|integer',
            'empresa' => 'required|string',
            'relacionista' => 'required|string',
            'nro_libranza' => 'required|integer',
            'name'=> 'required|string|max:191',
            'cc'=> 'required|string|max:191',
            'address'=> 'required|string|max:191',
            'empresa_address'=> 'required|string|max:191',
            'neighborhood'=> 'required|string|max:191',
            'city'=> 'required|string|max:191',
            'phone'=> 'required|string|max:191',
            'cellphone'=> 'required|string|max:191',
            'phone_f'=> 'required|string|max:191',

            'email'=> 'required|string|max:191',
            'birthday'=> 'required|date|max:191',
            'entrega'=> 'required|integer',
            'charge'=> 'required|string',
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

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move(public_path() . '/libranza/', $name);
        $data['file'] = $name;

        Libranza::create($data);
        return redirect()->route('libra.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Libranza  $libranza
     * @return \Illuminate\Http\Response
     */
    public function show(Libranza $libra)
    {
        //

        return view('libra.show', compact('libra'));
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
    public function destroy(Libranza $libra)
    {
        $libra->delete();

        return redirect()->route('libra.index');
    }
    public function searchConferencia(Request $request)
    {

        $conferencia =  ConferenceSchedule::find($request['id']);

        $array= [];
        $array['empresa'] = $conferencia->empresa->name;
        $array['relacionista'] = $conferencia->empresa->relacionista->name;
        $array['conferencista'] = $conferencia->conferencista->name;
        $array['conferencista_id'] = $conferencia->conferencista->id;
        return $array;

    }
}
