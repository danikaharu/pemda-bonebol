@extends('layouts.admin.index')

@section('title')
    Prestasi
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Prestasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Prestasi</a></li>
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Prestasi</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.award.store') }}" method="POST">
                @csrf

                @include('admin.award.include.form')

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Simpan</button>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
