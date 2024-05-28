<div class="form-group">
    <label for="name" class="form-label">Nama Pimpinan <span class="text-danger"> &#42;</span></label>
    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
        value="{{ isset($leader) ? $leader->name : old('name') }}" />
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label for="contact" class="form-label">Kontak <span class="text-danger">
                &#42;</span></label>
        <input class="form-control @error('contact') is-invalid @enderror" type="text" name="contact"
            value="{{ isset($leader) ? $leader->contact : old('contact') }}" />
        @error('contact')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="position" class="form-label">Posisi <span class="text-danger"> &#42;</span></label>
        <select name="position" class="form-control @error('position') is-invalid @enderror ">
            <option selected disabled>-- {{ __('Pilih Posisi') }} --</option>
            <option value="1"
                {{ isset($leader) && $leader->position == 1 ? 'selected' : (old('position') == 1 ? 'selected' : '') }}>
                Bupati</option>
            <option value="2"
                {{ isset($leader) && $leader->position == 2 ? 'selected' : (old('position') == 2 ? 'selected' : '') }}>
                Wakil Bupati</option>
            <option value="3"
                {{ isset($leader) && $leader->position == 3 ? 'selected' : (old('position') == 3 ? 'selected' : '') }}>
                Sekretaris Daerah</option>
        </select>
        @error('position')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    @isset($leader)
        <div class="mb-3 col-md-12">
            <div class="row">
                <div class="col-md-2">
                    @if ($leader->lhkpn == null)
                        <label for="file" class="form-label">File Lama</label>
                        <img src="https://via.placeholder.com/350?text=File+Tidak+Ditemukan" alt="LHKPN"
                            class="rounded mb-2 mt-2" alt="LHKPN" width="200" height="150"
                            style="object-fit: cover">
                    @else
                        <label for="file" class="form-label">File Lama</label>
                        <div class="form-group">
                            <a href="{{ asset('storage/upload/lhkpn/' . $leader->lhkpn) }}" target="pdf-frame"
                                class="btn btn-outline-dark btn-sm"><i class="bx bxs-file-pdf me-1"></i>Lihat File</a>
                        </div>
                    @endif
                </div>
                <div class="col-md-10">
                    <div class="form-group ms-3">
                        <label for="file" class="form-label">Upload LHKPN</label>
                        <input class="form-control  @error('lhkpn') is-invalid @enderror" type="file" name="lhkpn" />
                        @error('lhkpn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <div class="row">
                <div class="col-md-2">
                    @if ($leader->photo == null)
                        <label for="file" class="form-label">File Lama</label>
                        <img src="https://via.placeholder.com/350?text=File+Tidak+Ditemukan" alt="Photo"
                            class="rounded mb-2 mt-2" alt="Photo" width="200" height="150"
                            style="object-fit: cover">
                    @else
                        <label for="file" class="form-label">File Lama</label>
                        <div class="form-group">
                            <a href="{{ asset('storage/upload/foto/' . $leader->photo) }}" target="blank"
                                class="btn btn-outline-dark btn-sm"><i class="bx bxs-image me-1"></i>Lihat File</a>
                        </div>
                    @endif
                </div>
                <div class="col-md-10">
                    <div class="form-group ms-3">
                        <label for="file" class="form-label">Upload Foto</label>
                        <input class="form-control  @error('photo') is-invalid @enderror" type="file" name="photo" />
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="mb-3 col-md-6">
            <label for="file" class="form-label">Upload LHKPN <span class="text-danger"> &#42;</span></label>
            <input class="form-control @error('lhkpn') is-invalid @enderror" type="file" name="lhkpn" />
            @error('lhkpn')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 col-md-6">
            <label for="file" class="form-label">Upload Foto <span class="text-danger"> &#42;</span></label>
            <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo" />
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    @endisset
    <div class="mb-3 col-md-12">
        <label for="file" class="form-label">Profil <span class="text-danger"> &#42;</span></label>
        <textarea name="profile" rows="5" class="form-control @error('profile') is-invalid @enderror">
            {{ isset($leader) ? $leader->profile : old('profile') }}
        </textarea>
        @error('profile')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
