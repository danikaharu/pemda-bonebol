<div class="row">
    <div class="mb-3 col-md-6">
        <label for="name" class="form-label">Nama Penghargaan <span class="text-danger"> &#42;</span></label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
            value="{{ isset($award) ? $award->name : old('name') }}" />
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="appreciator" class="form-label">Pemberi Penghargaan <span class="text-danger"> &#42;</span></label>
        <input class="form-control @error('appreciator') is-invalid @enderror" type="text" name="appreciator"
            value="{{ isset($award) ? $award->appreciator : old('appreciator') }}" />
        @error('appreciator')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-12">
        <label for="category" class="form-label">Kategori Penghargaan <span class="text-danger"> &#42;</span></label>
        <select name="category" class="form-control @error('category') is-invalid @enderror ">
            <option selected disabled>-- {{ __('Pilih Kategori') }} --</option>
            <option value="1"
                {{ isset($award) && $award->category == 1 ? 'selected' : (old('category') == 1 ? 'selected' : '') }}>
                Hukum dan HAM</option>
            <option value="2"
                {{ isset($award) && $award->category == 2 ? 'selected' : (old('category') == 2 ? 'selected' : '') }}>
                Inovasi dan Digitalisasi</option>
            <option value="3"
                {{ isset($award) && $award->category == 3 ? 'selected' : (old('category') == 3 ? 'selected' : '') }}>
                Investasi</option>
            <option value="4"
                {{ isset($award) && $award->category == 4 ? 'selected' : (old('category') == 4 ? 'selected' : '') }}>
                Kehumasan</option>
            <option value="5"
                {{ isset($award) && $award->category == 5 ? 'selected' : (old('category') == 5 ? 'selected' : '') }}>
                Kepegawaian</option>
            <option value="6"
                {{ isset($award) && $award->category == 6 ? 'selected' : (old('category') == 6 ? 'selected' : '') }}>
                Ketenagakerjaan</option>
            <option value="7"
                {{ isset($award) && $award->category == 7 ? 'selected' : (old('category') == 7 ? 'selected' : '') }}>
                Olahraga</option>
            <option value="8"
                {{ isset($award) && $award->category == 8 ? 'selected' : (old('category') == 8 ? 'selected' : '') }}>
                Pembangunan</option>
            <option value="9"
                {{ isset($award) && $award->category == 9 ? 'selected' : (old('category') == 9 ? 'selected' : '') }}>
                Pemberdayaan Masyarakat</option>
            <option value="10"
                {{ isset($award) && $award->category == 10 ? 'selected' : (old('category') == 10 ? 'selected' : '') }}>
                Penanggulangan Bencana</option>
            <option value="11"
                {{ isset($award) && $award->category == 11 ? 'selected' : (old('category') == 11 ? 'selected' : '') }}>
                Prestasi Bupati</option>
            <option value="12"
                {{ isset($award) && $award->category == 12 ? 'selected' : (old('category') == 12 ? 'selected' : '') }}>
                Sosial Budaya</option>
            <option value="13"
                {{ isset($award) && $award->category == 13 ? 'selected' : (old('category') == 13 ? 'selected' : '') }}>
                Sumber Daya Energi dan Mineral</option>
            <option value="14"
                {{ isset($award) && $award->category == 14 ? 'selected' : (old('category') == 14 ? 'selected' : '') }}>
                Transparansi Keuangan</option>
        </select>
        @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 col-md-12">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea name="description" cols="30" rows="5"
            class="form-control @error('description') is-invalid @enderror">{{ isset($award) ? $award->description : old('description') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
