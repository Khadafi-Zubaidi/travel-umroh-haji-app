@extends('masterlayout.master_layout_backend')
@section('content')
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-dark">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Dashboard Admin</a>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="#" class="brand-link">
                    <span class="brand-text font-weight-light">Menu Utama</span>
                </a>
                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{asset('foto_admin_app')}}/{{$LoggedUserInfo->foto_admin_app}}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{$LoggedUserInfo->nama_admin_app}}</a>
                        </div>
                    </div>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{route('tambah_data_produk_tuh_oleh_admin_app_tuh')}}" class="nav-link">
                                    <i class="nav-icon fas fa-plus"></i>
                                    <p>
                                        Tambah Data
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('dashboard_admin_app_tuh')}}" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Kembali ke Dashboard
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h1 class="m-0">{{ config('myconfig.singkatan_nama_aplikasi') }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Data Produk</h5>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @csrf
                                                <table id="data_tabel" class="table table-bordered table-striped" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th style="width:375px">Foto Produk</th>
                                                            <th>Nama Produk</th>
                                                            <th>Harga Produk</th>
                                                            <th>Deskripsi Produk</th>
                                                            <th colspan="2">Aksi</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $no = 1; @endphp
                                                        @foreach($DataTabel as $dt)
                                                            <tr>
                                                                <td>{{$no++}}</td>
                                                                <td align="center">
                                                                    <img src="{{asset($dt->foto_produk)}}" width="375px" height="250px"  alt="Foto"><br>
                                                                    <a href="javascript:void(0)" onclick="ubahDataFoto({{$dt->id}})" class="btn btn-info btn-block btn-sm"><i class="fa fa-image"></i></a>
                                                                </td>
                                                                <td>{{$dt->nama_produk}}</td>
                                                                <td>{{$dt->harga_produk_display}}</td>
                                                                <td>{!! $dt->deskripsi_produk !!}</td>
                                                                <td>
                                                                    <a href="javascript:void(0)" onclick="ubahDataPokok({{$dt->id}})" class="btn btn-warning btn-block btn-sm"><i class="fa fa-edit"></i></a>
                                                                </td>
                                                                <td>
                                                                   <a href="javascript:void(0)" onclick="hapusData({{$dt->id}})" class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                                <td></td>
                                                            </tr>
                                                            <!-- Ubah Data Pokok -->
                                                            <div class="modal fade" id="Modal1">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Ubah Data</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="Form1" action="" method="post">
                                                                                @csrf
                                                                                <input type="hidden" id="id1"/>
                                                                                <label>Nama Produk *</label><br>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" id="nama_produk1" class="form-control" required>
                                                                                </div>
                                                                                <label>Harga Produk *</label><br>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" id="harga_produk1" class="form-control" required>
                                                                                </div>
                                                                                <label>Deskripsi Produk *</label><br>
                                                                                <div class="input-group mb-3">
                                                                                    <div class="col-md-12">
                                                                                        <textarea id="deskripsi_produk1"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan Data</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                function ubahDataPokok(id)
                                                                {
                                                                    $.get('/cari_id_produk_tuh/'+id,function(data){
                                                                        $("#id1").val(data.id);
                                                                        $("#nama_produk1").val(data.nama_produk);
                                                                        $("#harga_produk1").val(data.harga_produk);
                                                                        $("#deskripsi_produk1").summernote('code', data.deskripsi_produk);
                                                                        $("#Modal1").modal('toggle');
                                                                    })
                                                                    $("#Form1").submit(function (e){
                                                                        e.preventDefault();
                                                                        let id = $("#id1").val();
                                                                        let nama_produk = $("#nama_produk1").val();
                                                                        let harga_produk = $("#harga_produk1").val();
                                                                        let deskripsi_produk = $("#deskripsi_produk1").val();
                                                                        let _token = $("input[name=_token]").val();
                                                                        $.ajax({
                                                                            url:"{{route('produk_tuh.simpan_perubahan_data_pokok')}}",
                                                                            type: "PUT",
                                                                            data:{
                                                                                id:id,
                                                                                nama_produk:nama_produk,
                                                                                harga_produk:harga_produk,
                                                                                deskripsi_produk:deskripsi_produk,
                                                                                _token:_token
                                                                            },
                                                                            success:function(response){
                                                                                $("#Modal1").modal('hide');
                                                                                window.location = "{{route('tampil_data_produk_tuh_oleh_admin_app_tuh')}}";
                                                                            }
                                                                        })
                                                                    })
                                                                }
                                                            </script>
                                                            <!-- Hapus Data -->
                                                            <div class="modal fade" id="Modal2">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Hapus Data</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="Form2" action="" method="post">
                                                                                @csrf
                                                                                <input type="hidden" id="id2"/>
                                                                                <label>Nama Produk *</label><br>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text" id="nama_produk2" class="form-control" disabled>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <button type="submit" class="btn btn-primary btn-block">Hapus Data</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                function hapusData(id)
                                                                {
                                                                    $.get('/cari_id_produk_tuh/'+id,function(data){
                                                                        $("#id2").val(data.id);
                                                                        $("#nama_produk2").val(data.nama_produk);
                                                                        $("#Modal2").modal('toggle');
                                                                    })
                                                                    $("#Form2").submit(function (e){
                                                                        e.preventDefault();
                                                                        bootbox.confirm("Anda yakin mau hapus data ini ?", function(result){
                                                                            if(result){
                                                                                let id = $("#id2").val();
                                                                                let _token = $("input[name=_token]").val();
                                                                                $.ajax({
                                                                                    url:"{{route('produk_tuh.hapus_data')}}",
                                                                                    type: "PUT",
                                                                                    data:{
                                                                                        id:id,
                                                                                        _token:_token
                                                                                    },
                                                                                    success:function(response){
                                                                                            $("#Modal2").modal('hide');
                                                                                            window.location = "{{route('tampil_data_produk_tuh_oleh_admin_app_tuh')}}";
                                                                                    }
                                                                                })
                                                                            }
                                                                        });
                                                                    })
                                                                }
                                                            </script>
                                                            <!-- Ganti Foto -->
                                                            <div class="modal fade" id="Modal3">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Ubah Foto</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="Form3" action="" method="post" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" id="id3" name="id3"/>
                                                                                <label>Upload File Foto</label><br>
                                                                                <div class="input-group mb-3">
                                                                                    <input type="file" id="file" name="file" class="form-control">
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <button type="submit" class="btn btn-primary btn-block">Upload Foto</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                function ubahDataFoto(id)
                                                                {
                                                                    $.get('/cari_id_produk_tuh/'+id,function(data){
                                                                        $("#id3").val(data.id);
                                                                        $("#Modal3").modal('toggle');
                                                                    });
                                                                    $.ajaxSetup({
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                        }
                                                                    });
                                                                    $("#Form3").submit(function (e){
                                                                        e.preventDefault();
                                                                        var formData = new FormData(this);
                                                                        $.ajax({
                                                                            url:"{{route('produk_tuh.simpan_perubahan_foto')}}",
                                                                            type: "POST",
                                                                            data: formData,
                                                                            cache:false,
                                                                            contentType: false,
                                                                            processData: false,
                                                                            success: (response) => {
                                                                                if (response) {
                                                                                    this.reset();
                                                                                    alert('Foto Telah Disimpan');
                                                                                    $("#Modal3").modal('hide');
                                                                                    window.location = "{{route('tampil_data_produk_tuh_oleh_admin_app_tuh')}}";
                                                                                }
                                                                            },
                                                                            error: function(response){
                                                                                console.log(response);
                                                                                alert('Foto Gagal Disimpan');
                                                                            }
                                                                        });
                                                                    });
                                                                }
                                                            </script>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
@endsection