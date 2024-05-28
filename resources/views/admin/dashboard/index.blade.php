@extends('layouts.admin.index')

@section('title')
    Beranda
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            Selamat Datang, {{ auth()->user()->name }}
        </div>
    </div>
@endsection
