<div class="d-flex">
    <a class="btn btn-warning btn-sm" href="{{ route('admin.agency.edit', $id) }}">
        Edit</a>
    <form action="{{ route('admin.agency.destroy', $id) }}" method="POST" role="alert" alert-title="Hapus SKPD"
        alert-text="Yakin ingin menghapusnya?">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            Hapus</button>
    </form>
</div>
