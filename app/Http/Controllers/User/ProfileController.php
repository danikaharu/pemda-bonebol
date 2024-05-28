<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Award;
use Yajra\DataTables\Facades\DataTables;

class ProfileController extends Controller
{
    public function daftarSKPD()
    {
        if (request()->ajax()) {
            $agencies = Agency::whereNot('category', 2)->latest()->get();

            return DataTables::of($agencies)
                ->addIndexColumn()
                ->toJson();
        }

        return view('user.profil.daftar-skpd');
    }

    public function daftarKecamatan()
    {
        if (request()->ajax()) {
            $agencies = Agency::where('category', 2)->latest()->get();

            return DataTables::of($agencies)
                ->addIndexColumn()
                ->toJson();
        }

        return view('user.profil.daftar-kecamatan');
    }

    public function prestasiBoneBolango()
    {
        if (request()->ajax()) {
            $awards = Award::latest()->get();

            return DataTables::of($awards)
                ->addIndexColumn()
                ->addColumn('category', function ($row) {
                    return $row->category();
                })
                ->toJson();
        }
        return view('user.profil.prestasi');
    }
}
