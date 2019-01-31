<?php

namespace App\Http\Controllers;

use App\ConferenceSchedule;
use App\Conferencia;
use App\Empresa;
use Illuminate\Http\Request;

class ConferenceSchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferenceSchedules = ConferenceSchedule::all();

        return view('conferenceSchedules.index', compact('conferenceSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        $conferencias =Conferencia::all();
        return view('conferenceSchedules.create', compact('empresas', 'conferencias'));
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
            'conferencia_id' => 'required',
            'empresa_id' => 'required',
            'course_date' => 'required',
            'morning_assistant'=>'nullable',
            'afternoon_assistant'=>'nullable',
            'night_assistant'=>'nullable',
            'videoBeam' =>'required',

            ]);
        ConferenceSchedule::create($request->all());
        return redirect()->route('conferenceSchedules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConferenceSchedule  $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(ConferenceSchedule $conferenceSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConferenceSchedule  $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(ConferenceSchedule $conferenceSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConferenceSchedule  $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConferenceSchedule $conferenceSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConferenceSchedule  $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConferenceSchedule $conferenceSchedule)
    {
        //
    }
}
