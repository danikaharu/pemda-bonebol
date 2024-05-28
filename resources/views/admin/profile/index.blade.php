@extends('layouts.admin.index')

@section('title')
    Profil Pengguna
@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profil Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profil Pengguna</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="section mt-4">

        {{-- Password --}}
        <div class="row">
            <div class="col-md-12">
                <hr class="mb-5">
            </div>

            <div class="col-md-2">
                <h4>{{ __('Ubah Password') }}</h4>
            </div>

            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('user-password.update') }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="password">{{ __('Password Saat Ini') }}</label>
                                <input type="password" name="current_password"
                                    class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                    id="password" placeholder="Password Saat Ini">
                                @error('current_password', 'updatePassword')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password Baru') }}</label>
                                <input type="password" name="password"
                                    class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                    id="password" placeholder="Password Baru">
                                @error('password', 'updatePassword')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Konfirmasi Password Baru') }}</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Konfirmasi Password Baru">
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Ubah Password') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
