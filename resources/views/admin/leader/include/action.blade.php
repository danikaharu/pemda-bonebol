<div class="d-flex">
    <a class="btn btn-secondary btn-sm" href="{{ asset('storage/upload/lhkpn/' . $lhkpn) }}" target="pdf-frame">
        Lihat LHKPN
    </a>
    <a class="btn btn-secondary btn-sm" href="{{ asset('storage/upload/foto/' . $photo) }}" target="blank">
        Lihat Foto
    </a>
    <a class="btn btn-warning btn-sm" href="{{ route('admin.leader.edit', $id) }}">
        Edit</a>
    <form action="{{ route('admin.leader.destroy', $id) }}" method="POST" role="alert" alert-title="Hapus Pimpinan"
        alert-text="Yakin ingin menghapusnya?">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            Hapus</button>
    </form>
</div>
