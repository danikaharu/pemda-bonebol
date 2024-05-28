<div class="row">
    <div class="mb-3 col-md-6">
        <label for="title" class="form-label">Nama Kegiatan <span class="text-danger"> &#42;</span></label>
        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
            value="{{ isset($agenda) ? $agenda->title : old('title') }}" />
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="place" class="form-label">Tempat <span class="text-danger"> &#42;</span></label>
        <input class="form-control @error('place') is-invalid @enderror" type="text" name="place"
            value="{{ isset($agenda) ? $agenda->place : old('place') }}" />
        @error('place')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="category" class="form-label">Kategori Kegiatan <span class="text-danger"> &#42;</span></label>
        <select name="category" class="form-control @error('category') is-invalid @enderror ">
            <option selected disabled>-- {{ __('Pilih Kategori') }} --</option>
            <option value="1"
                {{ isset($agenda) && $agenda->category == 1 ? 'selected' : (old('category') == 1 ? 'selected' : '') }}>
                Bupati</option>
            <option value="2"
                {{ isset($agenda) && $agenda->category == 2 ? 'selected' : (old('category') == 2 ? 'selected' : '') }}>
                Wakil Bupati</option>
            <option value="3"
                {{ isset($agenda) && $agenda->category == 3 ? 'selected' : (old('category') == 3 ? 'selected' : '') }}>
                Event Bone Bolango</option>
            <option value="4"
                {{ isset($agenda) && $agenda->category == 4 ? 'selected' : (old('category') == 4 ? 'selected' : '') }}>
                OPD</option>
        </select>
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="type" class="form-label">Tipe Kegiatan <span class="text-danger"> &#42;</span></label>
        <select name="type" class="form-control @error('type') is-invalid @enderror ">
            <option selected disabled>-- {{ __('Pilih Tipe') }} --</option>
            <option value="1"
                {{ isset($agenda) && $agenda->type == 1 ? 'selected' : (old('type') == 1 ? 'selected' : '') }}>
                Offline</option>
            <option value="2"
                {{ isset($agenda) && $agenda->type == 2 ? 'selected' : (old('type') == 2 ? 'selected' : '') }}>
                Online</option>
        </select>
        @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label for="date" class="form-label">Tanggal <span class="text-danger"> &#42;</span></label>
        <input class="form-control @error('date') is-invalid @enderror" type="date" name="date"
            value="{{ isset($agenda) ? $agenda->date : old('date') }}" />
        @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="time" class="form-label">Waktu <span class="text-danger">
                &#42;</span></label>
        <input class="form-control @error('time') is-invalid @enderror" type="text" name="time"
            value="{{ isset($agenda) ? $agenda->time : old('time') }}" />
        @error('time')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
