<?php

namespace App\Http\Controllers;

use App\Models\AdminAppTuh;
use App\Models\ProdukTuh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdukTuhController extends Controller
{
    public function tampil_data_produk_tuh_oleh_admin_app_tuh(){
        if (session()->has('LoggedAdminAppTuh')){
            $data_admin_untuk_dashboard = AdminAppTuh::where('id','=',session('LoggedAdminAppTuh'))->first();
            $data_tabel = ProdukTuh::orderBy('id', 'desc')->get();
            $data = [
                'LoggedUserInfo'=>$data_admin_untuk_dashboard,
                'DataTabel'=>$data_tabel,
            ];
            return view('tampil_data_oleh_admin_app_tuh.tampil_data_produk_tuh_oleh_admin_app_tuh',$data);
        }else{
            return view('login.login_admin_app_tuh');
        }
    }

    public function cari_id_produk_tuh($id){
        $data = ProdukTuh::find($id);
        return response()->json($data);
    }

    public function simpan_perubahan_data_pokok_produk_tuh_oleh_admin_app_tuh(Request $request){
        $data_perubahan = ProdukTuh::find($request->id);
        $data_perubahan->nama_produk = $request->nama_produk;
        $data_perubahan->harga_produk = $request->harga_produk;
        $m_harga_poduk = $request->harga_produk;
        $data_perubahan->harga_produk_display = "Rp. ".number_format($m_harga_poduk,2,",",".");
        $data_perubahan->deskripsi_produk = $request->deskripsi_produk;
        $data_perubahan->save();
        return response()->json($data_perubahan);
    }

    public function hapus_data_produk_tuh_oleh_admin_app_tuh(Request $request){
        $data_dihapus = ProdukTuh::find($request->id);
        $data_dihapus->delete();
        return response()->json($data_dihapus);
    }

    public function simpan_perubahan_data_foto_produk_tuh_oleh_admin_app_tuh(Request $request){
        if($request->hasfile('file')){
            $data_foto_diperbaharui = ProdukTuh::find($request->id3);
            $request->validate([
                'file' => 'required|image|mimes:jpeg,bmp,png,gif,svg',
            ]);
            $extension = $request->file->getClientOriginalExtension();
            $filename = '/foto_produk_tuh/'.time().'.'.$extension;
            $filename2 = 'https://khadafizubaidi.xyz/foto_produk_tuh/'.time().'.'.$extension;
            $request->file->move(public_path('foto_produk_tuh'),$filename);
            $data = $filename;
            $data2 = $filename2;
            $data_foto_diperbaharui->foto_produk = $data;
            $data_foto_diperbaharui->url_foto_produk_tuh = $data2;
            $data_foto_diperbaharui->save();
            return response()->json('Foto Telah Disimpan'); 
        }
    }

    public function tambah_data_produk_tuh_oleh_admin_app_tuh(){
        if (session()->has('LoggedAdminAppTuh')){
            $data_admin_untuk_dashboard = AdminAppTuh::where('id','=',session('LoggedAdminAppTuh'))->first();
            $data = [
                'LoggedUserInfo'=>$data_admin_untuk_dashboard,
            ];
            return view('tambah_data_oleh_admin_app_tuh.tambah_data_produk_tuh_oleh_admin_app_tuh',$data);
        }else{
            return view('login.login_admin_app_tuh');
        }
    }

    public function simpan_data_produk_tuh_baru_oleh_admin_app_tuh(Request $request){
        if (session()->has('LoggedAdminAppTuh')){
            $request->validate([
                'nama_produk'=>'required',
            ],[
                'nama_produk.required'=>'Data tidak boleh kosong',
            ]);
            $data_baru = new ProdukTuh();
            $data_baru->nama_produk = $request->nama_produk;
            $data_baru->harga_produk = $request->harga_produk;
            $m_harga_poduk = $request->harga_produk;
            $data_baru->harga_produk_display = "Rp. ".number_format($m_harga_poduk,2,",",".");
            $data_baru->deskripsi_produk = $request->deskripsi_produk;
            $data_baru->save();
            $notification = array(
                'success' => 'Data sudah disimpan!',
            );
            return Redirect::to('tampil_data_produk_tuh_oleh_admin_app_tuh')->with($notification);
        }else{
            return view('login.login_admin_app_tuh');
        }
    }
}
