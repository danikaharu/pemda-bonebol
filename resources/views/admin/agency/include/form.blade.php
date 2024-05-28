<div class="row">
    <div class="mb-3 col-md-6">
        <label for="name" class="form-label">Nama SKPD <span class="text-danger"> &#42;</span></label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
            value="{{ isset($agency) ? $agency->name : old('name') }}" />
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="head_office" class="form-label">Nama Pimpinan <span class="text-danger"> &#42;</span></label>
        <input class="form-control @error('head_office') is-invalid @enderror" type="text" name="head_office"
            value="{{ isset($agency) ? $agency->head_office : old('head_office') }}" />
        @error('head_office')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="url" class="form-label">Link Website </label>
        <input class="form-control @error('url') is-invalid @enderror" type="text" name="url"
            value="{{ isset($agency) ? $agency->url : old('url') }}" />
        @error('url')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="email" class="form-label">Email </label>
        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
            value="{{ isset($agency) ? $agency->email : old('email') }}" />
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="address" class="form-label">Alamat <span class="text-danger">
                &#42;</span></label>
        <input class="form-control @error('address') is-invalid @enderror" type="text" name="address"
            value="{{ isset($agency) ? $agency->address : old('address') }}" />
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="category" class="form-label">Kategori SKPD <span class="text-danger"> &#42;</span></label>
        <select name="category" class="form-control @error('category') is-invalid @enderror ">
            <option selected disabled>-- {{ __('Pilih Kategori') }} --</option>
            <option value="1"
                {{ isset($agency) && $agency->category == 1 ? 'selected' : (old('category') == 1 ? 'selected' : '') }}>
                Dinas</option>
            <option value="2"
                {{ isset($agency) && $agency->category == 2 ? 'selected' : (old('category') == 2 ? 'selected' : '') }}>
                Kecamatan</option>
            <option value="3"
                {{ isset($agency) && $agency->category == 3 ? 'selected' : (old('category') == 3 ? 'selected' : '') }}>
                Rumah Sakit</option>
        </select>
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
