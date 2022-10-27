@extends('masterlayout.master_layout_backend')
@section('content')
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <img src="{{asset('logo')}}/logo.png" alt="User Image" height="200px"><br>
                    <br>
                    <a href="#" class="h5">{{config('myconfig.singkatan_nama_aplikasi')}}</a><br>
                    <small>{{config('myconfig.kepanjangan_aplikasi')}}</small>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Register Admin Aplikasi</p>
                    <form action="{{route('simpan_data_admin_app_tuh_baru')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="number" name="nik_admin_app" class="form-control @error('nik_admin_app') is-invalid @enderror" placeholder="Masukkan NIK" value="{{old('nik_admin_app')}}">
                            @error('nik_admin_app')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama_admin_app" class="form-control @error('nama_admin_app') is-invalid @enderror" placeholder="Masukkan Nama" value="{{old('nama_admin_app')}}">
                            @error('nama_admin_app')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password_admin_app" class="form-control @error('password_admin_app') is-invalid @enderror" placeholder="Masukkan Password" value="{{old('password_admin_app')}}">
                            @error('password_admin_app')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kode Validasi</label>
                            <input type="text" name="kode_validasi" class="form-control @error('kode_validasi') is-invalid @enderror" placeholder="Masukkan Kode Validasi" value="{{old('kode_validasi')}}">
                            @error('kode_validasi')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection