<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = auth()->user()->pedidos()->get();

        return view('pedidos.index',compact('pedidos'));
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

        return view('pedidos.create',compact('conferencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $file->move(public_path() . '/libranzas/', $name);
        $data['file'] = $name;

        Pedido::create($data);
        return redirect()->route('pedido.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        $libra = $pedido;
        return view('pedidos.show', compact('libra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        return redirect()->route('pedido.index');

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
