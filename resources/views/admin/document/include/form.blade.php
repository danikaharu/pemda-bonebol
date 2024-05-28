<div class="form-group">
    <label for="title" class="form-label">Judul Dokumen <span class="text-danger"> &#42;</span></label>
    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
        value="{{ isset($document) ? $document->title : old('title') }}" />
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label for="published_at" class="form-label">Tanggal Posting <span class="text-danger">
                &#42;</span></label>
        <input class="form-control @error('published_at') is-invalid @enderror" type="date" name="published_at"
            value="{{ isset($document) ? $document->published_at : old('published_at') }}" />
        @error('published_at')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="category" class="form-label">Kategori Dokumen <span class="text-danger"> &#42;</span></label>
        <select name="category" class="form-control @error('category') is-invalid @enderror ">
            <option selected disabled>-- {{ __('Pilih Kategori') }} --</option>
            <option value="keuangan"
                {{ isset($document) && $document->category == 'keuangan' ? 'selected' : (old('category') == 'keuangan' ? 'selected' : '') }}>
                Transparansi Keuangan</option>
            <option value="peraturan"
                {{ isset($document) && $document->category == 'produk-hukum' ? 'selected' : (old('category') == 'peraturan' ? 'selected' : '') }}>
                Produk Hukum</option>
            <option value="perencanaan"
                {{ isset($document) && $document->category == 'perencanaan' ? 'selected' : (old('category') == 'perencanaan' ? 'selected' : '') }}>
                Dokumen Perencanaan</option>
            <option value="pertanggungjawaban"
                {{ isset($document) && $document->category == 'pertanggungjawaban' ? 'selected' : (old('category') == 'pertanggungjawaban' ? 'selected' : '') }}>
                Laporan Pertanggunjawaban</option>
            <option value="renstra"
                {{ isset($document) && $document->category == 'renstra' ? 'selected' : (old('category') == 'renstra' ? 'selected' : '') }}>
                Renstra</option>
            <option value="renja"
                {{ isset($document) && $document->category == 'renja' ? 'selected' : (old('category') == 'renja' ? 'selected' : '') }}>
                Renja</option>
            <option value="iku"
                {{ isset($document) && $document->category == 'iku' ? 'selected' : (old('category') == 'iku' ? 'selected' : '') }}>
                Indikator Kinerja Utama</option>
            <option value="pohon-kinerja"
                {{ isset($document) && $document->category == 'pohon-kinerja' ? 'selected' : (old('category') == 'pohon-kinerja' ? 'selected' : '') }}>
                Pohon Kinerja & Cascading</option>
            <option value="perjanjian-kinerja"
                {{ isset($document) && $document->category == 'perjanjian-kinerja' ? 'selected' : (old('category') == 'perjanjian-kinerja' ? 'selected' : '') }}>
                Perjanjian Kinerja</option>
            <option value="rencana-aksi"
                {{ isset($document) && $document->category == 'rencana-aksi' ? 'selected' : (old('category') == 'rencana-aksi' ? 'selected' : '') }}>
                Rencana Aksi</option>
            <option value="laporan-kinerja"
                {{ isset($document) && $document->category == 'laporan-kinerja' ? 'selected' : (old('category') == 'laporan-kinerja' ? 'selected' : '') }}>
                Laporan Kinerja</option>
            <option value="monev-aksi"
                {{ isset($document) && $document->category == 'monev-aksi' ? 'selected' : (old('category') == 'monev-aksi' ? 'selected' : '') }}>
                Monev Rencana Aksi</option>
        </select>
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    @isset($document)
        <div class="mb-3 col-md-12">
            <div class="row">
                <div class="col-md-2">
                    @if ($document->file == null)
                        <label for="file" class="form-label">File Lama</label>
                        <img src="https://via.placeholder.com/350?text=File+Tidak+Ditemukan" alt="Peraturan"
                            class="rounded mb-2 mt-2" alt="Peraturan" width="200" height="150"
                            style="object-fit: cover">
                    @else
                        <label for="file" class="form-label">File Lama</label>
                        <div class="form-group">
                            <a href="{{ asset('storage/upload/dokumen/' . $document->file) }}" target="pdf-frame"
                                class="btn btn-outline-dark btn-sm"><i class="bx bxs-file-pdf me-1"></i>Lihat File</a>
                        </div>
                    @endif
                </div>
                <div class="col-md-10">
                    <div class="form-group ms-3">
                        <label for="file" class="form-label">Upload Dokumen</label>
                        <input type="file" name="file" />
                        <p class="help-block text-danger">{{ $errors->first('file') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="mb-3 col-md-12">
            <label for="file" class="form-label">Upload Dokumen <span class="text-danger"> &#42;</span></label>
            <input type="file" name="file" />
            <p class="help-block text-danger">{{ $errors->first('file') }}</p>
        </div>
    @endisset
</div>
