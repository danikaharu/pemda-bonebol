<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Agency\{StoreAgencyRequest, UpdateAgencyRequest};
use App\Models\Agency;
use Yajra\DataTables\Facades\DataTables;

class AgencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view agency')->only('index', 'show');
        $this->middleware('permission:create agency')->only('create', 'store');
        $this->middleware('permission:edit agency')->only('edit', 'update');
        $this->middleware('permission:delete agency')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $agencies = Agency::latest()->get();

            return DataTables::of($agencies)
                ->addIndexColumn()
                ->addColumn('category', function ($row) {
                    return $row->category();
                })
                ->addColumn('action', 'admin.agency.include.action')
                ->toJson();
        }
        return view('admin.agency.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgencyRequest $request)
    {
        $attr = $request->validated();

        Agency::create($attr);

        return redirect()->route('admin.agency.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        return view('admin.agency.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgencyRequest $request, Agency $agency)
    {
        $attr = $request->validated();

        $agency->update($attr);

        return redirect()->route('admin.agency.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        try {
            $agency->delete();
            return redirect()->route('admin.agency.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.agency.index')
                ->with('error', __('Maaf, Data tidak bisa dihapus.'));
        }
    }
}
