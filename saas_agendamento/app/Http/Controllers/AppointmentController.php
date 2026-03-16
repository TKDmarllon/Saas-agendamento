<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Service;
use App\Models\Professional;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $appointments = Appointment::with([
        'client',
        'service',
        'professional'
    ])->orderBy('start_time')->get();

    return view('appointments.index', compact('appointments'));
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $clients = Client::all();
    $services = Service::all();
    $professionals = Professional::all();

    return view('appointments.create', compact(
        'clients',
        'services',
        'professionals'
    ));
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $data = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'service_id' => 'required|exists:services,id',
        'professional_id' => 'required|exists:professionals,id',
        'start_time' => 'required|date',
        'duration' => 'required|integer|min:1'
    ]);

    // Buscar duração do serviço
$service = \App\Models\Service::findOrFail($data['service_id']);
$data['duration'] = $service->duration; // adiciona duração ao agendamento    $start = \Carbon\Carbon::parse($data['start_time']);
    $end = $start->copy()->addMinutes($service->duration);

    // Checar conflitos do mesmo profissional
    $conflict = Appointment::where('professional_id', $data['professional_id'])
        ->where(function($query) use ($start, $end) {
            $query->whereBetween('start_time', [$start, $end])
                  ->orWhereBetween(\DB::raw("start_time + interval '1 minute' * duration"), [$start, $end]);
        })
        ->exists();

    if ($conflict) {
        return redirect()->back()
            ->withErrors(['start_time' => 'Este profissional já possui um agendamento neste período'])
            ->withInput();
    }

    Appointment::create($data);

    return redirect('/' . request()->route('tenant') . '/appointments')
        ->with('success', 'Agendamento criado com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
