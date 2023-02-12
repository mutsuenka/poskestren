<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Visit;
use App\Models\Pasien;
use App\Models\MasterStatusVisit;
use App\Http\Requests\UpdateVisitVitalRequest;
use Illuminate\Http\Client\Request;

class VisitController extends Controller
{
    /**
     * Menampilkan data visit sebagai data antrian.
     *
     */
    public function index()
    {
        $visits = Visit::where('tanggal_visit', Carbon::Today())
            ->whereNull('deleted_at')
            ->paginate();

        return view('visit.index', compact('visits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $statuses = MasterStatusVisit::all();
        $pasiens = Pasien::whereNull('deleted_at')->get();

        return view('visit.create', compact('statuses', 'pasiens'));
    }


    public function store(Request $request)
    {
        dd($request);
        $validatedData = $request->validated();

        $no_antrian = Visit::where('tanggal_visit', Carbon::today())->pluck('no_antrian')->last();

        $validatedData['no_antrian'] = $no_antrian + 1;

        Visit::create($validatedData);

        return to_route('visit.index')->with('status', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     */
    public function show(Visit $visit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     */
    public function edit(Visit $visit)
    {
        return view('visit.edit', compact('visit'));
    }

    public function editVital(Visit $visit)
    {
        return view('visit.edit-vital', compact('visit'));
    }

    public function editVisit(Visit $visit)
    {
        return view('visit.edit-visit', compact('visit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVisitVitalRequest  $request
     * @param  \App\Models\Visit  $visit
     */
    public function updateVital(UpdateVisitVitalRequest $request, Visit $visit)
    {
        $visit->update($request->validated());

        return to_route('visit.index')->with('message', 'Data vital pasien berhasil dimasukkan');
    }

    public function update(UpdateVisitRequest $request, Visit $visit)
    {
        $visit->update($request->validated());

        return to_route('visit.index')->with('message', 'Data visit berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {

    }
}
