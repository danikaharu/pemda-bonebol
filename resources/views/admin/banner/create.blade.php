@extends('layouts.admin.index')

@section('title')
    Banner
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Banner</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Banner</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Banner</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin.banner.include.form')

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/template_admin/plugins/bs-custom-file-input/bs-custom-file-input.js') }}"></script>
@endpush
