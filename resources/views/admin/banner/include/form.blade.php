<div class="form-group">
    <label for="url" class="form-label">URL <span class="text-danger"> &#42;</span></label>
    <input class="form-control @error('url') is-invalid @enderror" type="text" name="url"
        value="{{ isset($banner) ? $banner->url : old('url') }}" />
    @error('url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="row">
    @isset($banner)
        <div class="mb-3 col-md-12">
            <div class="row">
                <div class="col-md-2">
                    @if ($banner->file == null)
                        <label for="file" class="form-label">File Lama</label>
                        <img src="https://via.placeholder.com/350?text=File+Tidak+Ditemukan" alt="Peraturan"
                            class="rounded mb-2 mt-2" alt="Peraturan" width="200" height="150"
                            style="object-fit: cover">
                    @else
                        <label for="file" class="form-label">File Lama</label>
                        <div class="form-group">
                            <a href="{{ asset('storage/upload/banner/' . $banner->file) }}" target="_blank"
                                class="btn btn-outline-dark btn-sm"><i class="bx bxs-file-pdf me-1"></i>Lihat Gambar</a>
                        </div>
                    @endif
                </div>
                <div class="col-md-10">
                    <div class="form-group ms-3">
                        <label for="file" class="form-label">Upload Gambar</label>
                        <input class="form-control  @error('file') is-invalid @enderror" type="file" name="file" />
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="mb-3 col-md-12">
            <label for="file" class="form-label">Upload Gambar <span class="text-danger"> &#42;</span></label>
            <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" />
            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    @endisset
</div>
