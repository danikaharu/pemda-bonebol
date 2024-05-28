<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\{StoreBannerRequest, UpdateBannerRequest};
use App\Models\Banner;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view banner')->only('index', 'show');
        $this->middleware('permission:create banner')->only('create', 'store');
        $this->middleware('permission:edit banner')->only('edit', 'update');
        $this->middleware('permission:delete banner')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $banner = Banner::latest()->get();

            return DataTables::of($banner)
                ->addIndexColumn()
                ->addColumn('action', 'admin.banner.include.action')
                ->toJson();
        }
        return view('admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $attr = $request->validated();

        if ($request->file('file') && $request->file('file')->isValid()) {

            $filename = $request->file('file')->hashName();
            $request->file('file')->storeAs('upload/banner', $filename, 'public');

            $attr['file'] = $filename;
        }

        Banner::create($attr);

        return redirect()->route('admin.banner.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $attr = $request->validated();

        if ($request->file('file') && $request->file('file')->isValid()) {

            $path = storage_path('app/public/upload/banner/');
            $filename = $request->file('file')->hashName();
            $request->file('file')->storeAs('upload/banner', $filename, 'public');

            // delete old file from storage
            if ($banner->file != null && file_exists($path . $banner->file)) {
                unlink($path . $banner->file);
            }

            $attr['file'] = $filename;
        }

        $banner->update($attr);

        return redirect()->route('admin.banner.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            // determine path file
            $path = storage_path('app/public/upload/banner/');

            // if document exist remove file from directory
            if ($banner->file != null && file_exists($path . $banner->file)) {
                unlink($path . $banner->file);
            }

            $banner->delete();
            return redirect()->route('admin.banner.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.banner.index')
                ->with('error', __('Maaf, Data tidak bisa dihapus.'));
        }
    }
}
