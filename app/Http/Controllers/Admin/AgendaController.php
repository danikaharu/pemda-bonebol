<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Agenda\{StoreAgendaRequest, UpdateAgendaRequest};
use App\Models\Agenda;
use Yajra\DataTables\Facades\DataTables;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view agenda')->only('index', 'show');
        $this->middleware('permission:create agenda')->only('create', 'store');
        $this->middleware('permission:edit agenda')->only('edit', 'update');
        $this->middleware('permission:delete agenda')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $agendas = Agenda::orderBy('date', 'DESC')->latest()->get();

            return DataTables::of($agendas)
                ->addIndexColumn()
                ->addColumn('action', 'admin.agenda.include.action')
                ->toJson();
        }
        return view('admin.agenda.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgendaRequest $request)
    {
        $attr = $request->validated();

        Agenda::create($attr);

        return redirect()->route('admin.agenda.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgendaRequest $request, Agenda $agenda)
    {
        $attr = $request->validated();

        $agenda->update($attr);

        return redirect()->route('admin.agenda.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda)
    {
        try {
            $agenda->delete();
            return redirect()->route('admin.agenda.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.agenda.index')
                ->with('error', __('Maaf, Data tidak bisa dihapus.'));
        }
    }
}
