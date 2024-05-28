<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends Controller
{
    public function informasiSakip()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->where('category', 'sakip')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . asset('storage/upload/dokumen/' . $row['file']) . '" target="pdf-frame" class="btn btn-primary">Lihat File</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('user.informasi.sakip');
    }

    public function informasiPertanggungjawaban()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->where('category', 'pertanggungjawaban')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . asset('storage/upload/dokumen/' . $row['file']) . '" target="pdf-frame" class="btn btn-primary">Lihat File</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('user.informasi.pertanggungjawaban');
    }

    public function informasiKeuangan()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->where('category', 'keuangan')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . asset('storage/upload/dokumen/' . $row['file']) . '" target="pdf-frame" class="btn btn-primary">Lihat File</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('user.informasi.keuangan');
    }

    public function informasiPerencanaan()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->where('category', 'perencanaan')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . asset('storage/upload/dokumen/' . $row['file']) . '" target="pdf-frame" class="btn btn-primary">Lihat File</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('user.informasi.perencanaan');
    }

    public function informasiRenstra()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->where('category', 'renstra')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . asset('storage/upload/dokumen/' . $row['file']) . '" target="pdf-frame" class="btn btn-primary">Lihat File</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('user.informasi.renstra');
    }
    public function informasiRenja()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->where('category', 'renja')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . asset('storage/upload/dokumen/' . $row['file']) . '" target="pdf-frame" class="btn btn-primary">Lihat File</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('user.informasi.renja');
    }
    public function informasiIKU()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->where('category', 'iku')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . asset('storage/upload/dokumen/' . $row['file']) . '" target="pdf-frame" class="btn btn-primary">Lihat File</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('user.informasi.iku');
    }
    public function informasiPohonKinerja()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->where('category', 'pohon-kinerja')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . asset('storage/upload/dokumen/' . $row['file']) . '" target="pdf-frame" class="btn btn-primary">Lihat File</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('user.informasi.pohon-kinerja');
    }
    public function informasiPerjanjian()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->where('category', 'perjanjian-kinerja')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . asset('storage/upload/dokumen/' . $row['file']) . '" target="pdf-frame" class="btn btn-primary">Lihat File</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('user.informasi.perjanjian-kinerja');
    }
    public function informasiRencanaAksi()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->where('category', 'rencana-aksi')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . asset('storage/upload/dokumen/' . $row['file']) . '" target="pdf-frame" class="btn btn-primary">Lihat File</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('user.informasi.rencana-aksi');
    }
    public function informasiLaporanKinerja()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->where('category', 'laporan-kinerja')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . asset('storage/upload/dokumen/' . $row['file']) . '" target="pdf-frame" class="btn btn-primary">Lihat File</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('user.informasi.laporan-kinerja');
    }
    public function informasiMonevAksi()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->where('category', 'monev-aksi')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . asset('storage/upload/dokumen/' . $row['file']) . '" target="pdf-frame" class="btn btn-primary">Lihat File</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('user.informasi.monev-aksi');
    }
}
