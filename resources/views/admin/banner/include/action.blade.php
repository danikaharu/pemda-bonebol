<div class="d-flex">
    <a class="btn btn-secondary btn-sm" href="{{ asset('storage/upload/banner/' . $file) }}" target="_blank">
        Lihat Gambar
    </a>
    <a class="btn btn-warning btn-sm" href="{{ route('admin.banner.edit', $id) }}">
        Edit</a>
    <form action="{{ route('admin.banner.destroy', $id) }}" method="POST" role="alert" alert-title="Hapus Banner"
        alert-text="Yakin ingin menghapusnya?">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            Hapus</button>
    </form>
</div>
