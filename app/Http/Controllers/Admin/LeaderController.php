<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Leader\{StoreLeaderRequest, UpdateLeaderRequest};
use App\Models\Leader;
use Yajra\DataTables\Facades\DataTables;

class LeaderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view leader')->only('index', 'show');
        $this->middleware('permission:create leader')->only('create', 'store');
        $this->middleware('permission:edit leader')->only('edit', 'update');
        $this->middleware('permission:delete leader')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $leaders = Leader::latest()->get();

            return DataTables::of($leaders)
                ->addIndexColumn()
                ->addColumn('position', function ($row) {
                    return $row->position();
                })
                ->addColumn('action', 'admin.leader.include.action')
                ->toJson();
        }
        return view('admin.leader.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.leader.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeaderRequest $request)
    {
        $attr = $request->validated();

        if ($request->file('lhkpn') && $request->file('lhkpn')->isValid()) {

            $filename = $request->file('lhkpn')->hashName();
            $request->file('lhkpn')->storeAs('upload/lhkpn', $filename, 'public');

            $attr['lhkpn'] = $filename;
        }

        if ($request->file('photo') && $request->file('photo')->isValid()) {

            $filename = $request->file('photo')->hashName();
            $request->file('photo')->storeAs('upload/foto', $filename, 'public');

            $attr['photo'] = $filename;
        }

        Leader::create($attr);

        return redirect()->route('admin.leader.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leader $leader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leader $leader)
    {
        return view('admin.leader.edit', compact('leader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaderRequest $request, Leader $leader)
    {
        $attr = $request->validated();

        if ($request->file('lhkpn') && $request->file('lhkpn')->isValid()) {

            $path = storage_path('app/public/upload/lhkpn/');
            $filename = $request->file('lhkpn')->hashName();
            $request->file('lhkpn')->storeAs('upload/lhkpn', $filename, 'public');

            // delete old file from storage
            if ($leader->lhkpn != null && file_exists($path . $leader->lhkpn)) {
                unlink($path . $leader->lhkpn);
            }

            $attr['lhkpn'] = $filename;
        }

        if ($request->file('photo') && $request->file('photo')->isValid()) {

            $path = storage_path('app/public/upload/foto/');
            $filename = $request->file('photo')->hashName();
            $request->file('photo')->storeAs('upload/foto', $filename, 'public');

            // delete old file from storage
            if ($leader->photo != null && file_exists($path . $leader->photo)) {
                unlink($path . $leader->photo);
            }

            $attr['photo'] = $filename;
        }

        $leader->update($attr);

        return redirect()->route('admin.leader.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leader $leader)
    {
        try {
            // determine path file
            $pathLHKPN = storage_path('app/public/upload/lhkpn/');
            $pathPhoto = storage_path('app/public/upload/foto/');

            // if document exist remove file from directory
            if ($leader->lhkpn != null && file_exists($pathLHKPN . $leader->lhkpn)) {
                unlink($pathLHKPN . $leader->lhkpn);
            }

            if ($leader->photo != null && file_exists($pathPhoto . $leader->photo)) {
                unlink($pathPhoto . $leader->photo);
            }

            $leader->delete();
            return redirect()->route('admin.leader.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.leader.index')
                ->with('error', __('Maaf, Data tidak bisa dihapus.'));
        }
    }
}
