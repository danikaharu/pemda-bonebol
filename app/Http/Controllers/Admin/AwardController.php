<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Award\{StoreAwardRequest, UpdateAwardRequest};
use App\Models\Award;
use Yajra\DataTables\Facades\DataTables;

class AwardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view award')->only('index', 'show');
        $this->middleware('permission:create award')->only('create', 'store');
        $this->middleware('permission:edit award')->only('edit', 'update');
        $this->middleware('permission:delete award')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $awards = Award::latest()->get();

            return DataTables::of($awards)
                ->addIndexColumn()
                ->addColumn('category', function ($row) {
                    return $row->category();
                })
                ->addColumn('action', 'admin.award.include.action')
                ->toJson();
        }
        return view('admin.award.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.award.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAwardRequest $request)
    {
        $attr = $request->validated();

        Award::create($attr);

        return redirect()->route('admin.award.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Award $award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Award $award)
    {
        return view('admin.award.edit', compact('award'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAwardRequest $request, Award $award)
    {
        $attr = $request->validated();

        $award->update($attr);

        return redirect()->route('admin.award.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Award $award)
    {
        try {
            $award->delete();
            return redirect()->route('admin.award.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.award.index')
                ->with('error', __('Maaf, Data tidak bisa dihapus.'));
        }
    }
}
