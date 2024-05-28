<div class="d-flex">
    <a class="btn btn-secondary btn-sm" href="{{ asset('storage/upload/dokumen/' . $file) }}" target="pdf-frame">
        Lihat Dokumen
    </a>
    <a class="btn btn-warning btn-sm" href="{{ route('admin.document.edit', $id) }}">
        Edit</a>
    <form action="{{ route('admin.document.destroy', $id) }}" method="POST" role="alert" alert-title="Hapus Dokumen"
        alert-text="Yakin ingin menghapusnya?">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            Hapus</button>
    </form>
</div>
