<?php

namespace App\Http\Controllers;

use App\ConferenceSchedule;
use App\Conferencia;
use App\Conferencista;
use App\Empresa;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        $conferencias = Conferencia::all();
        $conferencistas = Conferencista::all();

        return view('conferenceSchedules.create', compact('empresas', 'conferencias', 'conferencistas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'conferencia_id' => 'required',
            'empresa_id' => 'required',
            'course_date' => 'required',
            'morning_assistant' => 'nullable',
            'afternoon_assistant' => 'nullable',
            'night_assistant' => 'nullable',
            'videoBeam' => 'required',
            'morning_time' => 'nullable',
            'afternoon_time' => 'nullable',
            'night_time' => 'nullable',
            'conferencista_id' => 'sometimes'
        ]);
        ConferenceSchedule::create($request->all());
        toast('Conferencia Agendada con Éxito!', 'success', 'top-right');
        return redirect()->route('conferenceSchedules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConferenceSchedule $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(ConferenceSchedule $conferenceSchedule)
    {
        return view('conferenceSchedules.show', compact('conferenceSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConferenceSchedule $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(ConferenceSchedule $conferenceSchedule)
    {
        $conferencias = Conferencia::all();
        $empresas = Empresa::all();
        $conferencistas = Conferencista::all();
        return view('conferenceSchedules.edit', compact('conferenceSchedule', 'conferencias', 'empresas', 'conferencistas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ConferenceSchedule $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConferenceSchedule $conferenceSchedule)
    {
        if (Auth::user()->role == 'director') {
            $this->validate($request, [
                'conferencia_id' => 'required',
                'empresa_id' => 'required',
                'course_date' => 'required',
                'morning_assistant' => 'nullable',
                'afternoon_assistant' => 'nullable',
                'night_assistant' => 'nullable',
                'videoBeam' => 'required',
                'morning_time' => 'nullable',
                'afternoon_time' => 'nullable',
                'night_time' => 'nullable',
                'conferencista_id' => 'sometimes',
                'state' => 'required'
            ]);

            $conferenceSchedule->update($request->all());
            toast('Conferencista Asignado con Éxito!', 'success', 'top-right');
            return redirect()->route('conferenceSchedules.index');
        } else {
            $data = $this->validate($request, [
                'conferencia_id' => 'required',
                'empresa_id' => 'required',
                'course_date' => 'required',
                'morning_assistant' => 'nullable',
                'afternoon_assistant' => 'nullable',
                'night_assistant' => 'nullable',
                'videoBeam' => 'required',
                'morning_time' => 'nullable',
                'afternoon_time' => 'nullable',
                'night_time' => 'nullable',
                'state' => 'required'
            ]);

            $conferenceSchedule->update($data);
            toast('Conferencia Actualizada con Éxito!', 'success', 'top-right');
            return redirect()->route('conferenceSchedules.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConferenceSchedule $conferenceSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConferenceSchedule $conferenceSchedule)
    {
        $conferenceSchedule->delete();
        toast('Conferencia Eliminada con Éxito!', 'success', 'top-right');
        return redirect()->route('conferenceSchedules.index');
    }
}
