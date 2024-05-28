<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Document\{StoreDocumentRequest, UpdateDocumentRequest};
use App\Models\{Document, TemporaryFile};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{File, Storage};
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view document')->only('index', 'show');
        $this->middleware('permission:create document')->only('create', 'store');
        $this->middleware('permission:edit document')->only('edit', 'update');
        $this->middleware('permission:delete document')->only('delete');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $documents = Document::orderBy('published_at', 'DESC')->get();

            return DataTables::of($documents)
                ->addIndexColumn()
                ->addColumn('action', 'admin.document.include.action')
                ->toJson();
        }
        return view('admin.document.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.document.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentRequest $request)
    {
        $attr = $request->validated();

        $temporaryFile = TemporaryFile::where('folder', $request->file)->first();

        if ($temporaryFile) {
            $path = storage_path('app/public/upload/dokumen/tmp/' . $temporaryFile->folder . '/' . $temporaryFile->filename);
            $destinationPath = storage_path('app/public/upload/dokumen/' . $temporaryFile->filename);
            File::move($path, $destinationPath);
            rmdir(storage_path('app/public/upload/dokumen/tmp/' . $temporaryFile->folder));
        }

        $attr['file'] = $temporaryFile->filename;

        Document::create($attr);

        $temporaryFile->delete();

        return redirect()->route('admin.document.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return view('admin.document.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $attr = $request->validated();

        $temporaryFile = TemporaryFile::where('folder', $request->file)->first();

        if ($temporaryFile) {
            $path = storage_path('app/public/upload/dokumen/tmp/' . $temporaryFile->folder . '/' . $temporaryFile->filename);
            $destinationPath = storage_path('app/public/upload/dokumen/' . $temporaryFile->filename);
            File::move($path, $destinationPath);
            rmdir(storage_path('app/public/upload/dokumen/tmp/' . $temporaryFile->folder));

            if ($document->file != null && file_exists(storage_path('app/public/upload/dokumen/') . $document->file)) {
                unlink(storage_path('app/public/upload/dokumen/') . $document->file);
            }

            $attr['file'] = $temporaryFile->filename;

            $temporaryFile->delete();
        }

        $document->update($attr);

        return redirect()->route('admin.document.index')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        try {
            // determine path file
            $path = storage_path('app/public/upload/dokumen/');

            // if document exist remove file from directory
            if ($document->file != null && file_exists($path . $document->file)) {
                unlink($path . $document->file);
            }

            $document->delete();
            return redirect()->route('admin.document.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.document.index')
                ->with('error', __('Maaf, Data tidak bisa dihapus.'));
        }
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->hashName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('upload/dokumen/tmp/' . $folder, $filename, 'public');

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }

        return '';
    }

    public function revert(Request $request)
    {
        $temporaryFile = TemporaryFile::where('folder', $request->getContent())->first();

        if ($temporaryFile) {
            Storage::disk('public')->deleteDirectory('upload/dokumen/tmp/' . $temporaryFile->folder);
        }
        $temporaryFile->delete();
    }
}
